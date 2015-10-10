#### sphinx 安装使用（全记录）

>> 搜索解决方案coreseek,sphinx-for-chinese, sphinx+scws(低耦合)
## 下载安装
>> 不使用coreseek包，使用最新发行版sphinx+mmseg(分词库)

  1. libmmseg 下载安装
  `wget http://www.coreseek.cn/uploads/csft/3.2/mmseg-3.2.14.tar.gz`
``` shell
   $ tar -xvf  mmseg-3.2.14.tar.gz

   $ cd mmseg-3.2.14

   $ ./bootstrap

   $ ./configure --prefix=/opt/mmseg3

   $ make && make install
```

  2. sphinx  下载
  从  [Sphinx 官网](http://sphinxsearch.com/downloads/release/) 下载发行版。
>> 当前最新发行版sphinx-2.2.10-release.tar.gz

``` shell
  $ tar -xvf sphinx-2.2.10-release.tar.gz

  $ cd sphinx-2.2.10-release

  $ ./configure --prefix=/opt/sphinx --without-unixodbc --with-mmseg --with-mmseg-includes=/opt/mmseg3/ --with-mmseg-libs=/opt/mmseg3/lib --with-mysql

  $ make && make install
```

  3. 测试
  ``` shell
  $ cd testpack

  $ /opt/mmseg3/bin/mmseg -d /opt/mmseg3/etc var/text/test.xml

  $ /opt/sphinx/bin/indexer -c etc/csft.conf --all

  $ /opt/sphinx/bin/search -c etc/csft.conf
  ```

 4. fix
  单独安装sphinx
  ./configure --prefix=/opt/sphinx2 --with-mysql LIBS="-liconv" #解决libiconv的错误 LIBS
