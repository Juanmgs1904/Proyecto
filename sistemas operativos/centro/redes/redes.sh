#!/bin/bash

clear

# Verificar si el usuario es root
if [ "$(id -u)" != "0" ]; then
    echo "Este script debe ejecutarse con privilegios de superusuario (root)."
    exit 1
fi

# Funci�n para confirmar una operaci�n
confirmar_operacion() {
    echo "�Est�s seguro de realizar esta operaci�n? (s/n)"
    read respuesta

    if [ "$respuesta" != "s" ]; then
        echo "Operaci�n cancelada."
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


# Funci�n para mostrar el men�
mostrar_menu() {
    echo "Seleccione una opci�n:"
    echo "1. Mostrar informaci�n de todas las conexiones"
    echo "2. Activar una conexi�n"
    echo "3. Desactivar una conexi�n"
    echo "4. Mostrar informaci�n de una conexi�n espec�fica"
    echo "5. Crear una nueva conexi�n"
    echo "6. Editar la configuraci�n de una conexi�n existente"
    echo "7. Eliminar una conexi�n"
    echo "8. Mostrar el estado general de Network Manager"
    echo "9. Mostrar informaci�n sobre un dispositivo de red"
    echo "10. Activar/desactivar la conectividad de red"
    echo "11. Monitorear eventos de Network Manager en tiempo real"
    echo "12. Recargar la configuraci�n de la conexi�n de red"
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
            echo "Ingrese el nombre de la conexi�n para activar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection up $nombre_conexion
            ;;
        3)
            clear
            echo "Ingrese el nombre de la conexi�n para desactivar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection down $nombre_conexion
            ;;
        4)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexi�n para mostrar informaci�n:"
            read nombre_conexion
            confirmar_operacion && nmcli connection show $nombre_conexion
            ;;
        5)
            clear
            echo "Creando una nueva conexi�n..."
            # Solicitar informaci�n para configurar la nueva conexi�n
            echo "Ingrese el tipo de conexi�n (ethernet, wifi, vpn, etc.):"
            read tipo_conexion

            # Solicitar detalles adicionales seg�n el tipo de conexi�n
            case $tipo_conexion in
                ethernet)
                    echo "Ingrese el nombre de la conexi�n:"
                    read nombre_conexion
                    echo "Ingrese el nombre del dispositivo (por ejemplo, eth0):"
                    read nombre_dispositivo
                    ;;
                wifi)
                    echo "Ingrese el nombre de la conexi�n:"
                    read nombre_conexion
                    echo "Ingrese el nombre de la red WiFi:"
                    read nombre_wifi
                    ;;
                vpn)
                    # Agregar detalles espec�ficos para conexiones VPN si es necesario
                    echo "Ingrese el nombre de la conexi�n:"
                    read nombre_conexion
                    # Solicitar detalles adicionales espec�ficos para VPN
                    ;;
                *)
                    echo "Tipo de conexi�n no reconocido."
                    ;;
            esac

            # Confirmar la operaci�n y crear la conexi�n si el usuario confirma
            if [ $? -eq 0 ]; then
                confirmar_operacion && nmcli connection add type $tipo_conexion con-name $nombre_conexion ifname $nombre_dispositivo
            else
                echo "Operaci�n cancelada."
            fi
            ;;
        6)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexi�n para editar:"
            read nombre_conexion
            confirmar_operacion && nmcli connection edit $nombre_conexion
            ;;
        7)
            clear
            nmcli connection show
            echo "Ingrese el nombre de la conexi�n para eliminar:"
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
            echo "�Desea activar (on) o desactivar (off) la conectividad de red?"
            read estado
            confirmar_operacion && nmcli networking $estado
            ;;
        11)
            clear
            confirmar_operacion && nmcli monitor
            ;;
        12)
            clear
            echo "Recargando la configuraci�n de la conexi�n de red..."
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
            echo "Opci�n no v�lida. Introduzca un n�mero del 1 al 13."
            ;;
    esac
done
