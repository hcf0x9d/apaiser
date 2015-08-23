<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>apaiser | Award winning stone bathware</title>

	<meta name="keywords" content="stone bathware, luxury bathtub, apaiser, stone vanity, modern bathroom, Thailand, hotel, apaiser">
    <meta name="description" content="apaiser offers a variety of 5-star luxury stone bathtub, bathroom sinks & vanities that have already been installed in a number of luxury resorts and homes.">
    
	<?php include 'Library/dochead.php'; ?>
    <script src="/Library/Scripts/jquery.jshowoff.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            showOff();
        });

        function showOff () {
            if ($(window).width() > 767) {
                $('#project_list').jshowoff({
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
    </style>
</head>

<body>
	<?php include 'Library/header.php'; ?>
    
    <div class="container_12">
        <aside class="grid_3">
            <h1>modern bathrooms by apaiser</h1>
            <p>Since 2000, apaiser has been delivering customised luxury stone composite bathware solutions to the world’s leading resorts, hotels and luxury homes. From an initial focus on small boutique projects, apaiser rapidly progressed to its position today as the words leading supplier of luxury stone composite baths, basins and vanity basins. apaiser has the unique ability to create customised shapes and colours for any designer or project requirement. Our project and commercial sales have seen apaiser become a truly global brand and supplier of choice, to the world’s leading hotels and resorts.</p>

            <p>Click <a href="/MediaFiles/Resources/projects%20listing.pdf" onclick="ga('send', 'event', 'Download', 'PDF', 'Product Listing');" target="_blank" title="apaiser stone bathware project list summary">here</a> for project list summary</p>
            
        </aside>
        
        <section class="grid_9">
            <img src="/MediaFiles/Images/Projects/projects_001.jpg" class="mobile_only" alt="apaiser stone bathware, stone bathtubs and vanities for modern bathrooms" />
            <div id="project_list" style="position:relative;width:100%;height:504px;" class="no_mobile">
                <?php include('products/config.php');

					$result = mysql_query("SELECT * FROM tbl_rotator_projects ORDER BY sort ASC");
					
					while($rows = mysql_fetch_array($result)){
						echo '<figure style="position:absolute;width:100%;height:100%;"><figcaption><h2>'.$rows['ImageTitle'].'</h2></figcaption><img src="'.$rows['ImageUrl'].'" alt="'.$rows['ImageTitle'].'"/></figure>';	
					}
				
				?>
            </div>
        </section>
    </div>
    
    <?php include 'Library/footer.php'; ?>
   
</body>
</html>