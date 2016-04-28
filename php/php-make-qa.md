

Q: Fatal error: Call to undefined function imagettftext()

A: GD 库安装时缺少freetype 参数

  必要参数
   --enable-gd-native-ttf \
   --withttf \
   --with-freetype-dir \
   --with-jpeg-dir \
   --enable-exif \


 Q: 编译必要参数

 A：

  ./configure --prefix=/opt/php5 --with-config-file-path=/opt/php5/etc/php.ini --with-config-file-scan-dir=/opt/php5/etc/conf.d --enable-fpm --with-fpm-user=www --with-fpm-group=www --with-zlib --with-curl --enable-exif --with-gd --with-jpeg-dir --with-png-dir --with-zlib-dir --with-xpm-dir --enable-gd-native-ttf --with-gettext --enable-mbstring --with-mcrypt --with-pdo-mysql --with-pdo-sqlite --with-libxml-dir --enable-sysvmsg --enable-sysvsem --enable-sysvshm --with-pcre-dir --enable-mysqlnd --with-pear --with-readline --with-freetype-dir


Q: 查看类的成员函数

A:   
   print_r(preg_grep('/^phalcon/i', get_declared_classes()));
