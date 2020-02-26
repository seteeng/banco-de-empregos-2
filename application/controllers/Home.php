<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega helper URL
        //$this->load->helper("url");
    }


	public function index() {
        // Caso sistema funcione apenas logado, descomentar a linha abaixo e importar o helper URL no construtor
        //redirect("admin");
        $this->load->view('public/home', $this->data);
	}
}
