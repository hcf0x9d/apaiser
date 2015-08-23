
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        
	<?php $path = $_SERVER['DOCUMENT_ROOT'];
    
    include($path.'/Library/dochead.php');
    ?>
    
    <script>
        
        $(document).ready(function(){
			
            // what's up with the nav?
            $('nav li a.products').addClass('current');
			
            // click and change product images
            $('.item_images li img').live('click', function () {
                var new_img = $(this).data('full');

                changeProductImage(new_img);
            });

            // fun stuff with the hover
            $('.item_images li, .item_comp_prod li, .colour_list li').live('mouseenter', function () {
                $(this).stop(true, false).fadeTo(200, 1).siblings().fadeTo(200, 0.7);
            });
            $('.item_comp_prod, .item_images, .colour_list').mouseleave(function () {
                $('.item_comp_prod li, .item_images li, .colour_list li').stop(true, false).fadeTo(200, 1);
            });
            $('.colour_list li').live('click', function () {
                var fullcolour = $(this).children('img').data('full'),
                    colornm = $(this).children('img').attr('alt');

                $('.colours_full img').attr('src', fullcolour);
                $('.colours_full h2').text(colornm);
            });
			
			// Set the first colour as the current one
            var colorsrc = $('.colour_list li:first').children('img').data('full'),
                colornm = $('.colour_list li:first').children('img').attr('alt');

            $('.colours_full img').attr('src', colorsrc);
            $('.colours_full h2').text(colornm);
        });

        function changeProductImage(new_img) {
            $('.full_product').fadeOut(150, function () {
                $(this).attr('src', '/MediaFiles/Images/Products/' + new_img).fadeIn(150);
            });
        }

        function getUrlVar(name) {
            var vars = [], hash;
            var q = document.URL.split('?')[1];
            if (q != undefined) {
                q = q.split('&');
                for (var i = 0; i < q.length; i++) {
                    hash = q[i].split('=');
                    vars.push(hash[1]);
                    vars[hash[0]] = hash[1];
                }
            }

            return vars[name];
        }

        function trackthis(obj) {
            ga('send', 'event', 'Download', 'Product', obj);
        }
    </script>
   
	<?php include('config.php');
        // Starting with a query string - what product is this?
        $url = $_SERVER['QUERY_STRING'];
        parse_str($url);
		
        // This query fetches the images for a hardcoded work id...
        $query = "(SELECT * FROM tbl_product_overview WHERE tbl_product_overview.ProdID = '" .$product. "' AND tbl_product_overview.ProdCat = '" .$category. "')";

        $sql = mysql_query($query);
		
		while($row = mysql_fetch_array($sql))
		{
            // Get the information we need
            $name = $row['ProdName'];
            $type = $row['ProdCat'];
            $shape = $row['ProdShape'];
            $imgUrl = $row['ProdImage'];
            $imgAlt = $row['ProdImageAlt'];
		}
			
		$query = "(SELECT * FROM tbl_product_details WHERE tbl_product_details.ProdID = '" .$product. "' AND tbl_product_details.ProdCat = '" .$category. "')";
        $sql = mysql_query($query);
		while($row = mysql_fetch_array($sql))
		{
            // Get the information we need
            $desc = $row['ProdDesc'];
			$dimsFile = $row['ProdDimensionsFile'];
			$instFile = $row['ProdInstallGuide'];
		}
		
		
	?>

    <script>
    	$(document).ready(function(){
			var img_src = $('.current_image').attr('src');
			
			$('.item_images li:last-child').children('img').addClass('current_image');
			
			var start_image = $('.item_images li:last-child').children('img').data('full');

            $('.full_product').attr('src', '/MediaFiles/Images/Products/' + start_image);
		});
    </script>

    <link rel="canonical" href="http://www.apaiser.com/products/<?php echo $category;?>/<?php echo $product;?>" />
    <title>apaiser luxury stone bathware | <?php echo $name; ?></title>
    <meta name="description" content="<?php echo $name.' '.$desc; ?>">
   	<meta name="keywords" content="stone <?php echo $type;?>, modern bathroom, luxury stone bathware">
    
   	
</head>

