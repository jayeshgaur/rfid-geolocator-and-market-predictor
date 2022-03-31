<?php 
namespace Phpml\Metric;
include './vendor/autoload.php';
include './vendor/php-ai/php-ml/src/Metric/Accuracy.php'; 
use Phpml\Dataset\CsvDataset;
?>

<html>
 <style>
  table {
   border-collapse: collapse; 
   width: 100%;
   color: #588c7e;
   font-family: 'Montserrat', sans-serif;
   font-size: 15px;
   text-align: left;
   border: 1px solid black;
   
     } 
  th {
   background-color: #588c7e;
   color: white; 
    }

    td, th {
       border: 1px solid black;
       padding: 5px;
   }

    .tablebox
    {
    	overflow-y: scroll;
    	width: 680px;
    	height: 393px;
    	margin-top: 30px;
    	margin-left: 350px;
    }
    th {position: sticky;
    	top: 0;}
  
 </style>
<body>





<?php

$dataset = new CsvDataset('cargodm.csv', 5, false);
$X = $dataset->getSamples();
$Y = $dataset->getTargets();

// Suggestion Mining

$fullcsv = $X;   // A variable to get the columns of Cargo Type, Product, Season, County and Region Type

for ($n=0; $n <sizeof($X) ; $n++) 
{
	array_push($fullcsv[$n], $Y[$n]);
} 

$temp = array(); // A temporary Array
$len = sizeof($fullcsv); // Initialising Length 
$copyoffullcsv = $fullcsv;  // A copy of variable
$finaloutput = array(); // Array for getting maximum profit


$var1 = 'Electronics'; $checkbox1 = FALSE; 
$var2 = 'Headphones'; $checkbox2 = FALSE;
$var3 = 'Winter'; $checkbox3= FALSE;
$var4 = 'India'; $checkbox4 = FALSE;
$var5 = 'Australia' ; $checkbox5 = TRUE;


function getStyledResult( $result )
{
	echo('<div class="tablebox">');
	echo('<table align="center">');
	echo('<tr>');
	echo('<th>Cargo Type</th>');
	echo('<th>Product</th>');
	echo('<th>Season</th>');
    echo('<th>Country</th>');
    echo('<th>Region Type</th>');
    echo('<tr>'); 
  
   for( $i=0; $i < sizeof($result); $i++) 
   {
   echo('<tr>');
   echo('<td>' . $result[$i][0] . '</td>');
   echo('<td>' . $result[$i][1] . '</td>');
   echo('<td>' . $result[$i][2] . '</td>');
   echo('<td>' . $result[$i][3] . '</td>');
   echo('<td>' . $result[$i][4] . '</td>');
   echo('</tr>');
   }
   
   echo('</table>');
   echo('</div>');
}

if( $checkbox1 == TRUE)
{ 
	$len = sizeof($copyoffullcsv);
	$temp = array();
	$finaloutput = array();

	for ($x=0; $x < $len ; $x++) 
	{
		if( $copyoffullcsv[$x][0] == $var1 )
			array_push($temp, $copyoffullcsv[$x]);
	}
	
	$max_profit = max(array_column($temp, 5));
	
	for ($i=0; $i < sizeof($temp) ; $i++) 
	{ 
			if ( $temp[$i][5] == $max_profit ) 
				array_push($finaloutput, $temp[$i]);		
	}	

}


if( $checkbox2 == TRUE)
{
	if( $checkbox1 == TRUE )
	{
		$copyoffullcsv = $temp;
		$len = sizeof($copyoffullcsv); 
		$temp = array(); 
		$finaloutput = array();
	}

		for ($x=0; $x < $len ; $x++) 
		{ 
			if( $copyoffullcsv[$x][1] == $var2 )
				array_push($temp, $copyoffullcsv[$x]);
		}

		$max_profit = max(array_column($temp, 5));
	
	    for ($i=0; $i < sizeof($temp) ; $i++) 
	      { 
			if ( $temp[$i][5] == $max_profit ) 
				array_push($finaloutput, $temp[$i]);		
	      }	
	}


	if( $checkbox3 == TRUE)
	{
		if( $checkbox1 == TRUE || $checkbox2 == TRUE )
		{
			$copyoffullcsv = $temp;
			$len = sizeof($copyoffullcsv); 
			$temp = array(); 
			$finaloutput = array();
		}

			for ($x=0; $x < $len ; $x++) 
			{ 
				if( $copyoffullcsv[$x][2] == $var3 )
					array_push($temp, $copyoffullcsv[$x]);
			}

			$max_profit = max(array_column($temp, 5));
	
	        for ($i=0; $i < sizeof($temp) ; $i++) 
	          { 
			    if ( $temp[$i][5] == $max_profit ) 
				   array_push($finaloutput, $temp[$i]);		
	          }	
		}


		if( $checkbox4 == TRUE)
		{
			if( $checkbox1 == TRUE || $checkbox2 == TRUE || $checkbox3 == TRUE )
			{
				$copyoffullcsv = $temp;
				$len = sizeof($copyoffullcsv); 
				$temp = array(); 
				$finaloutput = array();
			}

				for ($x=0; $x < $len ; $x++) 
				{ 
					if( $copyoffullcsv[$x][3] == $var4 )
						array_push($temp, $copyoffullcsv[$x]);		    
				}
				


				$max_profit = max(array_column($temp, 5)); 
	
	            for ($i=0; $i < sizeof($temp) ; $i++) 
	              { 
					if ( $temp[$i][5] == $max_profit ) 
						array_push($finaloutput, $temp[$i]);		
				  }	
			}


			if( $checkbox5 == TRUE)
			{
				if( $checkbox1 == TRUE || $checkbox2 == TRUE || $checkbox3 == TRUE || $checkbox4 == TRUE)
				{
					$copyoffullcsv = $temp;
					$len = sizeof($copyoffullcsv); 
					$temp = array(); 
					$finaloutput = array();
				}

					for ($x=0; $x < $len ; $x++) 
					{ 
						if( $copyoffullcsv[$x][4] == $var5 )
							array_push($temp, $copyoffullcsv[$x]);
					}

					$max_profit = max(array_column($temp, 5));
	
	                for ($i=0; $i < sizeof($temp) ; $i++) 
	                  { 
						if ( $temp[$i][5] == $max_profit ) 
							array_push($finaloutput, $temp[$i]);		
				      }	
				}


	getStyledResult($finaloutput);

?>
</body>
</html>