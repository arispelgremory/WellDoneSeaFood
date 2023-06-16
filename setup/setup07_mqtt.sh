su -
apt -y install ssh

###############################################################################
### Setup Unsecure AMQP - 5672
###############################################################################

### Step 1 : Setup Repo
cat > /etc/apt/sources.list << EOF
deb http://ftp.jp.debian.org/debian/ bullseye main contrib non-free
deb http://ftp.jp.debian.org/debian/ bullseye-updates main contrib non-free
EOF
apt -y update && apt -y dist-upgrade

### Step 2 : Install Tools
apt -y install curl gnupg apt-transport-https

### Step 3 : Install Erlang
apt -y install curl wget
apt-cache policy erlang
curl -1sLf "https://packagecloud.io/rabbitmq/rabbitmq-server/gpgkey" | gpg --dearmor | tee /usr/share/keyrings/io.packagecloud.rabbitmq.gpg > /dev/null
wget https://packages.erlang-solutions.com/erlang-solutions_2.0_all.deb
apt install ./erlang-solutions_2.0_all.deb
apt -y update
apt-cache policy erlang
apt install -y erlang-base erlang-asn1 erlang-crypto erlang-eldap erlang-ftp \
    erlang-inets erlang-mnesia erlang-os-mon erlang-parsetools \
    erlang-public-key erlang-runtime-tools erlang-snmp erlang-ssl \
    erlang-syntax-tools erlang-tftp erlang-tools erlang-xmerl
apt-cache policy erlang
# erl --version

### Step 4 : Install RabbitMQ
apt-cache policy rabbitmq-server
tee /etc/apt/sources.list.d/rabbitmq.list <<EOF
deb [signed-by=/usr/share/keyrings/io.packagecloud.rabbitmq.gpg] https://packagecloud.io/rabbitmq/rabbitmq-server/debian/ bullseye main
deb-src [signed-by=/usr/share/keyrings/io.packagecloud.rabbitmq.gpg] https://packagecloud.io/rabbitmq/rabbitmq-server/debian/ bullseye main
EOF
apt -y update
apt-cache policy rabbitmq-server
apt install rabbitmq-server -y --fix-missing
service rabbitmq-server restart

### Opened Ports
# 4369  - RabbitMQ messaging (EMPD)
# 25672 - RabbitMQ messaging (Erlang distribution)
# 5672  - RabbitMQ messaging (AMQP unencrypted backup port)

# ### Port Forward
# ssh root@192.168.0.1 '/root/uci_port_forward https 5672 192.168.0.3 5672'

### Step 5 : # Enable Web Management and Admin Account
rabbitmq-plugins enable rabbitmq_management
rabbitmqctl add_user engineer anakperantau
rabbitmqctl set_user_tags engineer administrator
rabbitmqctl set_permissions -p / engineer ".*" ".*" ".*"
rabbitmqctl "report"

### Step 12 : Enable User Account
rabbitmqctl add_user babi chu
rabbitmqctl set_permissions -p / babi ".*" ".*" ".*"
rabbitmqctl set_user_tags babi management

##############################################################################
### Setup Unsecure MQTT - 1883
###############################################################################
## MQTT not secure 1883
rabbitmq-plugins enable rabbitmq_mqtt
service rabbitmq-server restart


ss -tunpl



#######start #### port 5671
 
### Step 10 : Enable Secure AMQP-SSL
cat > /etc/rabbitmq/rabbitmq.conf << EOF
# Enable AMQP-SSL
listeners.ssl.default = 5671
ssl_options.cacertfile = /etc/nginx/ssl/tuvbo.com-sub-fullchain.pem
ssl_options.certfile = /etc/nginx/ssl/tuvbo.com-sub-cert.pem
ssl_options.keyfile = /etc/nginx/ssl/tuvbo.com-sub-privkey.pem
### Default Setting Cause - In state wait_cert at ssl_handshake.erl:2098 generated SERVER ALERT: Fatal - Unknown CA
# ssl_options.verify = verify_peer
# ssl_options.fail_if_no_peer_cert = true
### 
ssl_options.verify = verify_none
ssl_options.fail_if_no_peer_cert = false
# 
# channel_max = 1048576
EOF
service rabbitmq-server restart


###MQTTS###### port 8883
cat >> /etc/rabbitmq/rabbitmq.conf << EOF
# default TLS-enabled port for MQTT connections
mqtt.listeners.ssl.default = 8883
mqtt.listeners.tcp.default = 1883
EOF
systemctl restart rabbitmq-server

#####WS#### (not secure) port 15675
rabbitmq-plugins enable rabbitmq_web_mqtt # (WS noSSL)

cat >> /etc/rabbitmq/rabbitmq.conf << EOF
# default TLS-enabled port for MQTT connections
web_mqtt.tcp.port = 15675
EOF
systemctl restart rabbitmq-server



#### WSS #######(secure)  port 15676
cat >> /etc/rabbitmq/rabbitmq.conf << EOF
web_mqtt.ssl.port = 15676
web_mqtt.ssl.ip = 0.0.0.0
web_mqtt.ssl.certfile = /etc/nginx/ssl/tuvbo.com-sub-cert.pem
web_mqtt.ssl.keyfile = /etc/nginx/ssl/tuvbo.com-sub-privkey.pem
web_mqtt.ssl.cacertfile = /etc/nginx/ssl/tuvbo.com-sub-fullchain.pem
EOF
systemctl restart rabbitmq-server
