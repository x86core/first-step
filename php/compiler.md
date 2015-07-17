./configure --prefix=/opt/lnmp/php --with-config-file-path=/opt/lnmp/php/etc  --with-config-file-scan-dir=/opt/lnmp/php/etc/conf.d --with-curl --with-gd --with-gettext --with-gmp --enable-hash --with-iconv --enable-intl --enable-json --enable-libxml --enable-mbstring --with-mysql --enable-mysqlnd --enable-opcache --with-openssl --enable-pcntl --enable-pdo --with-pdo-mysql --enable-phar --enable-session --enable-sockets --enable-xml --with-zlib --enable-fpm --with-mcrypt --with-mhash --enable-debug --enable-soap
--enable-opcache --with-readline

注： 依赖需要自行下载解

常见问题题：

ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/include/
libmcrypt libmcrypt-dev
libcurl3 libcurl3-dev
libxml2 libxml2-dev



http://www.laruence.com/2008/04/21/101.html
sysvsem,sysvshm,sysvmsg



 sudo ./configure --prefix=/opt/lnmp/nginx-1.7 --conf-path=/opt/lnmp/nginx-1.7/conf --user=nginx --group=nginx --with-http_realip_module --with-http_addition_module --with-http_flv_module --with-http_gzip_static_module --error-log-path=/opt/lnmp/nginx-1.7/log --http-log-path=/opt/lnmp/nginx-1.7 

