<?php 

	session_start();

	require_once "sesioncontroller.php";

	// si está logueado, lo dejamos acceder al listado y a las operaciones
	if(estaLogueado() && tienePermiso("3")){

		require_once "../modelo/cliente.class.php";
		require_once "../modelo/nacionalidad.class.php";

		$title = "Editar cliente";

		if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
			
			try
			{

				// Traemos los datos del cliente para mostrarlos en el form para su edición
				$id      = $_GET['id'];
				$cliente = new Cliente();
				$cliente = $cliente::consulta($id);

				$nacionalidades = new Nacionalidad();
				$nacionalidad   = $nacionalidades::listar();

				$title .= " " . $cliente['nombre'] . " " . $cliente['apellido'];

				require "../vistas/editar.php";

				unset($_SESSION["errores"]);

			} catch(Exception $e) {
				header("Location: ../vistas/home.php?msg".$e->getMessage());
			}
			die();

		}

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			require "validatorcontroller.php";

			$cliente["id"]              = $_POST['id'];
			$cliente["nombre"]          = $_POST['nombre'];
			$cliente["apellido"]        = $_POST['apellido'];
			$cliente["fecha_nac"]       = $_POST['fecha_nac'];
			$cliente["nacionalidad_id"] = $_POST['nacionalidad_id'];
			$cliente["activo"]          = $_POST['activo'];

			// Validamos los datos
			$_SESSION["errores"] = validarCliente($cliente);

			// Verificamos si hay errores, si hay volvemos al form y los mostramos
			if(count($_SESSION["errores"])) {

				header("Location: editarcontroller.php?id=" . $cliente["id"]);

			} else {

				// Si no hay errores, pegamos en  la BD
				$cli      = new Cliente();
				$clientes = $cli::modificar($cliente);

				// Si salió bien, informamos
				if($clientes){

					$_SESSION["mensaje"] = "El cliente " . $cliente["nombre"] . " " . $cliente["apellido"] . " ha sido modificado éxitosamente";

				} else {

					$_SESSION["errores"] = "ERROR";	
						
				}

				header("Location: homecontroller.php");

			}

			die();
			unset($_SESSION["errores"]);

		}
	} else {
		// si no está logueado, lo mandamos a la vista anónimo donde no podrá ver nada hasta loguearse
		$_SESSION["errores"] = "Usted no tiene permiso o no está logueado.";	

		require "homecontroller.php";
		unset($_SESSION["errores"]);
	}