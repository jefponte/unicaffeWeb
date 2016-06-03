#!/bin/bash

ifconfig  lo up
ifconfig eth0 200.129.19.40/25 up
ifconfig eth1 10.11.0.4/24 down
ifconfig eth2 10.11.20.4/24 down
ifconfig eth3 10.11.21.4/24 down
route add default gw 200.129.19.1 


