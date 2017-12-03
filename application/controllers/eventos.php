<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	public function adicionar_eve(){
		if ($this->session->userdata('rol') != 'administrador') redirect('inicio');

		$this->load->view('encabezado');
		$this->load->view('menu_adm');
		$this->form_validation->set_rules('txtnomeve','Nombre Evento','required');
		$this->form_validation->set_rules('txttipoeve','Tipo Evento','required');
		$this->form_validation->set_rules('txtlugeve','Lugar Evento','required');
		$this->form_validation->set_rules('txtfechaIneve','Fecha Inicial Evento','required');
		$this->form_validation->set_rules('txtfechaFneve','Fecha Fin Evento','required');
		$this->form_validation->set_rules('txtvaleve','Valor Evento','required');
		$this->form_validation->set_rules('txtusuario','Usuario','required');

		$this->load->model('m_usuarios');
        $res['usuarios'] = $this->m_usuarios->consultar_docentes();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('eventos/nuevo_evento', $res);
		} else {
            $this->load->model('m_eventos');
			$res['mensaje'] = $this->m_eventos->nuevo_evento();
            $this->load->view('mensaje',$res);
		}
        
	}

	public function listar_eve($par){
		if ($this->session->userdata('rol') != 'administrador') redirect('inicio');
		$this->load->view('encabezado');
        $this->load->view('menu_adm');
        $this->load->model('m_eventos');
		$arr['eventos'] = $this->m_eventos->consultar_eventos();

		if($par == '1'){
			//Modificar
			$arr['opcion'] = 'modificar_evento';
		}
		else{
			// Eliminar
			$arr['opcion'] = 'eliminar_evento';
		}
		$this->load->view('eventos/list_eventos',$arr);

	}

	public function modificar_evento(){
		if ($this->session->userdata('rol') != 'administrador') redirect('inicio');

        $this->load->view('encabezado');
        $this->load->view('menu_adm');
        $this->load->model('m_eventos');
		$arr['eventos'] = $this->m_eventos->buscar_evento();

		$this->load->model('m_usuarios');
		$arr['usuarios'] = $this->m_usuarios->consultar_docentes();

        $this->form_validation->set_rules('txtnomeve','Nombre Evento','required');
		$this->form_validation->set_rules('txttipoeve','Tipo Evento','required');
		$this->form_validation->set_rules('txtlugeve','Lugar Evento','required');
		$this->form_validation->set_rules('txtfechaIneve','Fecha Inicial Evento','required');
		$this->form_validation->set_rules('txtfechaFneve','Fecha Fin Evento','required');
		$this->form_validation->set_rules('txtvaleve','Valor Evento','required');
		$this->form_validation->set_rules('txtusuario','Usuario','required');

		if ($this->form_validation->run() == FALSE) {
			$arr['eventos'] = $this->m_eventos->buscar_evento();
			$this->load->view('eventos/modifica_evento', $arr);
		} else {
            $this->load->model('m_eventos');
			$res['mensaje'] = $this->m_eventos->actualiza_evento();
            $this->load->view('mensaje',$res);
		}
    }

    public function eliminar_evento(){
    	if ($this->session->userdata('rol') != 'administrador') redirect('inicio');
    	$this->load->view('encabezado');
        $this->load->view('menu_adm');
        $this->load->model('m_eventos');
		$res['mensaje'] = $this->m_eventos->eliminar_evento();
		$this->load->view('mensaje',$res);	
    }
}
