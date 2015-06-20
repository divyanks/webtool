 <?php  
if(function_exists($_GET['f'])) { // get function name and parameter
  $_GET['f']($_GET["p"]); 
} else { 
echo 'Method Not Exist'; 
} 


function phpFunction($val=''){      // create php function here   
echo $val ;
  
 } 
  

  //  echo json_encode($aResult);
?>