####Yeoman 简介
Yeoman 是由三个工具的组成：YO、GRUNT、BOWER

YO：Yeoman核心工具，项目工程依赖目录和文件生成工具，项目生产环境和编译环境生成工具。

GRUNT：前端构建工具，jQuery就是使用这个工具打包的。

BOWER：Web 开发的包管理器，概念上类似 npm，npm 专注于 NodeJs 模块，而 bower 专注于 CSS、JavaScript、图像等前端相关内容的管理。

#####安装
    yum install npm
    
    npm install -g yo grunt-cli bower

####使用
- 创建项目
`npm search yeoman-generator` //查看所有可用生成器
`npm install -g generator-webapp`  //安装生成器
`yo webapp ` //创建webapp

- 内置Node服务器：
`grunt server ` //启动, 端口配置gruntfile.js

- 测试框架
  `grunt test`
-模块安装
  `bower install module_name`
