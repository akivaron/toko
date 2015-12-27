<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Template {
	
	/**
	*
	* @param 	string
	* @param 	array
	* @example  $this->template->gudang("pages/beranda",$data);
	*/

	function gudang($content,$data) {
		$this->ci =& get_instance();

    	$session_data   = $this->ci->session->userdata('logged_in');
   		$idu 			= $session_data['id'];
     	$jabatan 		= $session_data['jabatan'];
     	$arr_idm 		= $this->ci->mweb->menudash($jabatan,$idu);	
     	$data['notifs'] = $this->ci->mweb->gettable_by_kol('iduser','notif',$idu);
     	$data['menu']	= $this->ci->mweb->get_menu($arr_idm,$data);
     	

    	$this->ci->load->view("templates/header");
    	$this->ci->load->view("templates/menu",$data);
    	$this->ci->load->view($content,$data);
    	$this->ci->load->view("templates/footer");
    }
}