#!/bin/bash
clear

#Verifica si se esta ejecutando como root
if [ "$EUID" -ne 0 ]; then
	echo -e "\e[31mEste script debe ser ejecutado como root (superusuario).\e[0m"
	exit 1
fi

while true; do
	echo -e "\e[32mIngrese un nombre de usuario:\e[0m"
	read new_user
	
	if id "$new_user" &>/dev/null; then
		echo -e "\e[32mEl usuario $new_user ya existe en el sistema. Por favor, elija otro nombre\e[0m"
	else
		break
	fi
done 

while true; do

	echo -e "\e[32mIngrese el nombre del grupo para el usuario $new_user:\e[0m"
	read group
	
	if grep -q "^$group:" /etc/group; then
        	break
	else
		echo -e "\e[32mEl grupo $group no existe, elija otro.\e[0m"
		grep -E '^root:' /etc/group
	fi
done

useradd -N $new_user

while true; do
	echo -e "\e[32mIngrese una contraseña:\e[0m"
	read -s password

	echo -e "\e[32mConfirme:\e[0m"
	read -s password_confirm

	if [ "$password" != "$password_confirm" ]; then
    		echo -e "\e[31mLas contraseñas no coinciden. Intente nuevamente\e[0m"
    	else
		break
	fi
done

echo "$new_user:$password" | chpasswd
usermod -a -G $group $new_user

clear
echo -e "\e[32mUsuario $new_user creado con éxito, grupo y contraseña establecidos\e[0m"

