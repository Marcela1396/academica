<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null) {
		$this->load->view('docentes.php',(array)$output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
    
    public function perfil() {
        if ($this->session->userdata('rol') != 'docente') redirect('inicio');
        $this->load->view('encabezado');
        $this->load->view('menu_doc');
        $this->load->model('m_usuarios');
        $profesor = $this->m_usuarios->buscar_profesor();
        
        $this->form_validation->set_rules('txtced','Cedula','required');
        $this->form_validation->set_rules('txtnom','Nombre','required');
        $this->form_validation->set_rules('txtpass','Contraseña','required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('docente/perfil', $profesor);
        }
        else {
            //Configuraciones de archivo subido (debe ser compatible con la configuracion del servidor php.ini)
            $config['upload_path']          = './uploads/perfil/';
            $config['allowed_types']        = 'jpg';
            $config['max_size']             = 2000;
            $config['file_name'] = $this->session->userdata('id');
            $config['overwrite'] = TRUE;
            $config['file_ext_tolower'] = TRUE;
            
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            
            $res['mensaje'] = $this->m_usuarios->actualizar_perfil_profesor();
            $this->load->view('mensaje',$res);
        }
	}

	public function formacion() {
        if ($this->session->userdata('rol') != 'docente') redirect('inicio');
        $this->load->view('encabezado');
        $this->load->view('menu_doc');
		$crud = new grocery_CRUD();

		$crud->set_table('estudios')
		// Campos que va a mostrar
		->columns('titulo_est','fecha_grado_est','nivel_form_est','modalidad_est') 
		// Campos que puede editar
		->fields('titulo_est','fecha_grado_est','nivel_form_est','modalidad_est','usuario') 
		// Cambia el titulo de Añadir Registro por Añadir Estudio
		->set_subject('estudio')
		// Titulos de la tabla
		->display_as('titulo_est', 'Titulo')
		->display_as('fecha_grado_est', 'Fecha Grado')
		->display_as('nivel_form_est', 'Nivel Formacion')
		->display_as('modalidad_est', 'Modalidad')

		//Campos requeridos
		->required_fields('titulo_est','fecha_grado_est','nivel_form_est','modalidad_est') 
		
        //Campo Oculto
        ->field_type('usuario', 'hidden', $this->session->userdata('id'))    
        
        // Mostrar solo lo que corresponde al usuario
        ->where('usuario', $this->session->userdata('id'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function productividad() {
		if ($this->session->userdata('rol') != 'docente') redirect('inicio');
        $this->load->view('encabezado');
        $this->load->view('menu_doc');
		$crud = new grocery_CRUD();

		$crud->set_table('productividad')
		// Campos que va a mostrar
		->columns('titulo_prod','tipo_prod','fecha_real_prod','lugar_prod','descripcion_prod') 
		// Campos que puede editar
		->fields('titulo_prod','tipo_prod','fecha_real_prod','lugar_prod','descripcion_prod','usuario') 
		// Cambia el titulo de Añadir Registro por Añadir Productividad
		->set_subject('productividad')
		// Titulo de la tabla
		->display_as('titulo_prod', 'Titulo')
		->display_as('tipo_prod', 'Tipo')
		->display_as('fecha_real_prod', 'Fecha Producción')
		->display_as('lugar_prod', 'Lugar de Producción')
		->display_as('descripcion_prod', 'Descripción')

		//Campos requeridos
		->required_fields('titulo_prod','tipo_prod','fecha_real_prod','lugar_prod','descripcion_prod')
        
        //Campo Oculto
        ->field_type('usuario', 'hidden', $this->session->userdata('id'))
        ->add_action('Subir Certificados',base_url(). 'static/recursos/upload.gif','profesores/form_certificados')
		->add_action('Ver Certificados',base_url(). 'static/recursos/doc.png','profesores/ver_certificados')
		
        // Mostrar solo lo que corresponde al usuario
        ->where('usuario', $this->session->userdata('id'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function form_certificados($llave){
		$arr['llave'] = $llave;
		$arr['error'] = "";
		$this->load->view('encabezado');
		$this->load->view('menu_doc');
		$this->load->view('form_certificados', $arr);
	}

	public function upload_certificados(){
		$config['upload_path'] = "./uploads/docs/";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = "4000"; //KB
		$config['file_name'] = "c" . $this->input->post('llave') . "_";
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload()){
			$arr = array('error' => $this->upload->display_errors());
			$arr['llave'] = $this->input->post('llave');
			$this->load->view('encabezado');
			$this->load->view('menu_doc');
			$this->load->view('form_certificados', $arr);
		}

		else{
			$arr = array("mensaje" => $this->upload->data());
			$this->load->view('encabezado');
			$this->load->view('menu_doc');
			$this->load->view("msj_carga",$arr);
		}
	}


	public function ver_certificados($var){
		$arr['llave'] = $var;
		$this->load->helper("directory");
		$this->load->view('encabezado');
		$this->load->view('menu_doc');
		$this->load->view('visualizar_certificados', $arr);
	}


    
    public function eventos() {
		if ($this->session->userdata('rol') != 'docente') redirect('inicio');
		$this->load->view('encabezado');
		$this->load->view('menu_doc');
		$prefs = array (
			'show_next_prev'  => TRUE,
			'next_prev_url'   => base_url() . "profesores/eventos"
		);
		$this->load->library('calendar',$prefs);
		$this->load->model('m_usuarios');
		$res['eventos'] = $this->m_usuarios->consultar_eventos();
		$this->load->view('docente/calendario',$res);
	}
    
    public function ver_detalles($ideve) {
        if ($this->session->userdata('rol') != 'docente') redirect('inicio');
		$this->load->view('encabezado');
		$this->load->view('menu_doc');
        $this->load->model('m_usuarios');
        $evento['evento'] = $this->m_usuarios->buscar_evento($ideve);
        $this->load->view('docente/detalle_evento', $evento);
    }
}