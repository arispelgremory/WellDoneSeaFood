### As ROOT : Install POSTGRESQL
apt -y install gnupg wget
wget -q https://www.postgresql.org/media/keys/ACCC4CF8.asc -O - | apt-key add -
echo "deb http://apt.postgresql.org/pub/repos/apt/ bullseye-pgdg main" > /etc/apt/sources.list.d/latest-postgresql.list
apt -y update && apt -y dist-upgrade
apt-cache policy postgresql
apt-cache search postgresql