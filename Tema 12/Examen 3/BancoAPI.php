<?php
    //Fijacion de parametros
    require_once 'Cliente.php';
    require_once 'Empleado.php';
    $codEstado=400;
    $mensaje='SOLICITUD INCORRECTA';
    $metodo = $_SERVER['REQUEST_METHOD'];

    //Busqueda de clientes segun empleado
    if ($metodo == 'GET') {
        $empleado = Empleado::getEmpleadoById($_REQUEST['dni']);
        if ($empleado) {
            $codEstado = 200;
            foreach (Cliente::getClientesByEmpleado($_REQUEST['dni']) as $cliente) {
                $devolver['clientes'][] = [
                    "nombre" => $cliente->getNombre(),
                    "telefono" => $cliente->getTelefono()
                ];
            }
            if (count($devolver['clientes']) == 0) {
                //Si el empleado no tiene clientes entra aquí
                $mensaje = "EL EMPLEADO NO TIENE CLIENTES";
            } else {
                //Si el empleado tiene clientes entra aquí
                $mensaje = "BUSQUEDA EXITOSA";
            }
        } else {
            //Si el DNI no se corresponde con el de algun empleado entra aquí
            $mensaje = "EL DNI NO SE CORRESPONDE CON EL DE UN EMPLEADO";
            $codEstado=404;
        }
    //Añadir un nuevo cliente
    } else if ($metodo == 'POST') {
        if (Cliente::getClienteById($_REQUEST['dni_c'])) {
            //Si el cliente ya existe entra aquí
            $mensaje = "CONFLICTO, YA EXISTE EL CLIENTE";
            $codEstado = 409;
        } else if (!Empleado::getEmpleadoById($_REQUEST['dni_e'])) {
            //Si el empleado no existe entra aquí
            $mensaje = "EL GESTOR NO EXISTE";
            $codEstado = 404;
        } else {
            //Si no existen problemas entra aquí
            $cliente = new Cliente($_REQUEST['dni_c'], $_REQUEST['nombre'], $_REQUEST['direccion'], $_REQUEST['telefono'], $_REQUEST['dni_e']);
            $cliente->insert();
            $mensaje = "CLIENTE AÑADIDO EXITOSAMENTE";
            $codEstado = 200;
        }
    //Actualizar el gestor de un cliente 
    } else if ($metodo == 'PUT') {
        parse_str(file_get_contents("php://input"),$parametros);
        if (!Cliente::getClienteById($parametros['dni_c'])) {
            //Si el cliente no existe entra aquí
            $mensaje = "EL CLIENTE NO EXISTE";
            $codEstado = 404;
        } else if (!Empleado::getEmpleadoById($parametros['dni_e'])) {
            //Si el empleado no existe entra aquí
            $mensaje = "EL GESTOR NO EXISTE";
            $codEstado = 404;
        } else {
            //Si no existen problemas entra aquí
            $cliente = Cliente::getClienteById($parametros['dni_c']);
            $cliente->update();
            $mensaje = "GESTOR ACTUALIZADO EXITOSAMENTE";
            $codEstado = 200;
        }
    //Eliminar un empleado
    } else if ($metodo == 'DELETE') {
        parse_str(file_get_contents("php://input"),$parametros);
        if (!Empleado::getEmpleadoById($parametros['dni'])) {
            //Si el empleado no existe entra aquí
            $mensaje = "EL EMPLEADO NO EXISTE";
            $codEstado = 404;
        } else if (Cliente::existeClienteGestor($parametros['dni'])) {
            //Si el empleado tiene clientes entra aquí
            $mensaje = "EL EMPLEADO TIENE CLIENTES, POR LO QUE NO PUEDE SER BORRADO";
            $codEstado = 409;
        } else {
            //Si no existen problemas entra aquí
            $cliente = Empleado::getEmpleadoById($parametros['dni']);
            $cliente->delete();
            $mensaje = "EMPLEADO ELIMINADO EXITOSAMENTE";
            $codEstado = 200;
        }
    }
    $devolver['mensaje'] = $mensaje;
    $devolver['codEstado'] = $codEstado;
    echo json_encode($devolver);
?>