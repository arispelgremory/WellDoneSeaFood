### As ROOT : Install POSTGRESQL
apt -y install gnupg wget
echo "deb http://apt.postgresql.org/pub/repos/apt/ bullseye-pgdg main" > /etc/apt/sources.list.d/latest-postgresql.list
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add -
apt -y update && apt -y dist-upgrade
apt-cache policy postgresql
apt-cache search postgresql

apt -y install postgresql-15
/etc/init.d/postgresql status

ss -tunpl

# MAIN databace account
su postgres -c "psql -U postgres template1 -c \"ALTER USER postgres with encrypted password 'AnakPerantau'\""
#
/etc/init.d/postgresql restart
su postgres -c "PGPASSWORD=AnakPerantau psql -U postgres template1 -c \"\l\""
# su postgres -c "PGPASSWORD=AnakPerantau psql -U postgres seafood -c \"\l\""

echo "deb [trusted=yes] https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/bullseye pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list
cat /etc/apt/sources.list.d/pgadmin4.list

apt update
#apt -y install pgadmin4
apt -y install pgadmin4-web


sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:8080>/g' /etc/apache2/sites-enabled/000-default.conf
sed -i 's/Listen 80$/Listen 8080/g' /etc/apache2/ports.conf
export PGADMIN_SETUP_EMAIL="admin@localhost.com"
export PGADMIN_SETUP_PASSWORD="AnakPerantau"
/usr/pgadmin4/bin/setup-web.sh --yes
