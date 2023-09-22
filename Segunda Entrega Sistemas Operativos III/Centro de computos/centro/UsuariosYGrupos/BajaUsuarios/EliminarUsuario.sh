#!/bin/bash
clear
# Verifica si se está ejecutando como root
if [ "$EUID" -ne 0 ]; then
    echo "Este script debe ser ejecutado como root (superusuario)"
    exit 1
fi
while true; do
	echo -e "\e[32mIngrese el usuario que quiere eliminar:\e[0m"
	read usuario_eliminado

	if id "$usuario_eliminado" &>/dev/null; then
		break
	else
		echo "El usuario $usuario_eliminado no existe en el sistema. Elija un nombre que exista"
		awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd	
	fi
done

echo "¿Desea eliminar el directorio del usuario?[s/n]"
read yn
case $yn in
	s)
		echo "¿forzar eliminación de la cuenta?[s/n]"
		read opcion
		case $opcion in
			s)
				userdel -rf $usuario_eliminado
				clear
				;;
			n)
				userdel -r $usuario_eliminado
				clear
				;;
			*)	
				echo "Opcion invalida"
				;;
			esac
			;;
	n)	
		echo "¿forzar eliminación de la cuenta?[s/n]"
		read opcion
		case $opcion in
			s)
				userdel -f $usuario_eliminado
				clear
				;;
			n)
				userdel $usuario_eliminado
				clear
				;;
			*)	
				echo "Opcion invalida"
				;;
			esac
			;;
	*)
		clear
		echo "Opcion invalida"
		;;
esac
echo ""
echo -e "\e[36mUsuarios restantes:\e[0m"
echo ""
awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd