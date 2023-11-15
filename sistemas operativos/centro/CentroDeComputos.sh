#!/bin/bash
clear
mensaje() {
	echo -e "\e[32m********************************\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*      Centro de computos      *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m********************************\e[0m"
}


mostrar_menu() {
	echo "Seleccione una opcion:"
	echo "1-Usuarios."
	echo "2-Realizar Backup's."
	echo "3-Logs del sistema."
	echo "4-Redes."
	echo "0-Salir."
}

confirmar_operacion() {
    echo -e "\e[32m¿Estás seguro de realizar esta operación? (s/n)\e[0m"
    read respuesta

    if [ "$respuesta" != "s" ]; then
        echo "Operación cancelada."
        return 1
    fi
    return 0
    clear
}

while true; do
	mensaje
	mostrar_menu

	read eleccion

	case $eleccion in
		1)
			clear
			cd /home/centro/UsuariosYGrupos
			confirmar_operacion && ./abmUsuarios.sh
			;;
		2)
			clear
			cd /home/centro/backup
			confirmar_operacion && ./backup.sh
			;;
		3)
			clear
			cd /home/centro/logs
			confirmar_operacion && ./logs.sh
			;;
		4)
			clear		
			cd /home/centro/redes
			confirmar_operacion && ./redes.sh
			;;
		0)	
			clear
			exit 0
			;;
		*)
			clear
			echo "Opcion no disponible. Introduzca un numero del 1 al 4."
			;;
	esac
done
