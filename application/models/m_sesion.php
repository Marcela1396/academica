<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_sesion extends CI_Model {
	
	function consultar_usr(){
		$log = $this->input->post('txtlog');
		$cla = sha1($this->input->post('txtcla'));
		$this->db->where('cedula_usu',$log);
		$this->db->where('pass_usu',$cla);
		$res = $this->db->get('usuarios');
		if ($res->num_rows() == 0){
			return 'Información Incorrecta';
		}
		else {
			$reg = $res->row();
            $this->session->set_userdata('id',$reg->id_usu);
			$this->session->set_userdata('cedula',$reg->cedula_usu);
			$this->session->set_userdata('nombres',$reg->nombre_usu);
			$this->session->set_userdata('rol',$reg->rol_usu);
			return $reg->rol_usu;
		}
	}
    
    function generar_captcha() {
        $this->load->helper('string');
        $this->load->helper('captcha');
        $this->rand = random_string('alnum', 6);
        
        $vals = array(
            'word'          => $this->rand,
            'img_path'      => './captcha/',
            'img_url'       => base_url() . 'captcha/',
            'font_path'     => './static/font/roboto/Roboto-Bold.ttf',
            'img_width'     => '150',
            'img_height'    => 40,
            'expiration'    => 3600,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            
            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
            )
        );
        
        $cap = create_captcha($vals);
        
        $data = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );
        
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        return $cap;
    }
    
    function validar_captcha() {
        //Borramos los captchas antiguos
        $expiration = time() - 3600; //limite de 1 hora
        $this->db->where('captcha_time < ', $expiration)->delete('captcha');
        
        //Verificamos que exista el captcha
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($this->input->post('txtcaptcha'), $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        
        if ($row->count == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}