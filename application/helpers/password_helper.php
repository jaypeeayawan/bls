<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('hash_password')){

	function hash_password($string){
		return hash('sha1', $string.config_item('authentication_key'));
	} 
		
}