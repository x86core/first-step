环境 ubuntu kernel 3.19

### 安装vmware player 7.1 ###

1. 下载linux版wmware-player

VMware-Player-7.1.0-2496824.x86_64.bundle

2. 安装
`sudo sh VMware-Player-7.1.0-2496824.x86_64.bundle`

3. vmnet无法安装问题(kernel问题):

 补丁：vmnet-3.19.patch
```Bash 
cd /usr/lib/vmware/modules/source
```
```Bash
tar -xf vmnet.tar
```
```Bash
sudo patch -p0 -i vmnet-3.19.patch     #打补丁
```
```Bash
tar -cf vmnet.tar vmnet-only      #重新打包
```
```Bash
sudo rm -rf vmnet-only
```
```Bash
vmware-modconfig --console --install-all    #安装所有模块
```

- 卸载vmware player

`sudo vmware-installer -u vmware-player`
