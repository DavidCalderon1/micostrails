# prueba_backend
Prueba para el cargo de backend en merqueo

# Descripción

Esta prueba fue desarrollada en Laravel 5.5, con conexion a mysql, tiene funcionalidades de web y API Rest, incluye las migraciones y los sembradores de la base de datos por lo que solo es necesario crear la base de datos y el usuario con los permisos, los nombres de estos datos estan en el archivo .env.example ubicado en la raiz del proyecto

## Base de datos

Se realizo el analisis del problema y se diseño la base de datos
- Se creo el script de la estructura: Script estructura db online_store.sql
- El MER en jpg: EER online_store.png
- Adicional a esto se incluyo el archivo con el diagrama creado en mysql workbench: EER online_store.mwb

Los anteriores archivos estan en la carpeta database

### En cuanto a la estructura de la base de datos:

- La tabla users almacena los datos de los usuarios, se decidio de los administradores, clientes y transportadores fueran usuarios de la aplicación que se lograrian catalogar a partir del rol.
- La tabla roles almacena los datos de los roles y se vincula con los usuarios a travez de la tabla users_has_roles
- Los usuarios con el rol de transportadores tienen asociados unos vehiculos a travez de la tabla transporters_has_vehicles
- La tabla vehicles almacena los datos de los vehiculos y tiene asociado un tipo de vehiculo a travez de la tabla type_vehicle
- La tabla users_addresses almacena las direcciones de los usuarios, contiene la direccion el texto, las coordenadas y la ciudad de cada direccion
- La tabla cities almacena los datos de las ciudades
- La tabla orders almacena los datos de las ordenes por parte de los clientes, tiene asociado al usuario creador, al cliente, al transportador, a la bodega, a la direccion del cliente, tiene asociado tambien un estado a travez de la tabla status y los productos a travez de la tabla sales en donde se almacena la cantidad de cada producto
- La tabla providers almacena los datos de los proveedores y se vincula con los productos a travez de la tabla products_has_providers en donde se registra el costo de cada producto
- La tabla products almacena los datos de los productos
- La tabla purchases almacena los datos de las compras por parte de la empresa, tiene asociado un proveedor, al igual que una bodega y tambien tiene asociado los productos a travez de la tabla purchases_detail en donde se almacena la cantidad de cada producto
- La tabla storages almacena los datos de las bodegas, tiene asociada la ciudad y se vincula con los productos a travez de la tabla storages_has_products en donde se registra el precio de venta de cada producto

## solucion del problema

Se creo un servicio de tipo API para consultar las ordenes, los parametros que recibe este servicio son:
			- id = id de la orden
			- creator_id = id del usuario que creo la orden
			- client_id = id del cliente al que esta asociada la orden
			- transporter_id = id del transportador asignado a la orden
			- storage_id = id de la bodega a la que se registro la orden
			- users_addresses_id = id de la direccion de destino del cliente registrada
			- delivery_date = fecha de entrega
			- priority = prioridad
			- status_id = estado
			- paid = 0 no se ha realizado el pago de la orden, 1 orden pagada
			- limit = limite o cantidad de registros a mostrar
			- offset = numero del grupo de registros, el parametro limit especifica el tamaño de cada grupo
	
El servicio de las ordenes retorna los datos basicos de las ordenes en donde adicionalmente incluye:
      - el nombre del transportador
      - la lista de los productos con su nombre, descripcion, cantidades, el parametro from_inventory para determinar la cantidad de unidades que se pueden obtener del inventario y el parametro from_providers para la cantidad de unidades que no estan disponibles y es necesario solicitarlas a los proveedores del producto
      
Ejemplo, para consultar las ordenes que pertenecen a un cliente y que tienen el mismo lugar de entrega:  /api/orders?client_id=4&users_addresses_id=4
      



Se creo un servicio de tipo API para consultar los productos, los parametros que recibe este servicio son:
			- id = id del producto
			- name = nombre del producto
			- delivery_date = fecha de entrega, al especificarlo se obtienen los productos que se registraron en las ordenes con esa fecha de entrega
			- cond = parametro para filtrar las ventas de los productos, el cual tiene dos posibles valores
				- least-sold = se obtendrian los productos menos vendidos ordenados de forma descendente por la cantidad de unidades vendidas que es retornado en el parametro: quantities_sold 
				- most-sold = se obtendrian los productos mas vendidos ordenados de forma ascendente por la cantidad de unidades vendidas que es retornado en el parametro: quantities_sold
			- limit = limite o cantidad de registros a mostrar
			- offset = numero del grupo de registros, el parametro limit especifica el tamaño de cada grupo

Ejemplo, para consultar los productos menos vendidos que se entregaron el 1 de marzo del 2019:  /api/products?cond=least-sold&delivery_date=2019-03-01
      
Ejemplo, para consultar los productos mas vendidos que se entregaron el 1 de marzo del 2019:  /api/products?cond=most-sold&delivery_date=2019-03-01




Se creo un servicio de tipo API para consultar el inventario de las bodegas, los parametros que recibe este servicio son:
			- id = id de la bodega, puede ser de tipo numero o array
			- name = nombre de la bodega
			- city_id = id de la ciudad de la bodega
			- products_ids = ids de la lista de productos de los que se quiere saber el inventaro, debe ser de tipo array 
			- limit = limite o cantidad de registros a mostrar
			- offset = numero del grupo de registros, el parametro limit especifica el tamaño de cada grupo
      
Este servicio retorna el inventario agrupado por bodegas, dentro de las cuales el dato 'inventory' contiene uno a uno los porductos con su informacion junto con la cantidad de compras (puchases) y ventas (sales), este ultimo determinado a partir de las ordenes que ya estan pagadas

Ejemplo, para consultar el inventario de la bodega llamada 'Chapinero':  /api/storages/inventory?name=Chapinero


Al revisar los datos de entrada se encontraron algunos errores:
      - el inventario estaba incompleto, hacian falta productos que tenian asociados algunos proveedores o visto de otra manera, los proveedores tenian asignados productos que no existian
      - las ordenes tenian registrados productos que no existian en el inventario 
      

Como valor adicional decidi hacer la parte web (lo cual me tomo un poco mas de tiempo), para poder registrar los datos de cada tabla y poder comprobar o comparar con mayor claridad los resultados de las API's 
