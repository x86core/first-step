<?php

class websocket
{
    private $config; //基础配置
    private $socket;
    private $client;

    public function setOpt($key, $val)
    {
        $this->config[$key] = $val;
    }

    public function daemon($config)
    { //守护进程
        if (!empty($config)) {
            $address = $config['address'];
            $port = $config['port'];
        } else {
            $address = $this->config['address'];
            $port = $this->config['port'];
        }

        //1.创建socket
        $this->socket = socket_create(AF_INET, SOCK_STREAM, 0); //创始socket
        if ($this->socket === false) {
            throw new Exception($this->lastError());
            exit;
        }

        //2. 绑定
        $bindOk = socket_bind($this->socket, $address, $port); //绑定端口
        if (!$bindOk) {
            throw new Exception($this->lastError());
            exit;
        }

        //3. 监听
        if (socket_listen($this->socket, 5) === false) {
            throw new Exception($this->lastError());
            exit;
        }

        do {
            //获取一个连接
            if (($this->client = socket_accept($this->socket)) === false) {
                throw new Exception($this->lastError());
                break;
            }

            $input = socket_read($this->client, 2048);
            echo $input;
            preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $input, $match);
            $WebSocketKey = $match[1];
            if (!empty($WebSocketKey)) { //握手
                $this->handShake($WebSocketKey);
            }

            do { //处理用户消息
                $input = socket_read($this->client, 2048);
                $get = $this->decode($input);
                $output = '>>'.$get;
                socket_write($this->client, $this->_encode($output));
            } while (true);
        } while (true);

        socket_close($this->socket);
    }

    public function handShake($WebSocketKey)
    {
        $SecWebSocketAccept = base64_encode(pack('H*', sha1($WebSocketKey.'258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
        $upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n".
            "Upgrade: websocket\r\n".
            "Connection: keep-alive, Upgrade\r\n".
            "Sec-WebSocket-Accept:$SecWebSocketAccept\r\n\r\n";
        socket_write($this->client, $this->_encode($upgrade, 'pong'));
    }

    private function lastError()
    {
        return socket_strerror(socket_last_error());
    }

    protected function _encode($payload, $type = 'text')
    {
        $frameHead = array();
        $payloadLength = strlen($payload);
        switch ($type) {
            case 'text':
                // first byte indicates FIN, Text-Frame (10000001):
                $frameHead[0] = 129;
                break;
            case 'close':
                // first byte indicates FIN, Close Frame(10001000):
                $frameHead[0] = 136;
                break;
            case 'ping':
                // first byte indicates FIN, Ping frame (10001001):
                $frameHead[0] = 137;
                break;
            case 'pong':
                // first byte indicates FIN, Pong frame (10001010):
                $frameHead[0] = 138;
                break;
        }
        if ($payloadLength > 65535) {
            $ext = pack('NN', 0, $payloadLength);
            $secondByte = 127;
        } elseif ($payloadLength > 125) {
            $ext = pack('n', $payloadLength);
            $secondByte = 126;
        } else {
            $ext = '';
            $secondByte = $payloadLength;
        }

        return $data = chr($frameHead[0]).chr($secondByte).$ext.$payload;
    }

    public function decode($buffer)
    {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;
        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        } elseif ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        } else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); ++$index) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }

        return $decoded;
    }
}
$ws = new WebSocket();
$ws->daemon(array(
    'address' => '127.0.0.1',
    'port' => '9800',
));
