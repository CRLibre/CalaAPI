<?php

/**
 * The api calls receiver :)
 */
 
include_once("settings.php");
$corePath = $config['modules']['coreInstall'];
include_once($corePath . "core/boot.php");

if(isset($_GET['w'])){
	params_set('w', $_GET);
}elseif(isset($_POST['w'])){
	params_set('w', $_POST);
}elseif(isset($_PUT)){
	params_set('w', $_PUT);
}elseif(isset($argv)){
    grace_debug("Booting from cli...");
    foreach($argv as $r){
        if(strpos($r, '=')){
            list($key, $val) = explode("=", $r);
            params_set($key, $val);
        }    
    }
}
$r = boot_itUp();