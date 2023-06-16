
su -

apt -y install curl gnupg
curl http://nginx.org/keys/nginx_signing.key | apt-key add -
echo "deb http://nginx.org/packages/mainline/debian/ bullseye nginx" > /etc/apt/sources.list.d/latest-nginx.list
apt -y update
apt-cache policy nginx
apt -y install nginx
/etc/init.d/nginx start
systemctl enable nginx
sed -i "s/^user  nginx;/user  www-data;/g" /etc/nginx/nginx.conf
systemctl restart nginx.service
systemctl restart php8.0-fpm.service

apt -y install openssl
mkdir -p /etc/nginx/ssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj "/C=UK/ST=London/L=London/O=default/CN=*.default.com" -keyout /etc/nginx/ssl/default.key -out /etc/nginx/ssl/default.crt

# curl -k https://engineer:AnakPerantau@103.68.63.123/ssl/tuvbo.com-sub-cert.pem > /etc/nginx/ssl/tuvbo.com-sub-cert.pem
curl -k https://engineer:AnakPerantau@103.68.63.123/ssl/tuvbo.com-sub-fullchain.pem > /etc/nginx/ssl/tuvbo.com-sub-fullchain.pem 
curl -k https://engineer:AnakPerantau@103.68.63.123/ssl/tuvbo.com-sub-privkey.pem > /etc/nginx/ssl/tuvbo.com-sub-privkey.pem
/etc/init.d/nginx restart


cat > /etc/nginx/conf.d/default.conf << EOF
server {
    listen       80;
    server_name  _;
    rewrite ^ http://www.google.com? permanent;
}
server {
    listen 443 ssl default_server;
    ssl_certificate /etc/nginx/ssl/default.crt;
    ssl_certificate_key /etc/nginx/ssl/default.key;
    server_name  _;
    rewrite ^ http://www.google.com? permanent;
}
EOF

cat > /etc/nginx/conf.d/seafood.tuvbo.conf << EOF
server {
    listen       80;
    server_name  seafood.tuvbo.com;
    rewrite ^ https://seafood.tuvbo.com.com? permanent;
}
server{
    listen 443 ssl;
    ssl_certificate /etc/nginx/ssl/tuvbo.com-sub-fullchain.pem;
    ssl_certificate_key /etc/nginx/ssl/tuvbo.com-sub-privkey.pem;
    access_log  /var/log/nginx/seafood.tuvbo.com-access.log combined;
    error_log   /var/log/nginx/seafood.tuvbo.com-error.log warn;
    server_name  seafood.tuvbo.com;
    root /home/engineer/WellDoneSeaFood/frontend/dist/WellDoneSeaFood/;
    index  index.html;
    location / {
        proxy_set_header X-Real-IP remote_addr;
        proxy_pass http://127.0.0.1:3000/;
    }
    location /pgadmin4/ {
        include fastcgi_params;
        proxy_pass http://127.0.0.1:8080/pgadmin4/;
    }
    location /rabbitmq/ {
        include fastcgi_params;
        proxy_pass http://127.0.0.1:15672/;
    }
}
EOF
/etc/init.d/nginx restart


