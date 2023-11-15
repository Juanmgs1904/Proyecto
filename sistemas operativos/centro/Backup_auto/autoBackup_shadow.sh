#!/bin/bash
# Directorio de origen
dir_origen="/etc/shadow"
# Destino
dir_backup="/home/centro/Backup_auto/backupShadow"
# Fecha en formato dia,mes,año,hora,minuto,segundo
date_backup=$(date +"%d-%m-%Y_%H-%M-%S")
# Nomrbe del archivo, con fecha de creación
backup_file="shadow_backup_$date_backup.tar.gz"

tar -czvf "$dir_backup/$backup_file" "$dir_origen"

# Verifica si el respaldo se realizo correctamente
if [ $? -eq 0 ]; then
	echo "Copia de seguridad de /etc/shadow completada con éxito"
	echo "La copia se ubica en $dir_backup/$backup_file"
else
	echo "Error al crear el respaldo de /etc/shadow."
fi

