终端代理工具 prxoychains

1. 一个可用的 ssh 代理账号,本地开启端口监听
   ssh -qTfnN -D [port]  [host]

2. 配置文件
/etc/proxychains.conf

[ProxyList]
socks5 127.0.0.1 [port]  #配置代理的本地端口号监听

3. 连接代理，执行程序
	例： 安装dropbox
	proxychains dropbox start -i