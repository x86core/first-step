####源码
1. PHP 源码
	`git clone` https://github.com/php/php-src.git
2. 扩展目录
	cd php-src/ext

####骨架
1. ext_skel 建立骨架
	`./ext_skel --extname=rube`

	生成rube目录
	`$cd rube`
2. config.m4 参数修改

		[--enable-rube Enable rube support]

#### 编写php_rube.h 和 rube.c

1. php_rube.h

	添加：
	    PHP_FUNCTION(confirm_rube_compiled);
    	PHP_FUNCTION(hello); //hello为要创建的那个函数


2. rube.c

    	const zend_function_entry_rube_functions[] = {
    		PHP_FE(confirm_rute_compiled, NULL)
    		PHP_FE(hello, NULL)  //添加部分
    		PHP_FE_END
    	};
3. 编写函数
	rube.c 后添加
    
    	PHP_FUNCTION(hello)
    	{
    	char *arg = "Hello my first extendsion!";
    	int len;
    	char *strg;
    	
    	len = sprintf(&strg, 0, "%s\n, arg);
    	RETURN_STRINGL(strg, len, 0);
    	}

####编译

1. 编译so文件
    
    	cd /php-src/ext/rube
    	phpize
		./configure --with-php-config=/php-config-dir
		make && make install

2. php.ini
    
    `extension = /path/to/extension/rube.so`

#### 测试

	<?php
		echo hello();
