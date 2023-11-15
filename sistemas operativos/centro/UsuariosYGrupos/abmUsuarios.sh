#!/bin/bash
mostrar_menu(){
	echo -e "\e[32m********************************\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*        Crear Usuarios        *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m********************************\e[0m"
	echo ""
	echo "Que desea hacer:"
	echo "1-Agregar usuario"
	echo "2-Eliminar un usuario"
	echo "3-Modificicar usuario"
	echo "4-Ver usuarios del sistema"
	echo "5-Grupos" #Permite crear, eliminar y modificar grupos"
	echo "0-salir"
}
#Bucle el cual mostrara el menu y ejecutara la opción que el usuario decida
clear
while true; do
	mostrar_menu
	read eleccion

	case $eleccion in
		1)#Redirige al archivo de crear usuario
		clear
		echo -e "¿Seguro que desea \e[32mcrear un usuario\e[0m? elija entre [s/n] para confirmar"
		read sn
		case $sn in
			s)
				while true; do
				echo "Elija una opcion"
				echo "1-Crear usuario por defecto sin grupo"
				echo "2-Crear usuario y asignar grupo"
				read opc
				case $opc in
					1)
					clear
					cd /home/centro/UsuariosYGrupos/AltaUsuarios
					./AgregarUsuario.sh
					break
					;;
					2)
					clear
					cd /home/centro/UsuariosYGrupos/AltaUsuarios
					./aGruop.sh
					break
					;;
					*)
					clear
					echo "Opcion no valida"
					break
					;;
					esac
				done
				;;
			n)
				clear
				echo "operación cancelada"
				;;
			*)
				clear
				echo "Opcion no valida"
				;;
			esac
			;;		
		2)
		clear
		echo -e "¿Seguro de \e[31meliminar un usuario\e[0m? [s/n]"
		read sn
		case $sn in
			s)
				clear
				cd /home/centro/UsuariosYGrupos/BajaUsuarios
				./EliminarUsuario.sh
				;;
			n)
				clear
				echo "operación cancelada"
				;;
			*)
				clear
				echo "Opcion no valida"
				;;
			esac
			;;


		3)
		clear
            	echo -e "Ha seleccionado \e[36mModificar Usuario\e[0m, esta seguro [s/n]"
		read sn
		case $sn in
				s)
				clear
				cd /home/centro/UsuariosYGrupos/ModificarUsuarios
				./modUsuario.sh
				;;
				n)
				echo "operación cancelada"
				;;
				*)
				clear
				echo "Opcion no valida"
				;;
			esac
			;;

		4)
			clear
			echo ""
			echo -e "\e[36mUsuarios del sistema:\e[0m"
			awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd	
			#busca en el archivo '/etc/passwd' y selecciona solamente el sexto campo en
			#en el cual la carpeta sea '/home'		
			echo ""
			;;

		5)
			clear
			echo -e "\e[32mSeguro que quiere ser dirijido a la seccion de grupos. [s/n]\e[0m"
			read sn
			case $sn in
				s)
				clear
				cd /home/centro/UsuariosYGrupos
				./createGroup.sh
				;;
				n)
				clear
				echo "operación cancelada"
				;;
				*)
				clear
				echo "Opcion no valida"
				;;
			esac
			;;
        	0)

		clear
           	echo -e "\e[31mSaliendo del programa.\e[0m"
            	exit 0
            	;;
        	*)
		clear
            	echo "Opción no válida. Introduzca un número válido del menú."
            	;;
    	esac
done




	
