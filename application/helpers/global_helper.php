<?php
    if (!function_exists('checkLogin')) {
        function checkLogin()
        {
            $ci = &get_instance();

            if (!$ci->session->userdata('id')) {
				redirect('auth');
			}
        }
    }

    if (!function_exists('doneLogin')) {
        function doneLogin()
        {
            $ci = &get_instance();

            if ($ci->session->userdata('id')) {
				redirect('dashboard');
			}
        }
    }

    if (!function_exists('app_config')) {
        function app_config()
        {
            $ci = &get_instance();

            return $ci->db->get('tbl_user_system')->where('id_user_system',1)->row();
        }
    }

    if (!function_exists('checkAkses')) {
        function checkAkses($required_levels)
		{
			$CI =& get_instance();
			$user_level = $CI->session->userdata('role');
			
			if (!is_array($required_levels)) {
				$required_levels = array($required_levels);
			}
			
			if (!in_array($user_level, $required_levels)) {
				redirect('404_override');
			}
		}
    }
?>
