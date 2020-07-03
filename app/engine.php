<?php

require_once 'config/config.php';

//load helper URL
require_once 'helpers/url_helper.php';


spl_autoload_register(function($className){
	require_once 'libs/'.$className.'.php';
});
