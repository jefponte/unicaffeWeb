#!/bin/bash

if [ $# -lt 1 ]; then
   echo "Faltou utilizar pelo menos um argumento!"
   exit 1
fi
if [ "$1" = "start" ]; then

   java -jar /dados/unicafe/unicafe-servidor.jar &
   exit 1
   fi
 
if [ "$1" = "stop" ]; then
   killall  java   
   exit 1
fi

if [ "$1" = "restart" ]; then
   echo "Matando java" >> /root/teste
   killall  java 
   echo "Sleep 5" >> /root/teste
   sleep 5
   echo "Java Morto" >> /root/teste
   echo "Mortinho da Silva" >> /root/teste
   java -jar /dados/unicafe/unicafe-servidor.jar &
   echo "UNICAFE VOLTOU" >> root/teste
   exit 1
fi

#java -jar /dados/unicafe/unicafe-servidor.jar


exit 0
