#!/bin/bash

# Add iptable entries to filter all traffic except for the given mac address
iptables -A INPUT -p tcp --destination-port 80 -m mac --mac-source 74:df:bf:81:1a:19 -j ACCEPT
iptables -A INPUT -p tcp --destination-port 80 -j DROP

# Verify iptables persistent is installed such that the iptables won't get removed on 
# system restart
apt purge iptables-persistent
apt install iptables-persistent

# Add users as hint
adduser knock1_12345_udp
adduser knock2_23456_udp
adduser knock3_34567_udp
