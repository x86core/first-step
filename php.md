####编译安装php-redis 
	wget https://github.com/nicolasff/phpredis/archive/master.zip
	unzip master.zip
	cd phpredis-master

#### CURL FORM 提交

	
- //文件提交 -F 可post其他字段
	<code>
	curl -F "@file=/PATH;filename=FILENAME" "http://host/"
	-T/--upload-file [file] --url <URL>
	</code>
	
- //post 提交
	<code>
	curl -d "d1=v1&d2=v2" "http://host/.."
	</code>

- //get 提交
	<code>
	curl "http://host/.."

	//socket

	curl -s "host:port"
	</code>

