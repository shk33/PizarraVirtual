<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('redirect_to_not_allowed'))
{
	function redirect_to_not_allowed()
	{
		redirect('login/not_allowed');
	}
}