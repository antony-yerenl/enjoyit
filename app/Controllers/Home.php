<?php

namespace App\Controllers;
use App\Models\ListadoModel;

class Home extends BaseController{
    public function index(){
        $listados = new ListadoModel();

        # Listamos los registros de la tabla asesores
        $data = $listados->listarAsesores();

        # Listamos los registros de la tabla detalle_pedidos
        $arr_listado  = $listados->listarDetallePedidos();

        # Listamos los registros de la tabla clientes
        $arr_clientes  = $listados->listarClientes();

        # Listamos los registros de la tabla productos
        $arr_productos  = $listados->listarProductos();

        $data[0]['clientes'] = $arr_clientes;
        $data[0]['clientes'][0]['detalle_pedidos'] = $arr_listado;
        $data[0]['clientes'][0]['detalle_pedidos'][0]['productos'] = $arr_productos;

        # Lo preparamos para que puedan consumir el API
        echo json_encode($data);
    }
}
