<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model {
    
    function buscar_admin() {
        $victima  = $this->session->userdata('id');
        $this->db->where('id_usu', $victima);
        $res = $this->db->get('usuarios');
        return $res->row_array();
    }
    
    function actualizar_perfil_admin() {
        $idadm = $this->session->userdata('id');
        $cedadm = $this->input->post('txtced');
        $nomadm = $this->input->post('txtnom');
        $passadm = $this->input->post('txtpass');
        
        $dataAdm = array(
            'cedula_usu' => $cedadm,
            'nombre_usu' => $nomadm,
            'pass_usu' => sha1($passadm)
        );
        
        $this->db->where('id_usu',$idadm);
        $res = $this->db->update('usuarios', $dataAdm);
        
        if ($res == 0) {
            return "ERROR: No se ha podido actualizar";
        } else {
            return "Usuario Actualizado";
        }
    }
    
    function nuevo_usuario() {
        $cedusu = $this->input->post('txtcedusu');
        $nomusu = $this->input->post('txtnomusu');
        $rolusu = $this->input->post('txtrolusu');
        
        //Consultamos si ya existe el usuario
        $this->db->where('cedula_usu',$cedusu);
		$res = $this->db->get('usuarios');
		if ($res->result_array()) {
            return "ERROR: La cédula del usuario se encuentra en uso";
        } else {
            //Sino existe lo agregamos
            $arrUsu = array(
                'cedula_usu' => $cedusu,
                'nombre_usu' => $nomusu,
                'pass_usu' => sha1($cedusu),
                'rol_usu' => $rolusu
            );
            $this->db->insert('usuarios', $arrUsu);
            return "Nuevo Usuario Registrado";
        }
    }

    function consultar_usuarios(){
        $this->db->order_by("rol_usu", "asc");
        $res = $this->db->get('usuarios');
        return $res->result_array();
    }

    function consultar_docentes(){
        $this->db->order_by("rol_usu", "asc");
        $this->db->where('rol_usu','docente');
        $res = $this->db->get('usuarios');
        return $res->result_array();
    }

    function buscar_usuario(){
        $victima  = $this->input->post('victima');
        $this->db->where('id_usu', $victima);
        $res = $this->db->get('usuarios');
        return $res->row_array();
    }

    function actualiza_usuario() {
        $idusu = $this->input->post('txtidusu');
        $cedusu = $this->input->post('txtcedusu');
        $nomusu = $this->input->post('txtnomusu');
        $rolusu = $this->input->post('txtrolusu');

        if (null!= $this->input->post('txtpassusu') ){
            $passusu = $this->input->post('txtpassusu');

            $dataUsu = array(
                'cedula_usu' => $cedusu,
                'nombre_usu' => $nomusu,
                'pass_usu' => sha1($passusu),
                'rol_usu' => $rolusu
            );
        }
        else{
            $dataUsu = array(
                'cedula_usu' => $cedusu,
                'nombre_usu' => $nomusu,
                'rol_usu' => $rolusu
            );
        }
        
        $this->db->where('id_usu',$idusu);
        $res =  $this->db->update('usuarios', $dataUsu);

        if ($res == 0) {
            return "ERROR: No se ha podido actualizar";
        } else {            
            return "Usuario Actualizado";
        }
    }

    function eliminar_usuario(){
        $victima = $this->input->post('victima');
        $this->db->where("id_usu",$victima);
        $res = $this->db->delete("usuarios");
        
        if ($res==0) return "Error al eliminar el registro";
        else return "Registro eliminado con éxito";
    }
    
    //=========================== PROFESORES ==========================
    function buscar_profesor() {
        $victima  = $this->session->userdata('id');
        $this->db->where('id_usu', $victima);
        $res = $this->db->get('usuarios');
        return $res->row_array();
    }
    
    function actualizar_perfil_profesor() {
        $iddoc = $this->session->userdata('id');
        $ceddoc = $this->input->post('txtced');
        $nomdoc = $this->input->post('txtnom');
        $passdoc = $this->input->post('txtpass');
        
        $dataDoc = array(
            'cedula_usu' => $ceddoc,
            'nombre_usu' => $nomdoc,
            'pass_usu' => sha1($passdoc)
        );
        
        $this->db->where('id_usu',$iddoc);
        $res =  $this->db->update('usuarios', $dataDoc);
        
        if ($res == 0) {
            return "ERROR: No se ha podido actualizar";
        } else {
            return "Usuario Actualizado";
        }
    }
    
    function consultar_eventos() {
		$id = $this->session->userdata('id');
		$this->db->where('usuario',$id);
		$res = $this->db->get('eventos');
		return $res->result_array();
	}
    
    function buscar_evento($ideve) {
        $this->db->where('id_eve', $ideve);
        $res = $this->db->get('eventos');
        return $res->row_array();
    }
}