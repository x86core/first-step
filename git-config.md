###1. 全局配置###
`
git config --global user.name "username"//用户名 
`

`git config --global user.email "user@email.com" //邮箱
`
    
    .git/config  //自定义配置（局部配置）

    [user]
    name=username
    email=user@email.com

    [core]
    filemode=true // 会验证文件权限修改，也作为文件修改的标记
    autocrlf=false //window, linux换行符切换

###2. ssh-key###
[#1 密钥文件](____)

`
    ~/.ssh/id_rsa //文件
`

[#2 生成密钥文件](____)

`
    ssh-keygen -t rsa -C "user@email.com" -f "FILE_PATH" //不指定目录，默认在~/.ssh/目录
`

[ #3 多ssh-key配置](____)

    ~/.ssh/config

    HOST host

    USER user

    HOSTNAME hostname

    PORT 22

    IDENTITYFILE ~/.ssh/id_rsa_n


[#4 测试](____)
    ~/.ssh$ ssh -T host