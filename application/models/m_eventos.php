<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_eventos extends CI_Model {

    function nuevo_evento() {
    	$nomEve = $this->input->post('txtnomeve');
    	$tipoEve = $this->input->post('txttipoeve');
    	$lugEve = $this->input->post('txtlugeve');
    	$fechaIn = $this->input->post('txtfechaIneve');
    	$fechaFn = $this->input->post('txtfechaFneve');
    	$valEve = $this->input->post('txtvaleve');
    	$usuario = $this->input->post('txtusuario');

    	$arrEve = array(
                'nombre_eve' => $nomEve,
                'tipo_eve' => $tipoEve,
                'lugar_eve' => $lugEve,
                'fecha_ini_eve' => $fechaIn,
                'fecha_fin_eve' => $fechaFn,
                'valor_eve' =>$valEve,
                'usuario' => $usuario
            );

        $res = $this->db->insert('eventos', $arrEve);

        if (!$res) return "Error no se ha podido insertar";
        return "Nuevo Evento Registrado";
    }


    function consultar_eventos(){
        $this->db->join('usuarios', 'eventos.usuario = usuarios.id_usu');
        $this->db->order_by("id_eve", "asc");
        $res = $this->db->get('eventos');
        return $res->result_array();
    }

    function buscar_evento(){
        $victima  = $this->input->post('evento');
        $this->db->where('id_eve', $victima);
        $res = $this->db->get('eventos');
        return $res->row_array();
    }

    function actualiza_evento(){

        $idEve = $this->input->post('txtideve');
        $nomEve = $this->input->post('txtnomeve');
        $tipoEve = $this->input->post('txttipoeve');
        $lugEve = $this->input->post('txtlugeve');
        $fechaIn = $this->input->post('txtfechaIneve');
        $fechaFn = $this->input->post('txtfechaFneve');
        $valEve = $this->input->post('txtvaleve');
        $usuario = $this->input->post('txtusuario');

        $arrEve = array(
                'nombre_eve' => $nomEve,
                'tipo_eve' => $tipoEve,
                'lugar_eve' => $lugEve,
                'fecha_ini_eve' => $fechaIn,
                'fecha_fin_eve' => $fechaFn,
                'valor_eve' =>$valEve,
                'usuario' => $usuario
            );
        
        $this->db->where('id_eve',$idEve);
        $res =  $this->db->update('eventos', $arrEve);

        if ($res == 0) {
            return "ERROR: No se ha podido actualizar";
        } else {            
            return "Evento Actualizado";
        }
    }

    function eliminar_evento(){
        $victima = $this->input->post('evento');
        $this->db->where("id_eve",$victima);
        $res = $this->db->delete("eventos");

        if ($res==0) return "Error al eliminar el registro";
        else return "Registro eliminado con éxito";
    }
}