<?php

function css_path($arg='') {
	return $arg=='' ? base_url()."data/css/" : base_url()."data/css/$arg/";
}

function js_path($arg='') {
	return $arg=='' ? base_url()."data/js/" : base_url()."data/js/$arg/";
}

function admin_css_path() {
	return base_url()."data/admin/css/";
}

function admin_js_path() {
	return base_url()."data/admin/js/";
}

function validate_username($str) {
	$preg = "/^\d+$/";
	if(preg_match($preg, $str)) {
		return true;
	}
	return false;
}

function validate_pwd($str) {
	$preg = "/^[a-zA-Z0-9]{6,20}+$/";
	if(preg_match($preg, $str)) {
		return true;
	}
	return false;
}

function validate_nickname($str) {
	$preg = "/^\w{2,20}$/";
	if(preg_match($preg, $str)) {
		return true;
	}
	return false;
}

function validate_mail($str) {
	$preg = "/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/";
	if(preg_match($preg, $str)) {
		return true;
	}
	return false;
}
