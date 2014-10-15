//安装


	wget http://httpsqs.googlecode.com/files/libevent-2.0.12-stable.tar.gz
	tar zxvf libevent-2.0.12-stable.tar.gz
	cd libevent-2.0.12-stable/
	./configure --prefix=/usr/local/libevent-2.0.12-stable/
	make
	make install
	cd ../
	
	wget http://httpsqs.googlecode.com/files/tokyocabinet-1.4.47.tar.gz
	tar zxvf tokyocabinet-1.4.47.tar.gz
	cd tokyocabinet-1.4.47/
	./configure --prefix=/usr/local/tokyocabinet-1.4.47/
	#Note: In the 32-bit Linux operating system, compiler Tokyo cabinet, please use the ./configure --enable-off64 instead of ./configure to breakthrough the filesize limit of 2GB.
	#./configure --enable-off64 --prefix=/usr/local/tokyocabinet-1.4.47/
	make
	make install
	cd ../
	
	wget http://httpsqs.googlecode.com/files/httpsqs-1.7.tar.gz
	tar zxvf httpsqs-1.7.tar.gz
	cd httpsqs-1.7/
	make
	make install
	cd ../

 代理下载以上源码包，进行安装。

- 入队列

		http://host:port/?name=queue&opt=put&data=urlencode_data
	name //队列名
	opt //操作选项
	data //urlencode的数据 【post|get请求】

	return :HTTPSQS_PUT_OK，HTTPSQS_PUT_ERROR， HTTPSQS_PUT_END

- 取出(出队列，不再存在于队列中)
		http://host:port/?name=queue&opt=put
	return 数据， HTTPSQS_GET_END
- 状态查看

		http://host:port/?name=queue&opt=status

	opt: status, status_json
- 查看队列指定位置
		http://host:port/?name=queue&opt=view&pos=num
	ops: 指定队列序数位

- Reset 操作(回到队列头)
		http://host:port/?name=queue&opt=reset

- 队列参数

		http://host:port/?name=queue&opt=maxqueue&num=number
	
	修改队列长度
		num >=10 and <= 1000000000 

	return: HTTPSQS_MAXQUEUE_OK, HTTPSQS_MAXQUEUE_CANCEL

- 同步更新数据到disk

		http://host:port/?name=queue&opt=synctime&num=number

	num >=1 and <= 1000000000 

	return: HTTPSQS_SYNCTIME_OK, HTTPSQS_SYNCTIME_CANCEL

- 授权
	
	额外参数： auth=xxx
	
	return HTTPSQS_AUTH_FAILED

- 全局错误
	
	HTTPSQS_ERROR


[PHP API](httpsqs_client.php)


	
