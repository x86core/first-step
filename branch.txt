branch 操作
1. 创建分支
    git branch <new-branch-name> //本地
    
    git push origin <new-branch-name> //发布到github (远程)

2.  切换分支
    git checkout <branch-name>

3.  删除分支
    git branch -d <本地分支>

    git push origin:<远程分支> (删除远程":")

4. 修改提交

    git push origin <branch-name>  //提交到指定分支

5. 重命名分支
    git branch -m <old-name> <new-name>  // -M则会强行覆盖


a. 回退本地版本(代码库覆盖本地工作版本)
    git reset --hard
    git pull
b. 指定文件回退
    git checkout HEAD PATH/TO/FILE


