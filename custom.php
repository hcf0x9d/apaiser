<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>apaiser | Custom Stone Bathware for Modern Bathrooms</title>

	<?php include 'Library/dochead.php'; ?>
    <meta name="keywords" content="apaiser, modern bathroom design, stone baths, luxury bathroom, freestanding bath tubs, modern bathroom, Thailand, Australia">
    <meta name="description" content="apaiser’s stone composite bathware includes a luxurious range of baths, basins & vanities to create a modern bathroom design.">
    
    <script src="/Library/Scripts/jquery.jshowoff.js"></script>
    
    <script type="text/javascript">
       $(document).ready(function () {
		   showOff();
	   });
        function showOff() {
            if ($(window).width() > 767) {
                $('#custom_project_list').jshowoff({
                    effect: 'fade',
                    autoPlay: true,
                    speed: 4000,
                    hoverPause: false,
                    controls: true
                });
            }
        }
	</script>
    <style>
        figure img
        {
            padding: 0;
        }
		figcaption{
			color:#fff !important;	
		}
    </style>
    
</head>

<body>
	<?php include 'Library/header.php'; ?>
    
    <div class="container_12">
        <article class="grid_3">
            <h1>custom stone bathware &amp; modern luxury bathrooms</h1>
            <p>The unique manufacturing process allows apaiser&trade; to create sublime and fluid shapes in almost any form, with uniformity of color, strength and integrity unachievable in natural stone. This attractive, sleek and low maintenance product is versatile, light and durable, offering the option for installation in elevated floors. apaiser&trade; bathware is readily adaptable and allows freedom of creativity offering unrivalled customisation capability for projects. The design flexibility allows designers and architects to create unique shapes and forms embedded with virtually any added component that differentiate the bathroom. It's no wonder that apaiser&trade; is the stone bathware of choice for the world's leading luxury hotels and resorts, properties with extremely high design standards, which typify excellence across all areas of operation, showcasing design quality and attention to detail.</p>

            <p>Click <a href="/MediaFiles/Resources/what%20makes%20us%20different.pdf" onclick="ga('send', 'event', 'Download', 'PDF', 'What Makes Us Different');" target="_blank" title="Learn about what makes apaiser's luxury stone bathware different">here</a> for what makes us different</p>

            <p>Click <a href="/MediaFiles/Resources/projects%20listing.pdf" onclick="ga('send', 'event', 'Download', 'PDF', 'Product Listing');" target="_blank" title="View all of apaiser's modern bathroom design projects">here</a> for project list summary</p>
            
            <p>Click <a href="/MediaFiles/Resources/ExternalProductFinish.pdf" onclick="ga('send', 'event', 'Download', 'PDF', 'Product Finishes');" target="_blank" title="Product finish options to create your modern bathroom design">here</a> for external product finish options</p>
        </article>
        
        <div class="grid_9">
            <img src="/MediaFiles/Images/Custom/custom_001.jpg" class="mobile_only" alt="apaiser custom stone bathware for modern luxury bathrooms"/>
            <div id="custom_project_list" style="position:relative;width:100%;height:504px;" class="no_mobile">
            	<?php
            	$path = $_SERVER['DOCUMENT_ROOT'];
            	
            	include($path.'/products/config.php');

					$result = mysql_query("SELECT * FROM tbl_rotator_custom ORDER BY sort ASC");
					
					while($rows = mysql_fetch_array($result)){
						echo '<figure style="position:absolute;width:100%;height:100%;"><figcaption><h2>'.$rows['ImageTitle'].'</h2></figcaption><img src="'.$rows['ImageUrl'].'" alt="'.$rows['ImageTitle'].'"/></figure>';	
					}
				
				?>
            </div>
        </div>
    </div>
    
    <?php include 'Library/footer.php'; ?>
</body>
</html>