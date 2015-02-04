#1.  服务器端，创建一个项目（远程登录，如git用户）
$whoami
    git #git 用户登录
$pwd
   /home/git #git用户的home目录
$mkdir gitrepo
$cd gitrepo
$pwd
    /home/git/gitrepo
$mkdir project.git   #创建项目目录
$pwd
    /home/git/gitrepo/project.git #project.git项目目录
$git --bare init        #初始化空项目

#2.  官户端(空仓库，clone和提交)
$cd myproject
$git init
$git add .
$git commit -m 'init'
$git remote add origin git@ip:gitrepo/project.git  #注意冒号后是相对于git用户的home, 即/home/git目录开始，找到 对应的空仓库project.git

#添加README 文件，空提交会报错
$echo 'init'>README
$git add README
$git commit -m 'not empty'
$git push origin master  #以上非空文件提交，保证本次push 到master 分支正常, 否则

注: 空文件push的时候，报错 error:src refspec master does not match any


===========================关于git 密钥 ======================================
1.  服务器端
$whoami
    git

$ssh-keygen   #生成公钥/私钥对

$ls -a .ssh
    id_rsa id_rsa.pub

2. 客户端

$ssh-copy-id -i .ssh/id_rsa.pub user@server

注: a.从服务器复制公钥到本地
    b.需要输入user的登录密码一次，以后不用输入
    c. 将.ssh/id_rsa.pub 追加到.ssh/authorized_keys文件中 （认证）
该命令可全部完成。日志/var/log/auth.log 可进行查看

======================关于git 用户创建========================
$whoami
    root
$adduser --system --shell /bin/bash --group git  #创建登录用户git并加到git 组

$adduser git ssh  #将git添加到ssh组
$passwd git  #git 用户添加密码
    



 
    
    
