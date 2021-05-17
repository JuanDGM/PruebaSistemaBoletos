# PruebaSistemaBoletos

DESCRIPCIÓN DEL PROYECTO:
Aplicación para la reserva de boletos - (tematica un concierto).

FUNCIONALIDADES DEL PROYECTO:
1. EL cliente ingresa a la pagina web, y registra sus datos para solicitar la reserva de boletas para el concierto.
2. Posteriormente el administrador de la plataforma, de acuerdo a los usuarios registrados, asigna las boletas disponibles.

El administrador puede asignar las boletas a cualquiera de los dos escenarios disponibles: Escenario cubierto o Escenario abierto.

a. Escenario cubierto: la asignación se realiza por ubicación específica. Seleccionar las ubicacion requerida. Puede seleccionarse una o muchas ubicaciones 
para el cliente registrado.

b. Escenario abierto: En la tabla cantidadboletas de la base de datos adjunta, o al momento de realizar la migración, cargar el seeder,
el cual tiene por defecto una disponibilidad de 200 boletas. Este numero puede ajustarse directamente desde la base de datos.

El escenario abierto, no requiere ubicación, por tanto la asignación se realiza de la siguiente manera:

1. Seleccionar al usuario registrado.
2. Registrar la cantidad de boletos requeridas a asignar.

En esta escenario (abierto), de manera adicional, la aplicación muestra la información del cliente, la cantidad de boletas reservadas y los códigos de boletas asignados, al momento de seleccionar al cliente.

DESCRIPCIÓN CARPETAS DEL PROYECTO:
Este proyecto esta compuesto por dos carpetas y la base de datos sql.

1. SistemaReservasBoletas: es el API del proyecto.
2. SistemaReservasBoletas_Frontend: Es el frontend, desde donde se consume el API.
3. sistema_reserva_boletas.sql.

De acuerdo a las variables de entorno del API, el nombre de la base de datos es: sistema_reserva_boletas

IMPORTANTE:
En la tabla cantidadboletas de la base de datos, debe contener la cantidad de boletas para el escenario abierto, por tanto se requiere
ingresar el valor directamente en la base de datos o desde "php artisan db:seed".



