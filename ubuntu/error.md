#
 perl: warning: Falling back to the standard locale ("C")

解决：
echo "export LC_ALL=C" >> /root/.bashrc
source /root/.bashrc
sudo dpkg-reconfigure locales


