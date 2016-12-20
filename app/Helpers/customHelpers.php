<?php

if( ! function_exists('first_name')){
	function first_name( $full_name ){

		if(!$full_name)
			return '';

		$nama_A = explode(" ", $full_name);

		return isset($nama_A[0]) ? $nama_A[0] : $full_name;

	}
}

if( ! function_exists('convert_date_pt_to_mysql')){
	function convert_date_pt_to_mysql( $current_date ){

		if(!$current_date)
			return false;

		$date_info = explode("-", $current_date);

        if(in_array("00", $date_info))
            return false;

        $timestamp = mktime(0, 0, 0, $date_info[1], $date_info[0], $date_info[2]);

        return date('Y-m-d', $timestamp);
	}
}