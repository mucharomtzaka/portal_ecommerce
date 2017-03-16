<?php defined('BASEPATH') OR exit('No direct script access allowed');

	function label($str){
	    $label = str_replace('_', ' ', $str);
	    $label = ucwords($label);
	    return $label;
	}

	function safe($str){
    	return strip_tags(trim($str));
	}

	function createFile($string, $path){
		    $create = fopen($path, "w") or die("Unable to open file!");
		    fwrite($create, $string);
		    fclose($create);
		    return $path;
	}

