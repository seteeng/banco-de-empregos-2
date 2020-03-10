<?php
class TipoContrato_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_contratos()
    {     
        $query = $this->db->get_where('tipoContrato');
        //var_dump($query);
        return $query->result();
    }
}
?>
