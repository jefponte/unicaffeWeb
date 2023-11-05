net user unicafe /delete
net user unicafe unicafe@unilab /add
net user unicafe /expires:never
net accounts /maxpwage:unlimited
net localgroup administradores unicafe /add
wmic useraccount where "Name='unicafe'" set PasswordExpires=false
jabswitch /enable
