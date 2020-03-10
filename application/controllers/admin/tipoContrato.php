<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoContrato extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->page_title->push('Tipos de Contratos');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1,'Tipos de Contratos' , 'admin/tipocontrato');
    }

    public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['error'] = NULL;

            /* Carrega Model */
            $this->load->model('admin/tipoContrato_model');

            /* Retornado Contratos */
            $contratos = $this->tipoContrato_model->get_contratos();
            
            /* Array Contratos vai para a View */
            $this->data['contratos'] = $contratos;

            /* Load Template */
            $this->template->admin_render('admin/contrato_view/index', $this->data);
        }
	}

    public function showcontratos() {
        $this->load->model('admin/tipoContrato_model');
        $contratos = $this->tipoContrato_model->get_contratos();
        $data['contratos'] = $contratos;
        $this->load->view('admin/contrato_view', $data);
        
    }

    public function create()
	{
		/* Breadcrumbs */
		$this->breadcrumbs->unshift(2, 'Tipos de Contratos', 'admin/tipoContrato/create');
		$this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Variables */
		$tables = $this->config->item('tables', 'ion_auth');

		/* Validate form input */
		$this->form_validation->set_rules('nome', 'Nome do Contrato', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
            $nome = strtolower($this->input->post('nome'));
            
            $contratos = R::dispense( 'tipocontrato' );

            $contratos->nome = $nome;
            $contratos->active = 1;
            
            R::store( $contratos );		

            $this->session->set_flashdata('Gravado');

            redirect('admin/tipocontrato', 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['nome'] = array(
				'name'  => 'nome',
				'id'    => 'nome',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('nome'),
			);
			
			/* Load Template */
			$this->template->admin_render('admin/contrato_view/create', $this->data);
		}
	}

}
?>
