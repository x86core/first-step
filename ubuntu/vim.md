1.  配置

    set autoindent  ;自动缩进
    set nobackup    ;不备份
    set number      ;显示行号
    set tabstop=4   ;tab 4字符
    set shiftwidth=4   ;自缩进 4字符 
    set expandtab   ;tab转成空格

2.  技巧

    > shell 命令输出到当前编辑文件
    $:r !date
    效果：
2015年 02月 28日 星期六 10:30:12 CST


    > 列编辑
    ctrl+v 可视化模式编辑
   // 插入
   shift+i
   esc esc

    > 重复插入
    n i chr  esc // 转入n个chr(字符)

    > 替换插入
    :s/itme//=strftime("%F")/
