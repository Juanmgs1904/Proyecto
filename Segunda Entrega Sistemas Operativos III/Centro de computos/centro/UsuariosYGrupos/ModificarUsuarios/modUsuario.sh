#!/bin/bash
clear
mostrar_menu(){
	echo "Elija una opción:"
	echo "1-Cambiar nombre de usuario"
	echo "2-Cambiar el directorio"
	echo "3-Cambiar fecha de expiración de usuario"
	echo "0-Salir"
}
mostrar_usuarios(){
	echo -e "\e[32mUsuarios del sistema:\e[0m"
	awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd	
}
while true; do
echo -e "\e[31mSi desea salir coloque un usuario invalido\e[0m"
mostrar_usuarios
echo ""
echo -e "\e[36mIngrese un usuario para continuar:\e[0m"
read moduser
if [ ! -z "$moduser" ]; then
	if id "$moduser" &>/dev/null; then		
		mostrar_menu
		read op
		case $op in
			1)
				clear
				echo -e "\e[36mIngrese el nuevo nombre\e[0m"
				read newname
				echo -e "Seguro de cambiar el nombre de \e[36m$moduser\e[0m por \e[36m$newname\e[0m [s/n]"
				read sn
				case $sn in
					s)
						usermod -l $newname $moduser
						if [ $? -eq 0 ]; then
              						echo "El nombre se ha cambiado con exito, el nuevo nombre es $newname"
      						else
							echo "No se pudo realizar el cambio"
						fi
						;;
					n)
						echo "Operación cancelada"
					;;	
					*)
						echo "Opcion no valida"
					;;
				esac
				;;
			2)
				clear
				echo "Ingrese el nombre del nuevo directorio"
				read newdir
				echo -e "Seguro de cambiar el directorio del usuario \e[36m$moduser\e[0m[s/n]"
				read sn
				case $sn in
					s)	
						usermod -d /home/$newdir -m $moduser
						if [ $? -eq 0 ]; then
              						echo "El cambiado ha sido un exito, la nueva ubicación es /home/$newdir"
      						else
							echo "No se pudo realizar el cambio"
						fi
						;;
					n)
						echo "Operación cancelada"
					;;	
					*)
						echo "Opcion no valida"
					;;
				esac
				;;
			3)
				clear
				echo "Seguro que desea agregar una fecha de expiracion para el usuario $moduser"
				read sn
				case $sn in
					s)	
						echo "Año:"
						read year
						echo "mes"
						read month
						echo "dia:"
						read day
						usermod -e $year-$month-$day $moduser
						if [ $? -eq 0 ]; then
              						echo "El cambiado ha sido un exito, la cuante expirara el $year-$month-$day"
      						else
							echo "No se pudo realizar el cambio"
						fi
						;;
					n)
						echo "Operación cancelada"
					;;	
					*)
						echo "Opcion no valida"
					;;
				esac
				;;	
			0)
				clear
				echo "Adios"
				exit 1
				break
				;;
			*)
				echo "Operación invalida"
			;;
		esac
		else
			clear
			echo "Nombre de usuario no válido"
			break
		fi
	else
		echo "Nombre de usuario no válido"
	fi
done
		