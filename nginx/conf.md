### image_filter 模块配置 ###

文件规则：xxx.jpg_80_80_0.jpg


切成80×80的小图， 正则匹配(可resize)
```shell

location ~* /Public/(.+)\.(jpeg|jpg|png|gif|bmp)_(\d+)_(\d+)_0\.(jpeg|jpg|png|gif|bmp)$ {
             set $h $3;
             set $w $4;
             image_filter  crop $h $w;
             try_files   /Public/$1.$2 /Public/lotu.jpg;
         }

```
