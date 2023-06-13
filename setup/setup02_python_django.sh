https://aruljohn.com/blog/install-python-debian/

###
su -

su - engineer
exit

# cat > /etc/apt/sources.list << EOF
# deb http://mirror.0x.sg/debian/ bullseye main contrib non-free
# deb http://security.debian.org/debian-security bullseye-security main contrib non-free
# deb http://mirror.0x.sg/debian/ bullseye-updates main contrib non-free
# EOF
# apt -y update && apt -y dist-upgrade

wget https://www.python.org/ftp/python/3.11.1/Python-3.11.1.tgz
tar -xzvf Python-3.11.1.tgz
cd Python-3.11.1/

apt update && apt dist-upgrade
apt -y install build-essential zlib1g-dev libncurses5-dev libgdbm-dev \
    libnss3-dev libssl-dev libreadline-dev libffi-dev libsqlite3-dev wget libbz2-dev python3-pip


apt update && apt dist-upgrade
./configure --enable-optimizations
make -j$(nproc) && make altinstall
cd ~
rm -rf Python-3.11.1
rm -rf Python-3.11.1.tgz

python -V

python3.11 -V

##make python 3.11 the default version
ln -s /usr/local/bin/python
ln -s /usr/local/bin/python3.11 /usr/local/bin/python
python -V

apt install -y python3-venv
cd ..
python3.11 -m venv venv
ls
source /venv/bin/activate

apt update && apt dist-upgrade
apt -y install python3-pip
pip --version
pip list
pip install --upgrade pip



pip install django djangorestframework
exit
source /venv/bin/activate
django-admin startproject wdsf

cd wdsf

django-admin startapp api

python3 manage.py runserver
python manage.py makemigrations
python manage.py migrate


python3 manage.py createsuperuser
#engineer
#blank
#AnakPerantau