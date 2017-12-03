<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index() {
		// Valida el inicio de sesion 
		if ($this->session->userdata('rol')) {
		//si la sesion esta activa lo redirije a usuarios
            redirect('usuarios');
        } else {
            $this->load->view('encabezado');
            $this->form_validation->set_rules('txtlog','Login','required');
            $this->form_validation->set_rules('txtcla','Clave','required');
            $this->form_validation->set_rules('txtcaptcha','Captcha','required');
            $this->load->model('m_sesion');
            
            if ($this->form_validation->run() == FALSE) {
                $captcha = $this->m_sesion->generar_captcha();
                $this->load->view('login', $captcha);
            }
            else {
                $captcha_valido = $this->m_sesion->validar_captcha();
                
                if ($captcha_valido) {
                    $res['mensaje'] = $this->m_sesion->consultar_usr();
                    if ($res['mensaje'] == 'Información Incorrecta') {
                        $this->load->view('mensaje',$res);
                    }
                    else {
                        redirect('usuarios');
                    }
                } else {
                    $res['mensaje'] = "Captcha Incorrecto";
                    $this->load->view('mensaje', $res);
                }
            }
            
        }			
	}
    
	public function salir() {
		// Destruye la sesion
		$this->session->sess_destroy();
		redirect('inicio');
	}
}
