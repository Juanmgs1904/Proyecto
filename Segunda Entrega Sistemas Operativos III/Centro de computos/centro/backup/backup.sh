#!/bin/bash

# Verifica si el usuario tiene privilegios de superusuario
if [ "$EUID" -ne 0 ]; then
    echo "Este script debe ser ejecutado como root (superusuario)."
    exit 1
fi

menu(){
	echo -e "\e[32m********************************\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*         Backup manual        *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m*                              *\e[0m"
	echo -e "\e[32m********************************\e[0m"
	echo -e "Que desea respaldar:"
	echo "1-Respaldar directorio /etc"
	echo "2-Respaldar /etc/passwd"
	echo "3-Respaldar /etc/group"
	echo "4-Respaldar /etc/shadow"
	echo "5-Respaldar /etc/ssh"
	echo "0-Salir"
}
while true; do
	menu
	read opcion
	case $opcion in
		1)
			clear
			# Directorio de origen
			dir_origen="/etc"
			
			# Directorio de destino, donde se almacenara los respaldos
			dir_backup="/home/centro/backup/backup_etc"
			
			# Fecha de realizacion del respaldo, en formato dia, mes, año, hora, minuto, y segundo
			date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
			
			# Nombre del archivo de respaldo
			backup_file="etc_backup_$date_backup.tar.gz"
			
			tar -czvf "$dir_backup/$backup_file" "$dir_origen"

			# Verifica si el respaldo se realizo correctamente
			if [ $? -eq 0 ]; then
  				echo "Copia de seguridad de /etc completada con éxito en $dir_backup/$backup_file"
			else
  			echo "Error al crear el respaldo de /etc."
			fi
			;;
		2)
			clear
			dir_origen="/etc/passwd"
			dir_backup="/home/centro/backup/backup_passwd"
			date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
			backup_file="etc_passwd_backup_$date_backup.tar.gz"
			
			tar -czvf "$dir_backup/$backup_file" "$dir_origen"

			# Verifica si el respaldo se realizo correctamente
			if [ $? -eq 0 ]; then
  				echo "Copia de seguridad de /etc completada con éxito en $dir_backup/$backup_file"
			else
  			echo "Error al crear el respaldo de /etc."
			fi
			;;
		3)
			clear
			dir_origen="/etc/group"
			dir_backup="/home/centro/backup/backup_group"
			date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
			backup_file="etc_group_backup_$date_backup.tar.gz"
			
			tar -czvf "$dir_backup/$backup_file" "$dir_origen"

			# Verifica si el respaldo se realizo correctamente
			if [ $? -eq 0 ]; then
  				echo "Copia de seguridad de /etc completada con éxito en $dir_backup/$backup_file"
			else
  			echo "Error al crear el respaldo de /etc."
			fi
			;;
		4)	
			clear
			dir_origen="/etc/shadow"
			dir_backup="/home/centro/backup/backup_shadow"
			date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
			backup_file="etc_shadow_backup_$date_backup.tar.gz"
			
			tar -czvf "$dir_backup/$backup_file" "$dir_origen"

			# Verifica si el respaldo se realizo correctamente
			if [ $? -eq 0 ]; then
  				echo "Copia de seguridad de /etc completada con éxito en $dir_backup/$backup_file"
			else
  			echo "Error al crear el respaldo de /etc."
			fi
			;;
		5)
			clear
			dir_origen="/etc/ssh"
			dir_backup="/home/centro/backup/backup_ssh"
			date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
			backup_file="etc_ssh_backup_$date_backup.tar.gz"
			
			tar -czvf "$dir_backup/$backup_file" "$dir_origen"

			# Verifica si el respaldo se realizo correctamente
			if [ $? -eq 0 ]; then
  				echo "Copia de seguridad de /etc completada con éxito en $dir_backup/$backup_file"
			else
  			echo "Error al crear el respaldo de /etc."
			fi
			;;
		0)
			clear
			echo -e "\e[31m Saliendo de los backup manual\e[0m"
			exit 
			break
			;;
		esac
	done