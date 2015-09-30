### sphinx + scws (php)

* sphinx  下载
从  [Sphinx 官网](http://sphinxsearch.com/downloads/release/) 下载发行版。

```
$ ./configure --prefix=/opt/sphinx --with-mysql LIBS="-liconv" #解决libiconv的错误 LIBS
$ make && make install
```

配置 sphinx [配置](/search/sphinx-config.md)
* scws 安装
从 [SCWS 中文分词](http://www.xunsearch.com/scws/) 下载安装包。

>>> 下载：`scws-1.2.2.tar.bz2`和`scws-dict-chs-utf8.tar.bz2`(XDB词库utf-8)
```shell
$ tar -xvf scws-1.2.2.tar.bz2
$ cd scws-1.2.2
$ ./configure --prefix=/opt/scws
$ make && make install
```
 添加词库,解压到scws下的etc目录
``` shell
$ tar -xvf scws-dict-chs-utf8.tar.bz2 -C /opt/scws/etc
```
 php扩展scws (php.ini 添加扩展 scws.so)

```
$ cd scws-1.2.2
$ cd phpext
$ /usr/bin/phpize
$ ./configure --with-php-config=/usr/bin/php-config --with-scws=/opt/scws
$ make && make install
```

* 测试SCWS

```php
 $dict = "/opt/scws/etc/dict.utf8.xdb";
  $rule = "/opt/scws/etc/rules.utf8.ini";

  $text = "厨艺课程";

  $ser = scws_new();

  $ser->set_charset("utf8");
  $ser->add_dict($dict);
  $ser->set_rule($rule);

  //去掉特殊字符
  $ser->set_ignore(true);

  //复式分割
  //1,2,4,8 异或； 短词，二元，主要单字，所有单字
  $ser->set_multi(2);

  //是否将闲散字自动以二字分词聚合
  //$ser->set_duality(false);

  //设设定搜索词
  $ser->send_text($text);

  $words = $ser->get_result();
  $ser->close();

  $keyword = array_reduce($words,function($holder, $cur){
      $holder[] = $cur['word'];
      return $holder;
  });
```

* sphinx测试

```php
  require("sphinxapi.php");
  $client->SetServer("127.0.0.1",9312);

  $keyword = implode("|", $keyword);
  $res = $clietn->Query($keyworkd, $indexer="*");
  if($error = $client->GetLastError())
    throw new Exception($error);

  $res['matches'];// 匹配的数据
```  
