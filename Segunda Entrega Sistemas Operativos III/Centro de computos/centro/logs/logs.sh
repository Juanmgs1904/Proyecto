#!/bin/bash
clear
exeWho(){
	# Muestra un listado de todos los usuarios conectados en el servidor al momemnto de ejecutar
	clear
	echo -e "\e[36mUsuarios conectados en el servidor.\e[0m"
	who
}
exeW(){
	# Muestra un listado de los usuarios conectados con detalles de la sesion
	clear 
	echo -e "\e[36mUsuarios conectados con detalle de sus sesiones.\e[0m"
	w	
}
exeLast(){
	# Muestra todos los inicio de sesion que han habido en el servidor
	clear
	echo -e "\e[36mHistorial de inicio de sesion.\e[0m"
	last
}
exeLast_n(){
	# Muestra los ultimos 15 inicios de sesion que han habido en el servidor
	clear
	echo -e "\e[36mHistorial de los ultimos 15 inicio de sesion.\e[0m"
	last -n 15
}
exeLastLog(){
	# Muestra los inicios de sesion mas recientes
	clear
	echo -e "\e[36mHistorial de inicios de sesion recientes.\e[0m"
	lastlog
}
exeLastB() {
	# Muestra todos los inicios de sesion fallidos
	clear
	echo -e "\e[36mHistorial de inicio de sesion fallidos.\e[0m"
	lastb
}
menu(){
	echo -e "\e[32m********************************\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*       Logs del sistema       *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m********************************\e[0m"
	echo ""
	echo -e "\e[32m¿Que desea visualizar?\e[0m"
	echo "1-Usuarios conectados en el servidor"
	echo "2-Usuarios conectados con detalle de sus sesiones"
	echo "3-Historial de inicio de sesion"
	echo "4-Historial de los ultimos 15 inicio de sesion"
	echo "5-Historial de inicios de sesion recientes"
	echo "6-Historial de inicio de sesion fallidos"
	echo "0-Salir"
}
while true; do
	menu
	read eleccion
	case $eleccion in
		1)
		exeWho
		;;
		2)
		exeW
		;;
		3)
		exeLast
		;;
		4)
		exeLast_n
		;;
		5)
		exeLastLog
		;;
		6)
		exeLastB
		;;
		0)
		clear
		echo -e "\e[31mSaliendo...\e[0m"
		break
		;;
	esac
done
