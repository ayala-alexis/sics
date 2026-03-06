<?php
require_once dirname(__FILE__) . '/cheque/DBSics.php';
class ModelDB
{
    private $db;
    
    public function __construct()
    {
        $this->db = new DBSics();
    }
    // Ejecuta una consulta y retorna un solo registro
    public function find($qry, $params = array())
    {
        return $this->db->sql_select_one($qry, $params);
    }
    // Ejecuta una consulta y retorna todos los registros
    public function findAll($qry, $params = array())
    {
        return $this->db->sql_select_all($qry, $params);
    }
    // Crea un registro en la base de datos y retorna el id insertado
    public function create($qry, $params = array())
    {
        return $this->db->sql_save_id($qry, $params);
    }
    // Ejecuta un query y retorna el resultado true o false
    public function query($qry, $params = array())
    {
        return $this->db->sql_query($qry, $params);
    }

    //Listado de catalogos

    //Listado de empresas por usuario
    public function get_empresas_user($id_usuario){
        return $this->findAll(
            "select
                distinct
                e.id_empresa keyCode,
                e.emp_nombre keyValue
            from acc_emp_cc ac
            inner join empresa e 
            on ac.id_empresa = e.id_empresa 
            where id_usuario = :id
            order by e.emp_nombre ",
            [':id' => $id_usuario]
        );
    }
    //Listado de cc por empresa (segun usuario)
    public function get_cc_empresa_user($id,$id_usuario){
        return $this->findAll(
            "select
                distinct
                c.id_cc keyCode,
                c.cc_descripcion keyValue
            from acc_emp_cc ac
            inner join cecosto c  
            on ac.id_empresa = c.id_empresa 
            where ac.id_usuario = :id_usuario and ac.id_empresa = :id_empresa
            order by c.cc_descripcion ",
            [':id_usuario' => $id_usuario, ':id_empresa' => $id]
        );
    }

    //Listado de categorias por tipo (compras | cheques)
    public function get_categorias_tipo($tipo){
        return $this->findAll(
            "select
                id keyCode,
                categoria keyValue,
                gcia keyGroup
            from cat_gerencias 
            where mod_solicitud = :tipo
            order by gcia,categoria ",
            [':tipo' => $tipo]
        );
    }
    //Listado de categorias por compras
    public function get_categorias_compras(){
        return $this->get_categorias_tipo("Solicitud de compras");
    }

    //Busqueda de productos para adicionar detalle
    public function get_productos_cat($id,$search){
        return $this->findAll(
            "select
                id_producto keyCode,
                codigo_producto keyValue,
                descripcion_producto keyDescription
            from fproductos
            where id_categoria = :id and lower(concat(codigo_producto,' ',descripcion_producto)) like lower(concat('%',:search,'%'))
            order by descripcion_producto
            limit 10 ",
            [
                ':id'       => $id, 
                ':search'   => $search
            ]
        );
    }
}
?>