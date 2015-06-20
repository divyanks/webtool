<?php	

// Function to convert CSV into associative array
function csvToArray($file, $delimiter, $userName) { 
  if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j < count($lineArray); $j++) { 
		if($userName == $lineArray[3] || $i == 0)
			$arr[$i][$j] = $lineArray[$j]; 
		
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
  return $arr; 
} 


if(function_exists($_GET['f'])) { // get function name and parameter
  $_GET['f']($_GET["p"]); 
} else { 
echo 'Method Not Exist'; 
} 


function fetchClient($val=''){      // create php function here   
	//	echo $val ;
		$feed = "csv/Article_Audit_Report.csv";
  		 $keys = array();
		$newArray = array();
		$userName = $val;

		$data = csvToArray($feed, ',', $userName);
	
	
		$count = count($data) - 1;
		  
		//Use first row for names  
		$labels = array_shift($data);  

		foreach ($labels as $label) {
		  $keys[] = $label;
		}

		for ($j = 0; $j < $count; $j++) {
		  
		  $d = array_combine($keys, $data[$j]);
		  $newArray[$j] = $d;
		  
		}
	
		echo json_encode($newArray);
 } 

  
?>