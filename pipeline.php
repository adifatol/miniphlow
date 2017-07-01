<?php
use \Nodes\Input;
use \Nodes\Linear;
use \Nodes\Sigmoid;
use \Nodes\MSE;

require_once __DIR__ . '/vendor/autoload.php';

// instantiate Aura PSR-4 autoloader
$loader = new \Aura\Autoload\Loader;

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();

$loader->addPrefix('dataset', '/projects/miniphlow/Dataset');
$loader->addPrefix('Numphy', '/projects/miniphlow/Numphy');
$loader->addPrefix('Nodes', '/projects/miniphlow/Nodes');
$loader->addPrefix('Graphs', '/projects/miniphlow/Graphs');

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
$W2_ = (new \Numphy\Randn($n_hidden, 1))->calculate();
$b1_ = array_fill(0, $n_hidden, 0);
$b2_ = array_fill(0, 1, 0);

$X  = new Input();
$y  = new Input();
$W1 = new Input();
$b1 = new Input();
$W2 = new Input();
$b2 = new Input();

$l1 = new Linear(array($X, $W1, $b1));
$s1 = new Sigmoid(array($l1));
$l2 = new Linear(array($s1, $W2, $b2));
$cost = new MSE(array($y, $l2));

$keys = array($X, $y, $W1, $b1, $W2, $b2);
$values = array($X_, $y_, $W1_, $b1_, $W2_, $b2_);
$feed_dict = new \Graphs\FeedDict($keys, $values);

$epochs = 1000;
# Total number of examples
$m = count($X_);
$batch_size = 11;
$steps_per_epoch = $m; // batch_size

$graph = \Graphs\Sort::topological($feed_dict);

foreach($graph as $g) {
    print_r(get_class($g)); echo "\n";
}

?>
