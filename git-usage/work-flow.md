##GITHUB 使用步骤：
1.获取git资源

`
    git clone user@github.com/devlop/dev.git//选取SSH资源，https无法提交
`
    
2.提交

`git pull` //获取版本库更新

添加文件： `git add `. (当前目录，或是指定文件)

提交(本地库): `git commit -m "message to descript"`

` git push origin master` //提交到远程master分支

3. 状态查看

`git status`

4. 对比

`git diff`


5. 保存现场切换工作

    `git stash`  //隐藏

    `git stash pop`  //弹出 num为0的

    `git stash pop stash@{num}`

6. 日志查看
    `git log -2 -p`   显示最近两次commit的log 和 diff

    `git log --author="Author Name"` 筛选特定作者的log

    `git log --since="2012-2-23" --before="2012-2-24"` 筛选时间段

    `git log --grep="key word"` 在commit 的message中查找关键字

    `git log branch --not master` 查看在branch上的，但不在master上的记录

7.撤消

    `git checkout file_name` //撤销没有staged的改动
    `git reset HEAD file` //把暂存区的修改撤销，放回工作区

    `git reset --hard HEAD` //撤消所有没有commit的改动，包括stage 和没有stage的
    同：git checkout HEAD file_name

8. 修改最后一个改动

    `git commit -amend`

9. 详细对比

        `git diff --staged` 或 `git diff --cached`//显示staged的(add 的)

        `git diff commit1 commit2`

10. 

        `git blame -C file` //文件具体的改动
        `git blame -Ln,m file` //文件n,m行间的改动
        `git blame commit1~1 -Ln,m file` //查看commit1版本前的改动，追查之前的log

        git blame commit1~1 -Ln,m -- old/file //如果被重命名或是移动过，输入旧的文件名

11. 删除

`git rm file-name` //从库和当前work 目录中删掉

`git rm --cached file-name`
