##own computer 
ssh-copy-id -i /mnt/c/Users/user/.ssh/id_rsa.pub -p 520 engineer@103.111.74.173


#go in root 
sudo su -

apt -y install ssh git wget curl

#key read copy and put into your github acc key
cat /home/engineer/.ssh/id_rsa.pub

#
