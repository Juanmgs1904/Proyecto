#!/bin/bash
clear

# Verifica si se está ejecutando como root
if [ "$EUID" -ne 0 ]; then
    echo -e "\e[31mEste script debe ser ejecutado como root (superusuario).\e[0m"
    exit 1
fi
while true; do
	echo -e "\e[32mIngrese un nombre de usuario:\e[0m"
	read nuevo_usuario

	if id "$nuevo_usuario" &>/dev/null; then
		echo "El usuario $nuevo_usuario ya existe en el sistema. Por favor, elija otro nombre"
	else
		break
	fi
done

useradd -N $nuevo_usuario
#La Opción -N evita que al momento de crear el usuario se le implemente automaticamente en un grupo.
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
echo "$nuevo_usuario:$password" | chpasswd
clear
echo -e "\e[32mUsuario $nuevo_usuario creado con éxito y contraseña establecida\e[0m"
