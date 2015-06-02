环境 ubuntu kernel 3.19

### 安装vmware player 7.1 ###

1. 下载linux版wmware-player 
VMware-Player-7.1.0-2496824.x86_64.bundle

2. 安装
sudo sh VMware-Player-7.1.0-2496824.x86_64.bundle
3. vmnet无法安装问题(kernel问题):
 补丁：vmnet-3.19.patch
`cd /usr/lib/vmware/modules/source
tar -xf vmnet.tar
sudo patch -p0 -i vmnet-3.19.patch     #打补丁
tar -cf vmnet.tar vmnet-only      #重新打包
sudo rm -rf vmnet-only
vmware-modconfig --console --install-all    #安装所有模块`

4. 卸载vmware player
`sudo vmware-installer -u vmware-player`
