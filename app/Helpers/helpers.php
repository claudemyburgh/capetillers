<?php 


if (!function_exists('on_page')) {

    function on_page($path) 
    {
        return request()->is($path);
    }
    
}

if (!function_exists('return_if')) {

    function return_if($condition, $value) 
    {
        if ($condition) {
            return $value;
        }
    }
    
}


if (!function_exists('return_path')) {

    function return_path($path, $condition, $value) 
    {

    }
    
}


if (!function_exists('e_break')) {
        
    function e_break($value)
    {
        return nl2br(e($value));
    }        

}


if (!function_exists('get_gravatar')) {

	function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'https://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}

}


