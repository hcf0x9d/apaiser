<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    
	<?php 
		echo 'start';
		
		$dbLocation = 'mysql:dbname=apaiserc_sys;host=localhost';
		$dbUser = 'apaiserc_root';
		$dbPass = '@ccess!1';

		$db = new PDO($dbLocation, $dbUser, $dbPass);
		// prepare all queries...
		$dbProd = $db->prepare("SELECT * FROM tbl_product_overview");
		$dbDetail = $db->prepare("SELECT ProdDesc FROM tbl_product_details WHERE ProdID=:ProdID AND ProdCat=:ProdCat");
		$dbComp =   $db->prepare("SELECT * FROM tbl_product_compliment WHERE ProdID=:ProdID AND ProdCat=:ProdCat");

		// fetch all artists
		$dbProd->execute();
		$products=$dbProd->fetchAll(PDO::FETCH_ASSOC);


		$x=new XMLWriter();
		$x->openMemory();
		$x->startDocument('1.0','UTF-8');
		$x->startElement('products');
			$x->startElement('xms');//bathtubs
				foreach ($products as $product) {
					
					// Set the product
			    	$x->startElement($product['ProdCat']);//bathtub
				    	$x->writeAttribute('name',$product['ProdName']);//name
				    	$x->writeAttribute('id', strtolower(str_replace(' ', '-', $product['ProdName'])));//id
				    	$x->writeAttribute('category', $product['ProdCat']);//category
				    	$x->writeAttribute('shape', $product['ProdShape']);//shape
		      
					    $dbDetail->execute(array(':ProdID' => $product['ProdID'],':ProdCat' => $product['ProdCat']));
					    $details = $dbDetail->fetchAll(PDO::FETCH_ASSOC);

					    foreach ($details as $detail) {
					    	$x->startElement('descriptionShort');
					    		$x->text(' ');
					    	$x->endElement();

					        $x->startElement('descriptionLong');
					        	$x->text($detail['ProdDesc']);
					        $x->endElement(); // detail
					    } // foreach $details

				        // fetch all images from this product            
				        $dbComp->execute(array(':ProdID' => $product['ProdID'],':ProdCat' => $product['ProdCat']));
				        $comps = $dbComp->fetchAll(PDO::FETCH_ASSOC);

				        $x->startElement('compliment');

					        foreach ($comps as $comp) {

					            $x->startElement('compProd');
					            	$x->writeAttribute('category',$comp['ProdCat']);
						            $x->writeAttribute('shape','');
						            $x->writeAttribute('id','');
						            $x->writeAttribute('meta','');
						            $x->writeAttribute('image','');
					            	$x->text($comp['CompProdID']);
					            $x->endElement(); // comp
					        } // foreach $comps

			    		$x->endElement(); // compliment
			    	$x->endElement();//bathtub
				    
				} // foreach $products
			$x->endElement();//bathtubs
		$x->endElement(); // products
		$x->endDocument();
		$xml = $x->outputMemory();

//		echo 'done';
		file_put_contents("export.xml", $xml);
	?>

</head>

<body>
Hello World
	
</body>
</html>