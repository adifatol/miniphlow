<?php
require_once __DIR__ . '/vendor/autoload.php';

// instantiate Aura PSR-4 autoloader
$loader = new \Aura\Autoload\Loader;

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();

$loader->addPrefix('dataset', '/projects/miniphlow/Dataset');
$loader->addPrefix('Numphy', '/projects/miniphlow/Numphy');
$loader->addPrefix('Nodes', '/projects/miniphlow/Nodes');

list($data, $target) = \dataset\Load::boston();

$X_ = $data;
$y_ = $target;

$n_features = count($X_);

// data normalization

$X_mean = (new \Numphy\Mean($X_))->calculate();
$X_diff = (new \Numphy\Substract($X_, $X_mean))->calculate();
$X_std  = (new \Numphy\Std($X_))->calculate();
$X_     = (new \Numphy\Div($X_diff, $X_std))->calculate();

$n_features = count($X_);
$n_hidden = 10;

$W1_ = (new \Numphy\Randn($n_features, $n_hidden))->calculate();
$W2_ = (new \Numphy\Randn($n_hidden))->calculate();
$b1_ = array_fill(0, $n_hidden, 0);
$b2_ = array_fill(0, 1, 0);


//$node = new \Nodes\Node();
?>