<body>
	<?php include($path.'/Library/header.php'); ?>

	<div class="container_12" id="product">
        <aside class="grid_3 item_description">
            <ul class="item_breadcrumbs">
                <li><a href="/product?type=<?php echo $type; ?>"><?php echo $type; ?></a></li>
                <li><?php echo $name; ?></li>
            </ul>
            <h1><?php echo $name; ?></h1>

            <ul class="item_images">
            	<li><img src="/MediaFiles/Images/Products/Thumbs/<?php echo $type; ?>/<?php echo $imgUrl; ?>" data-full="<?php echo $type; ?>/<?php echo $imgUrl; ?>" alt="<?php echo $imgAlt; ?>"/></li>
				<?php
                
                    $query = "(SELECT * FROM tbl_product_images WHERE tbl_product_images.ProdID = '" .$product. "' AND tbl_product_images.ProdCat = '" .$category. "')";
                    $sql = mysql_query($query);
                    while($row = mysql_fetch_array($sql))
                    {
                        $altImg = $row['ProdImageUrl'];
                        $altImgAlt = $row['ProdImageAlt'];
                        
                        echo '<li><img src="/MediaFiles/Images/Products/Thumbs/'.$type.'/'.$altImg.'" data-full="'.$type.'/'.$altImg.'" alt="'.$altImgAlt.'"/></li>';
                    }
                ?>
            </ul>
            <img class="full_product mobile_only" src="" style="width: 100%;margin-bottom:20px;" alt="<?php echo $imgUrlAlt; ?>"/>

            <p id="item_desc"><?php echo $desc; ?></p>

            <ul class="item_downloadables">
                <li><a href="<?php echo $dimsFile; ?>" onClick='var obj="<?php echo $dimsFile; ?>"; trackthis(obj);' target='_blank'><img src='/MediaFiles/Images/Icons/pdf.png' />Product Dimensions</a></li>
				
				<?php
					if (!empty($instFile)){
                	?>
                <li><a href="<?php echo $instFile; ?>" onClick='var obj="<?php echo $instFile; ?>"; trackthis(obj);' target='_blank'><img src='/MediaFiles/Images/Icons/pdf.png' />Install Guide</a></li>
                <?php
					} else { }
				?>
					
            </ul>
            
            <h2>Complementary Products</h2>
            <ul class="item_comp_prod">
               <?php
			   
			   		$query = "(SELECT * FROM tbl_product_compliment WHERE tbl_product_compliment.ProdID = '" .$product. "' AND tbl_product_compliment.ProdCat = '" .$category. "')";
					 
                    $sql = mysql_query($query);
                    while($row = mysql_fetch_array($sql))
					{
						$compID = $row['CompProdID'];
						$compCat = $row['CompProdType'];
						 
				   		$query2 = "(SELECT * FROM tbl_product_overview WHERE tbl_product_overview.ProdID = '" .$compID. "' AND tbl_product_overview.ProdCat = '" .$compCat. "')";
	                    $sql2 = mysql_query($query2);
		                while($row2 = mysql_fetch_array($sql2))
						{
							echo '<li><a href="/products/'.$compCat.'/'.$compID.'"><img src="/MediaFiles/Images/Products/Thumbs/'.$compCat.'/'.$row2['ProdImage'].'" alt="'.$compName.'"/></a></li>';
						}
						
		   			}
			   ?>
            </ul>
            <script>
            	$(document).ready(function(){
					$('#goback').click(function(){
						parent.history.back();
						return false;
					});
					$('.fancybox').fancybox();
				});
            </script>
            <input type="button" id="goback" class="btn" value="Go Back">
        </aside>

        <section class="grid_9">
            <img class="full_product no_mobile" src="" style="width: 100%;" alt="<?php echo $imgUrlAlt; ?>" />

            <div class="colours_full">
                <img src="colour" style="border: 2px solid transparent;" alt="Full view"/>
                <h2>Name of the colour</h2>
            </div>
            <div class="colours">
                <ul class="colour_list">
					<?php
                        
                    $targets = array('ORIGAMI', 'BANDE', 'HARMONY');

                    foreach($targets as $t)
                    {
                        if (strpos($product,$t) !== false) {
                            $query = "(SELECT * FROM tbl_colours_kh ORDER BY SortOrder ASC)";
                            break;
                        } else {
                            $query = "(SELECT * FROM tbl_colours ORDER BY SortOrder ASC)";
                        }
                    }

                        $sql = mysql_query($query);
                        while($row = mysql_fetch_array($sql))
                        {
                            echo '<li><img src="/MediaFiles/Images/colours/thumbs/'.$row['ColourUrl'].'" data-full="/MediaFiles/Images/colours/'.$row['ColourUrl'].'" alt="'.$row['ColourName'].'" title="'.$row['ColourName'].'"/></li>';
                        }
                    ?>                
                </ul>
            </div>
        </section>
    </div>
    <?php include($path.'/Library/footer.php'); ?>

</body>
</html>
