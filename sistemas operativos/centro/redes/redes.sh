#!/bin/bash

clear

# Verificar si el usuario es root
if [ "$(id -u)" != "0" ]; then
    echo "Este script debe ejecutarse con privilegios de superusuario (root)."
    exit 1
fi

# Función para confirmar una operación
confirmar_operacion() {
    echo "¿Estás seguro de realizar esta operación? (s/n)"
    read respuesta

    if [ "$respuesta" != "s" ]; then
        echo "Operación cancelada."
        return 1
    fi
    return 0
}
mensaje() {
	echo -e "\e[31m********************************\e[0m"
	echo -e "\e[31m*                              *\e[0m"
	echo -e "\e[31m*                              *\e[0m"
	echo -e "\e[31m*             REDES            *\e[0m"
	echo -e "\e[31m*                              *\e[0m"
	echo -e "\e[31m*                              *\e[0m"
	echo -e "\e[31m********************************\e[0m"
}


# Función para mostrar el menú
mostrar_menu() {
    echo "Seleccione una opción:"
    echo "1. Mostrar información de todas las conexiones"
    echo "2. Activar una conexión"
    echo "3. Desactivar una conexión"
    echo "4. Mostrar información de una conexión específica"
    echo "5. Crear una nueva conexión"
    echo "6. Editar la configuración de una conexión existente"
    echo "7. Eliminar una conexión"
    echo "8. Mostrar el estado general de Network Manager"
    echo "9. Mostrar información sobre un dispositivo de red"
    echo "10. Activar/desactivar la conectividad de red"
    echo "11. Monitorear eventos de Network Manager en tiempo real"
    echo "12. Recargar la configuración de la conexión de red"
    echo "13. Abrir terminal de conexiones"
    echo "0. Salir"
}

# Bucle principal
while true; do
    mensaje
    mostrar_menu

    read opcion

    case $opcion in
        1)
            clear
            nmcli connection show
            ;;
        2)
            clear
            echo "Ingrese el nombre de la conexión para activar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection up $nombre_conexion
            ;;
        3)
            clear
            echo "Ingrese el nombre de la conexión para desactivar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection down $nombre_conexion
            ;;
        4)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexión para mostrar información:"
            read nombre_conexion
            confirmar_operacion && nmcli connection show $nombre_conexion
            ;;
        5)
            clear
            echo "Creando una nueva conexión..."
            # Solicitar información para configurar la nueva conexión
            echo "Ingrese el tipo de conexión (ethernet, wifi, vpn, etc.):"
            read tipo_conexion

            # Solicitar detalles adicionales según el tipo de conexión
            case $tipo_conexion in
                ethernet)
                    echo "Ingrese el nombre de la conexión:"
                    read nombre_conexion
                    echo "Ingrese el nombre del dispositivo (por ejemplo, eth0):"
                    read nombre_dispositivo
                    ;;
                wifi)
                    echo "Ingrese el nombre de la conexión:"
                    read nombre_conexion
                    echo "Ingrese el nombre de la red WiFi:"
                    read nombre_wifi
                    ;;
                vpn)
                    # Agregar detalles específicos para conexiones VPN si es necesario
                    echo "Ingrese el nombre de la conexión:"
                    read nombre_conexion
                    # Solicitar detalles adicionales específicos para VPN
                    ;;
                *)
                    echo "Tipo de conexión no reconocido."
                    ;;
            esac

            # Confirmar la operación y crear la conexión si el usuario confirma
            if [ $? -eq 0 ]; then
                confirmar_operacion && nmcli connection add type $tipo_conexion con-name $nombre_conexion ifname $nombre_dispositivo
            else
                echo "Operación cancelada."
            fi
            ;;
        6)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexión para editar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection edit $nombre_conexion
            ;;
        7)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexión para eliminar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection delete $nombre_conexion
            ;;
        8)
            clear
            confirmar_operacion && nmcli general
            ;;
        9)
            clear
            echo "Ingrese el nombre del dispositivo de red:"
            read nombre_dispositivo
            confirmar_operacion && nmcli device show $nombre_dispositivo
            ;;
        10)
            clear
            echo "¿Desea activar (on) o desactivar (off) la conectividad de red?"
            read estado
            confirmar_operacion && nmcli networking $estado
            ;;
        11)
            clear
            confirmar_operacion && nmcli monitor
            ;;
        12)
            clear
            echo "Recargando la configuración de la conexión de red..."
            confirmar_operacion && nmcli connection reload
            ;;
        13)
            clear
            confirmar_operacion && nmtui
	    clear
            ;;
        0)
            clear
            echo "Saliendo del script."
            exit 0
            ;;
        *)
            clear
            echo "Opción no válida. Introduzca un número del 1 al 13."
            ;;
    esac
done
