<?php
if(!function_exists('classAutoLoader')){
    function classAutoLoader($className){
        $filename = 'src/' . str_replace('\\', '/', $className) . '.php';
        if(file_exists($filename)){
            require_once $filename;
        }
    }
}
spl_autoload_register('classAutoLoader');
