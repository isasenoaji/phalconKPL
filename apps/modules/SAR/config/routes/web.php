<?php
$router->add('/dashboard'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Home',
    'action'     => 'index',
]);