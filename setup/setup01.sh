##own computer 
ssh-copy-id -i /mnt/c/Users/user/.ssh/id_rsa.pub -p 520 engineer@103.111.74.173


git config --global user.email "wsuan15@gmail.com"
git config --global user.name "WM"
#go in root 
su -

apt -y install ssh git wget curl

#key read copy and put into your github acc key
cat /home/engineer/.ssh/id_rsa.pub

#


apt -y update && apt -y dist-upgrade

#cannot update problem
timedatectl
timedatectl set-ntp true
apt -y update && apt -y dist-upgrade
apt-get install ntpdate
#sync time
ntpdate pool.ntp.org
date
apt -y update && apt -y dist-upgrade
nano /etc/apt/sources.list
deb http://ftp.debian.org/debian bullseye-updates main contrib non-free
apt -y update
