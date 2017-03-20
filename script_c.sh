#!/bin/bash

# Add iptable entries to filter all traffic except for the given mac address
iptables -F
iptables -X
iptables -Z

iptables -N STATE0
iptables -A STATE0 -p udp --dport 12345 -m recent --name KNOCK1 --set -j DROP
iptables -A STATE0 -j DROP

iptables -N STATE1
iptables -A STATE1 -m recent --name KNOCK1 --remove
iptables -A STATE1 -p udp --dport 23456 -m recent --name KNOCK2 --set -j DROP
iptables -A STATE1 -j STATE0

iptables -N STATE2
iptables -A STATE2 -m recent --name KNOCK2 --remove
iptables -A STATE2 -p udp --dport 34567 -m recent --name KNOCK3 --set -j DROP
iptables -A STATE2 -j STATE0

iptables -N STATE3
iptables -A STATE3 -m recent --name KNOCK3 --remove
iptables -A STATE3 -p tcp --dport 80 -j ACCEPT
iptables -A STATE3 -p tcp --dport 22 -j ACCEPT
iptables -A STATE3 -j STATE0

iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A INPUT -s 127.0.0.0/8 -j ACCEPT
iptables -A INPUT -p icmp -j ACCEPT
# iptables -A INPUT -p tcp --dport 80 -j ACCEPT

iptables -A INPUT -m recent --name KNOCK3 --rcheck -j STATE3
iptables -A INPUT -m recent --name KNOCK2 --rcheck -j STATE2
iptables -A INPUT -m recent --name KNOCK1 --rcheck -j STATE1
iptables -A INPUT -j STATE0

# Verify iptables persistent is installed such that the iptables won't get removed on 
# system restart
apt purge iptables-persistent
apt install iptables-persistent

# Create new database in mysql server
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS sqli"

# Add tables from .sql files
mysql -u root -p sqli < /var/www/html/php-sql-webapp/users.sql
mysql -u root -p sqli < /var/www/html/php-sql-webapp/balance.sql
mysql -u root -p sqli < /var/www/html/php-sql-webapp/populate.sql
