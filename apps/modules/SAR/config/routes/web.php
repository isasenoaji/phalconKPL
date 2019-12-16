<?php
$router->add('/dashboard'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Home',
    'action'     => 'index',
]);

$router->add('/kelolasar-1'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'index',
]);

$router->add('/testing'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Testing',
    'action'     => 'index',
]);