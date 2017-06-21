<?php
require_once __DIR__ . '/vendor/autoload.php';

// instantiate Aura PSR-4 autoloader
$loader = new \Aura\Autoload\Loader;

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();

$loader->addPrefix('Nodes', '/projects/miniphlow/Nodes');
$loader->addPrefix('dataset', '/projects/miniphlow/Dataset');

list($data, $target) = \dataset\Load::boston();

$X_ = $data;
$y_ = $target;

$n_features = count($X_);

// data normalization
//X_ = (X_ - np.mean(X_, axis=0)) / np.std(X_, axis=0)

//$node = new \Nodes\Node();
?>