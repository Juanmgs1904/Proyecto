#!/bin/bash
clear
echo -e "\e[32m********************************\e[0m"
echo -e "\e[32m*                              *\e[0m"
echo -e "\e[32m*                              *\e[0m"
echo -e "\e[32m*      Centro de computos      *\e[0m"
echo -e "\e[32m*                              *\e[0m"
echo -e "\e[32m*                              *\e[0m"
echo -e "\e[32m********************************\e[0m"

mostrar_menu() {
	echo "Seleccione una opcion:"
	echo "1-Usuarios."
	echo "2-Backup de base de datos."
	echo "3-Logs del sistema."
	echo "0-Salir."
}

while true; do
	mostrar_menu

	read eleccion

	case $eleccion in
		1)
			clear
			cd /home/centro/UsuariosYGrupos
			./abmUsuarios.sh
			;;
		2)
			clear
			cd /home/centro/backup
			./backup.sh
			;;
		3)
			clear
			cd /home/centro/logs
			./logs.sh
			;;
		0)	
			clear
			exit 0
			;;
		*)
			echo "Opcion no disponible. Introduzca un numero del 1 al 4."
			;;
	esac
done
