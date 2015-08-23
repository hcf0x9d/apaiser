<?php 

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $host = "localhost";
  $user = "apaiserc_root";
  $pass = "@ccess!1";

  $databaseName = "apaiserc_sys";

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  //include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);


  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  
  $json = array();
  $result = mysql_query('SELECT * FROM tbl_product_overview ORDER BY PRODID') or die(mysql_error());          //query
  while($row = mysql_fetch_array($result)){
	  
	  $data = array(
	  	'product' => $row['ProdID'],
		'prodname' => $row['ProdName'],
		'prodcat' => $row['ProdShape'],
		'prodtype' => $row['ProdCat'],
		'image' => $row['ProdImage']
		);
		array_push($json, $data);
  }
  
  echo json_encode($json);
  
?>