<?php

error_reporting(E_ALL);
set_time_limit(0);
$address = '127.0.0.1';
$port = '9800';

//1.创建socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0); //创始socket
if ($socket === false) {
    printErr();
    exit;
}

//2. 绑定
$bindOk = socket_bind($socket, $address, $port); //绑定端口
if (!$bindOk) {
    printErr();
    exit;
}

//3. 监听
if (socket_listen($socket, 5) === false) {
    printErr();
    exit;
}

do {

    //获取一个连接
    if (($in = socket_accept($socket)) === false) {
        printErr();
        break;
    }

    //写消息
    $msg = '连接正确';
    socket_write($in, $msg, strlen($msg));

    do { //处理用户消息
        $input = socket_read($in, 2048);

        echo strlen($input).':'.$input;
        if ($input == "close\r\n") {
            socket_close($in);
            break 2;
        }

        $output = '>>:'.$input;
        socket_write($in, $output);
    } while (true);
} while (true);

socket_close($socket);

function printErr()
{
    echo 'socket error:'.socket_strerror(socket_last_error());
}
