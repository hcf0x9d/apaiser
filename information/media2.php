<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
?>
<?php    
    function mediaList(){
        
        include($_SERVER['DOCUMENT_ROOT'].'/products/config.php');

        $query = "(SELECT * FROM tbl_media ORDER BY Date DESC)";

        $sql = mysql_query($query);
        
        $items = '';
        
        while($row = mysql_fetch_array($sql))
        {
            $MyDate = strtotime($row['Date']);
            $Date = date('F Y',$MyDate);
            $Title = $row['Title'];
            $Img = $row['Img'];
            $Pub = $row['Publication'];
            $Desc = $row['Description'];
            
            $item = '
                <article class="media-item grid_3" style="margin-top: 20px;height:200px;">
                    <div class="grid_3 alpha omega" style="height:100px;background: #000;margin-bottom: 10px; background:src('.$Img.') center center;background-size:cover;"></div>
                    <h3>
                        '.$Title.'
                        <span>'.$Pub.'</span>
                        <span class="date">'.$Date.'</span>
                    </h3>
                    <p>'.$Desc.'</p>
                </article>';
                
            echo $item;
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>apaiser | In the media</title>

	<?php include($path.'/Library/dochead.php'); ?>
	
    <meta name="keywords" content="apaiser, custom bathrooms, modern bathrooms, luxury bathroom, bathroom design">
    <meta name="description" content="apaiser is an award winning Australian international bathware designer and manufacturer specialising in hand finished stone composite bathware that is synonymous with luxury and renowned for its natural organic feel and sculptural lines.">

    <style>
        span.redirect { 
	        unicode-bidi:bidi-override; 
	        direction: rtl; 
        }
        .media-item h3{color:#b0d136;font-size:1.5em;font-family:CenturyGothicPro-Bold;}
        .media-item h3 span{display: block;font-size:0.8em;}
        .media-item h3 span.date{font-family:CenturyGothicPro;padding-bottom: 10px; }
    </style>
    <link href="/Library/Style/media.css" rel="stylesheet" />
</head>
<body>
    <?php include ($path.'/Library/header.php'); ?>
    
    <div class="container_12">
        <aside class="grid_3">
            <h1><b>in the</b> media</h1>
            <p>apaiser is an award winning Australian international bathware designer and manufacturer specialising in hand finished stone composite bathware that is synonymous with luxury and renowned for its natural organic feel and sculptural lines. Founded in 2000, the apaiser stone bathware range focuses on the creation of luxurious ambience in the bathroom. Designed in Melbourne with optimum performance in mind, apaiser stone bathware is manufactured using reclaimed sustainable ingredients (crushed recycled marble) and has the highest level of stone content in the market. This superb raw material creates an enhanced therapeutic bathing experience and eases the ever increasing stress of modern life.</p>
            <p>	apaiser™  welcomes editorial enquiries for products or products for photo shoots. Please email <span class="redirect">moc.resiapa@ofni</span></p>
        </aside>
        <section class="grid_9" id="media-list">
            <?php mediaList(); ?>
        </section>
    </div>
    <script>
        $(function(){
            $('#media-list .grid_3:nth-child(3n+1)').addClass('alpha');
            $('#media-list .grid_3:nth-child(3n+3)').addClass('omega');
        });
    </script>
</body>
</html>