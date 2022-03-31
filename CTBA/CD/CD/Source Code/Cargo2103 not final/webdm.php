<?php

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

//$predict = array("Electronics","Televisions","Rainy","India","Asia");
$result = $classifier->predict($X);
print_r($result);

// $count = 0;
// for ($i=0; $i < sizeof($result); $i++) { 
//   if ($Y[$i] == $result[$i]) {
//     $count++;
//   }
// }

// $fullcsv = $X;

// for ($n=0; $n <sizeof($X) ; $n++) 
// { 

// 	array_push($fullcsv[$n], $Y[$n]); 
// }

// echo Accuracy::score($Y, $result);

// print_r($fullcsv);


// function getResult(String a, String b)
//  {

//  }



//echo "Accuracy of Naive Bayes: ".($count/sizeof($result) * 100);

// $SVMClassifier = new SVC(Kernel::RBF, $cost = 1000);
// $SVMClassifier->train($X,$Y);

 // $result = $SVMClassifier->predict($X);
 // print_r($result);

// $count = 0;
// for ($i=0; $i < sizeof($result); $i++) { 
//   if ($Y[$i] == $result[$i]) {
//     $count++;
//   }
// }

// echo "<br>Accuracy of SVM: ".($count/sizeof($result) * 100);


?>