<?php

//Prediction Mining

namespace Phpml\Metric;
include './vendor/autoload.php';
include './vendor/php-ai/php-ml/src/Metric/Accuracy.php';

use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\Ensemble\AdaBoost;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Regression\LeastSquares;


$dataset = new CsvDataset('cargodm.csv', 5, false);
$X = $dataset->getSamples();
$Y = $dataset->getTargets();

$classifier = new NaiveBayes();
$classifier->train($X, $Y);

// To predict the profit use the below syntax
 $predict_array = array("Electronics","Televisions","Rainy","India","Asia");
$result = $classifier->predict($predict_array);
print_r($result);

// To check the Accuracy of the model use below
echo Accuracy::score($Y, $result);

?>