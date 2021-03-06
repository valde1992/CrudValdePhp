<?php 

	session_start();

	require_once "sesioncontroller.php";	

	// si está logueado, lo dejamos acceder al listado y a las operaciones
	if(estaLogueado() && tienePermiso("1")){

		require_once "../modelo/cliente.class.php";
		require_once "../modelo/nacionalidad.class.php";

		$title = "Nuevo cliente";

		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			try
			{

				// Traemos las nacionalidades para mostrarlas en el select del form
				$nacionalidades = new Nacionalidad();
				$nacionalidad   = $nacionalidades::listar();

				require "../vistas/nuevo.php";

				// Limpiamos los posibles errores y datos que estemos mostrando o no
				unset($_SESSION["errores"]);
				unset($_SESSION["cliente"]);

			} catch(Exception $e) {
				header("Location: ../vistas/home.php?msg".$e->getMessage());
			}

			die();

		}

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			require "validatorcontroller.php";

			$cliente["nombre"]          = $_POST['nombre'];
			$cliente["apellido"]        = $_POST['apellido'];
			$cliente["fecha_nac"]       = $_POST['fecha_nac'];
			$cliente["nacionalidad_id"] = $_POST['nacionalidad_id'];
			$cliente["activo"]          = $_POST['activo'];

			// Validamos los datos
			$_SESSION["errores"] = validarCliente($cliente);

			// Verificamos si hay errores, si hay volvemos al form y los mostramos
			if(count($_SESSION["errores"])) {

				$_SESSION["cliente"] = $cliente;
				header("Location: nuevocontroller.php");

			} else {

				// Si no hay errores, pegamos en  la BD
				$cli      = new Cliente();
				$clientes = $cli::alta($cliente);

				// Informamos
				$_SESSION["mensaje"] = "El cliente " . $cliente["nombre"] . " " . $cliente["apellido"] . " ha sido creado éxitosamente";

				header("Location: homecontroller.php");
				unset($_SESSION["errores"]);

			}

			die();

		}
	} else {
		// si no está logueado, lo mandamos a la vista anónimo donde no podrá ver nada hasta loguearse
		$_SESSION["errores"] = "Usted no tiene permiso o no está logueado.";	

		unset($_SESSION["errores"]);
		
		require "homecontroller.php";
	}