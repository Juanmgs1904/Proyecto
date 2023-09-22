#!/bin/bash
clear
existe_grupo(){
	local group_name="$1"
    	if getent group "$group_name" >/dev/null; then
        	return 0
    	else
        	return 1
    	fi
} # Corrobora que el grupo exista.

mostrar_menu(){
	clear
	echo "Que desea hacer:"
	echo "1-Crear grupo"
	echo "2-Modificar grupo"
	echo "3-Eliminar grupo"
	echo "0-Salir"
}

gid_mayor(){
	getent group | awk -F: '{print $3}' | sort -n | tail -n 1
} # Muestra el GID de mayor valor numérico

if [ "$EUID" -ne 0 ]; then
    echo -e "\e[31mEste script debe ser ejecutado como root (superusuario).\e[0m"
    exit 1
fi

while true; do
	mostrar_menu
	read opcion
	
	case $opcion in
		1)
		echo "Seguro de crear un grupo? [s/n]"
		read sn
		case $sn in
			s)
			clear
			echo "Ingrese un nombre para el grupo"
			read new_group
			groupadd $new_group
			if [ $? -eq 0 ]; then
                        	echo "El grupo $new_group ha sido creado con éxito"
                    	else
                        	echo "No se pudo crear el grupo $new_group"
                    	fi			
			;;
			n)
			clear
			echo "Operación cancelada"
			echo ""
			;;
			*)
			echo "Opción no válida"
			;;
		esac
		;;
		2)
		echo "Seguro que desea modificar un grupo [s/n]"
		read sn
		case $sn in
			s)
			clear
			echo "Grupos:"
			echo ""
			getent group | awk -F: '$3 > 999 { print $1 } '
			echo ""
			echo "Ingrese el nombre del grupo"
			read mod_group
			if existe_grupo $mod_group; then
			echo "Que desea modificar:"
			echo "1-Cambiar nombre de $mod_group"
			echo "2-Cambiar GID del grupo $mod_group"
			echo "3-Agregar usuario al grupo $mod_group"
			echo "4-Eliminar usuario del grupo $mod_group"
			read answer
			case $answer in
				1)
					clear
					echo "Grupos:"
					echo ""
					getent group | awk -F: '$3 > 999 { print $1 } '
					echo ""
					echo "Ingrese el nuevo nombre para $mod_group"
					read new_name
					groupmod -n $new_name $mod_group
					if [ $? -eq 0 ]; then
						echo "El grupo $mod_group se ha cambiado a $new_name"
					else
						echo "No se ha podido cambiar el nombre del grupo $mod_group"
					fi
					;;
				2)
					clear
					echo "Grupos:"
					echo ""
					getent group | awk -F: '$3 > 999 { print $1 } '
					echo ""	
					echo "Ingrese un número mayor a $(gid_mayor)"
					read new_gid
					groupmod -g $new_gid $mod_group
					if [ $? -eq 0 ]; then
						echo "El GID del grupo $mod_group se ha cambiado a $new_gid"
					else
						echo "No se ha podido cambiar el GID del grupo $mod_group"
					fi
 					;;
				3)
					clear
					echo "Usuarios del sistema"
					awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd
					echo ""
					echo "Grupos:"
					echo ""
					getent group | awk -F: '$3 > 999 { print $1 } '
					echo ""
					echo "Ingrese el nombre del usuario"
					read username
					usermod -aG $mod_group $username
					if [ $? -eq 0 ]; then
						echo "Se ha agregado con éxito al usuario $username al grupo $mod_group"
					else
						echo "No se ha podido agregar el usuario al grupo $mod_group"
					fi
					;;
				4)
					clear
					echo "Usuarios del sistema"
					awk -F':' '$6 ~ /^\/home\// {print $1}' /etc/passwd
					echo ""
					echo "Grupos:"
					echo ""
					getent group | awk -F: '$3 > 999 { print $1 } '
					echo ""
					echo "Ingrese el nombre del usuario"
					read delUser
					gpasswd -d $delUser $mod_group
					if [ $? -eq 0 ]; then
						echo "Se ha removido con éxito al usuario $delUser del grupo $mod_group"
					else
						echo "No se ha podido agregar el usuario al grupo $mod_group"
					fi
					;;
				*)
					echo "Opción no válida"
					;;
				esac
			else
				echo "El grupo $mod_group no existe."
			fi
			;;
			n)
				clear
				echo "Operación cancelada"
				;;
			*)
				echo "Opción no válida"
				;;
			esac
			;;
 		3)
		echo "Seguro que desea eliminar un grupo [s/n]"
		read sn
		case $sn in
			s)
				echo "Grupos:"
				echo ""
				getent group | awk -F: '$3 > 999 { print $1 } '
				echo ""	
				echo "Qué grupo quiere eliminar"
				read del_group
				groupdel $del_group
				if [ $? -eq 0 ]; then
					echo "Se ha eliminado el grupo $del_group"
				else
					echo "No se pudo eliminar el grupo $del_group"
				fi
				;;
			n)
				clear
				echo "Operación cancelada"
				;;

			*)
				echo "Opción no válida"
				;;
		esac
		;;
		0)	
			clear
			exit 1
			break
			;;
		*)
			echo "Opción no válida"
			;;
	esac
done
