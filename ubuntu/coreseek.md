安装sphinx/coreseek

1. 下载
wget http://www.coreseek.cn/uploads/csft/4.0/coreseek-4.1-beta.tar.gz

2. 安装 mmseg

```Bash
./bootstrap
./configure --prefix=/opt/sphinx/mmseg3
make && make install
```
3. 安装libiconv

```Bash
wget http://ftp.gnu.org/pub/gnu/libiconv/libiconv-1.14.tar.gz
tar xvf libiconv-1.14.tar.gz
cd libiconv-1.14
./configure
make && make install && ldconfig
```
glibc 2.16+ 报错
打补丁
```Bash
wget -O - http://blog.atime.me/static/resource/libiconv-glibc-2.16.patch.gz | gzip -d - | patch -p0
```

4. 安装csft (sphinx)

```Bash
cd csft-4.1
sh buildconf.sh
./configure --prefix=/opt/sphinx/coreseek  --without-unixodbc --with-mmseg --with-mmseg-includes=/opt/sphinx/mmseg3/include/mmseg/ --with-mmseg-libs=/opt/sphinx/mmseg3/lib/ --with-mysql --with-python LIBS=-liconv
make -j2 && sudo make install
```
gcc 4.7+ 报错
打补丁
```Bash
wget -O - http://blog.atime.me/static/resource/sphinxexpr-gcc4.7.patch.gz | gzip -d - | patch -p0
```
