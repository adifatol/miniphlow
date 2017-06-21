<?php
require_once __DIR__ . '/vendor/autoload.php';

// instantiate Aura PSR-4 autoloader
$loader = new \Aura\Autoload\Loader;

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();

$loader->addPrefix('Nodes', '/projects/Miniphlow/Nodes');

$node = new \Nodes\Node;
?>