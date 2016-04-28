 ```
 48 server {
 49     listen       80;
 50     server_name   uos.fcon.net;
 51 
 52     charset      utf-8;
 53     set $root_path '/opt/webroot/phalcon';
 54     root $root_path/public;
 55 
 56     location / {
 57         index  index.php index.html index.htm;
 58         # if file exists return it right away
 59         if (-f $request_filename) {
 60             break;
 61         }
 62 
 63         # otherwise rewrite it
 64         if (!-e $request_filename) {
 65             rewrite ^(.+)$ /index.php?_url=$1 last;
 66             break;
 67         }
 68     }
 69 
 70     location ~ \.php$ {
 71         try_files    $uri =404;
 72 
 73         fastcgi_index  /index.php;
 74         fastcgi_pass  unix:/var/run/php5-fpm.sock;
 75 
 76         include fastcgi_params;
 77         fastcgi_split_path_info       ^(.+\.php)(/.+)$;
 78         fastcgi_param PATH_INFO       $fastcgi_path_info;
 79         fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
 80         fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
 81     }
 82 
 83     location ~* ^/(css|img|js|flv|swf|download)/(.+)$ {
 84         root $root_path;
 85     }
 86 }
```
