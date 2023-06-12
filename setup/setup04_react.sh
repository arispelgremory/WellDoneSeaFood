apt update && apt dist-upgrade
curl -fsSL https://deb.nodesource.com/setup_current.x | bash -

apt -y install gcc g++ make build-essential
curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarnkey.gpg >/dev/null
echo "deb [signed-by=/usr/share/keyrings/yarnkey.gpg] https://dl.yarnpkg.com/debian stable main" | tee /etc/apt/sources.list.d/yarn.list
apt update && apt dist-upgrade

apt -y install nodejs yarn

node -v
npm -v


npm install -g create-react-app

exit
create-react-app reactapp

cd reactapp
npm start 0.0.0.0
