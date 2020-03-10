<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_vagas extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->page_title->push('Tipos de Vagas');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_files'), 'admin/tipo_vagas');
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

            $vagas = R::find('tipovagas');

            $this->data['tipo_vagas'] = $vagas;

            /* Load Template */
            $this->template->admin_render('admin/tipo_vagas/index', $this->data);
        }
    }

    public function create()
	{
		/* Breadcrumbs */
		$this->breadcrumbs->unshift(2, 'Tipo de Vagas', 'admin/tipo_vagas/create');
		$this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Variables */
		$tables = $this->config->item('tables', 'ion_auth');

		/* Validate form input */
		$this->form_validation->set_rules('titulo', 'Título', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
            $titulo = strtolower($this->input->post('titulo'));
            
            $vagas = R::dispense( 'tipovagas' );

            $vagas->titulo = $titulo;
            
            $id = R::store( $vagas );
		
		}

		if ($this->form_validation->run() == TRUE)
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/tipo_vagas', 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['titulo'] = array(
				'name'  => 'titulo',
				'id'    => 'titulo',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('titulo'),
			);
			
			/* Load Template */
			$this->template->admin_render('admin/tipo_vagas/create', $this->data);
		}
	}
}