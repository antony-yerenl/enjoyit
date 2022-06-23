<?php
namespace App\Models;
use CodeIgniter\Model;

class ListadoModel extends Model{
    public function __construct(){
        $this->db = db_connect(); // Cargamos la BD
    }

    /** 
     * Esta función mostrará la lista de asesores
     * @return array $query
     */
    public function listarAsesores(){
        $builder = $this->db->table('asesores');
        $builder->select('codigo_asesor, nombre, clientes_asignados, total_pedidos');
        $query   = $builder->get()->getResult('array');

        return $query;
    }

    /** 
     * Esta función mostrará la lista de clientes
     * @return array $query
     */
    public function listarClientes(){
        $builder = $this->db->table('clientes');
        $builder->select('idcliente, total_pedidos, nombre');
        $query   = $builder->get()->getResult('array');

        return $query;
    }

    /** 
     * Esta función mostrará la lista de productos
     * @return array $query
     */
    public function listarProductos(){
        $builder = $this->db->table('productos');
        $builder->select('idproducto, tipo, valor_unitario, cantidad, (cantidad*valor_unitario) AS total');
        $arr_datos = array();
        foreach($query   = $builder->get()->getResult() as $row){
            $arr_datos[$row->idproducto] = array('tipo'=>$row->tipo, 
                                                 'cantidad'=>$row->cantidad,
                                                 'valor_unitario'=>$row->valor_unitario,
                                                 'total'=>$row->total
                                                );
        }

        return $arr_datos;
    }


    /** 
    * Esta función mostrará lo escogido en el combo de Tipo Doc. de Filiación
    * @return array $query
    */
    public function listarDetallePedidos(){
        $builder = $this->db->table('detalle_pedidos dp');
        $builder->select('dp.iddetalle_pedido AS id_pedido, dp.estado, dp.fecha_pago');
        $builder->join('clientes cl', 'cl.idcliente = dp.idcliente');
        $query = $builder->get()->getResult('array');
        var_dump($query);
        return $query;
    }
}
?>