<?php

function validate_username($str) {
	$preg = "/^\w{4,32}$/";
        if(preg_match($preg, $str)) {
                return true;
        }
        return false;
}

function validate_password($str) {
	$preg = "/^\w{6,20}$/";
        if(preg_match($preg, $str)) {
                return true;
        }
        return false;

}
