# ¡Bienvenido a un API RESTful con php!

## ¡Si usas esta API dale una estrella!

![enter image description here](https://media.discordapp.net/attachments/1026681338138468427/1083198318471020584/Screenshot_1.png?width=1440&height=304)

Esta API forma parte de una asignación de la clase de Desarrollo de aplicaciones móbiles 2 de la **Universidad Centroamericana** (UCA) y tiene como propósito servir de guia para la creación de APIs. 

# Recursos

Los recursos son las tablas que tenemos disponibles en la base de datos. En este ejemplo de tenemos 3 recursos: **Libros**,** Autores** y **géneros**.

Guardamos los recursos disponibles en el arreglo `$allowedResourceTypes`.Usamos una variable `$resourceType` para identificar a qué tabla quiere acceder, la cual tiene que ser enviada en la URL por el método **GET**. De esta manera no tenemos que hacer uso de múltiples archivos, si no que podemos acceder a diferentes tablas usando simplemente el index.

Usamos un **if** para matar la ejecución si dentro de la variable no viene el nombre de un recurso disponible.

    if(!in_array($resourceType, $allowedResourceTypes)){
	    die;
	}
	
## Switch principal (identificación de método)

Mediante una switch, identificamos qué función (buscar, insertar, actualizar o eliminar) quiere realizar el usuario. PHP tiene el arreglo `$_SERVER['REQUEST_METHOD']` que permite conocer **que método se está utilizando** y lo transformamos en mayúsculas con el método `strtoupper` para evitar cualquier error.

## Switch GET (identificación de recurso)

Usamos la variable `$resourceId`, para saber si se está solicitando **todos los datos o solo uno en específico**. Utilizamos la condicional `$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';` para saber si se está enviando la key `resource_id`, en caso de no sea asi, le asignamos a la variable un string vacío. De esta manera dentro del **if** validamos si `$resourceId` contiene un string vacío o no. 

    if($resourceId != ''){
	    $q = 'SELECT * FROM books WHERE id =' . $resourceId;
	    $query = mysqli_query($con, $q);
	}else{
		$q = 'SELECT * FROM books';
		$query = mysqli_query($con, $q);
	}
