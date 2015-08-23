<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>apaiser | In the media</title>

	<?php include '../Library/dochead.php'; ?>
	
    <meta name="keywords" content="apaiser, custom bathrooms, modern bathrooms, luxury bathroom, bathroom design">
    <meta name="description" content="apaiser is an award winning Australian international bathware designer and manufacturer specialising in hand finished stone composite bathware that is synonymous with luxury and renowned for its natural organic feel and sculptural lines.">

    <style>
        span.redirect { 
	        unicode-bidi:bidi-override; 
	        direction: rtl; 
        }
    </style>
    <script>
        $(document).ready(function () {
			/*
            $.getJSON('/information/media.json', function (data) {
                $.each(data, function (key, val) {
                    var title = val['title'],
                        img = val['img'],
                        url = val['url'];

                    $item = '<li class="media_item"><a href="'+url+'">\
                                <img src="'+ img + '" alt="'+title+'" />\
                                <p>'+ title +'</p>\
                            </a></li>'

                    $('#media_list').append($item);
                });
            });*/
        });

        if ($(window).width() > 500) {
            $('.media_item').live('mouseenter', function () {
                $('.media_item').not(this).stop(true, false).fadeTo(100, 0.5);
                $(this).stop(true, false).fadeTo(100, 1);
            });
            $('#media_list').live('mouseleave', function () {
                $('.media_item').stop(true, false).fadeTo(100, 1);
            });
        }
    </script>
    <link href="/Library/Style/media.css" rel="stylesheet" />
    
</head>

<body>
	<?php include '../Library/header.php'; ?>
    
    <div class="container_12">
        <article class="grid_3">
            <h1><b>in the</b> media</h1>
            <p>apaiser is an award winning Australian international bathware designer and manufacturer specialising in hand finished stone composite bathware that is synonymous with luxury and renowned for its natural organic feel and sculptural lines. Founded in 2000, the apaiser stone bathware range focuses on the creation of luxurious ambience in the bathroom. Designed in Melbourne with optimum performance in mind, apaiser stone bathware is manufactured using reclaimed sustainable ingredients (crushed recycled marble) and has the highest level of stone content in the market. This superb raw material creates an enhanced therapeutic bathing experience and eases the ever increasing stress of modern life.</p>
            <p>	apaiser™  welcomes editorial enquiries for products or products for photo shoots. Please email <span class="redirect">moc.resiapa@ofni</span></p>
        </article>
        
        <section class="grid_9">
            <ul id="media_list">
                <?php include('../products/config.php');
					// Starting with a query string - what product is this?
					
					// This query fetches the images for a hardcoded work id...
					$query = "(SELECT * FROM tbl_media ORDER BY ID desc)";
			
					$sql = mysql_query($query);
					
					while($row = mysql_fetch_array($sql))
					{
						// Get the information we need
						$title = $row['Title'];
						$img = $row['Img'];
						$file = $row['Url'];
						
						echo '<li class="media_item"><a href="'.$file.'" target="_blank">
                                <img src="'.$img.'" alt="'.$title.'" />
                                <p>'.$title.'</p>
                            </a></li>';
					}
					
				?>
            </ul>
        </section>
        
    </div>
    
    <?php include '../Library/footer.php'; ?>
</body>
</html>