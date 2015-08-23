<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>apaiser | Freestanding Bathtubs, Vanities and Stone Basins</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="canonical" href="http://www.apaiser.com/" /> 
    <meta name="viewport" content="width=device-width" />
    <script src="/Library/Scripts/jquery-1.8.2.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <style>
        span.redirect { 
            unicode-bidi:bidi-override; 
            direction: rtl; 
        }
    </style>
	<script>console.log("<?php echo $ref; ?>");</script>
    <link href="/Library/Style/tabs.css" rel="stylesheet" />
    
    <meta name="keywords" content="apaiser, stone bathware, freestanding bathtub, stone basin, modern bathroom, luxury bathtub, Australia, Melbourne, Asia, Thailand">
    <meta name="description" content="apaiser's beautifully handcrafted reclaimed marble stone bathware has been designed in Australia with superior performance in mind providing timeless elegance and value to your home or project.">
    <!--[if lt IE 9]>
       <script>
          document.createElement('header');
          document.createElement('nav');
          document.createElement('section');
          document.createElement('article');
          document.createElement('figure');
          document.createElement('figcaption');
          document.createElement('aside');
          document.createElement('footer');
       </script>
    <![endif]-->

    <style>
        .heading_grp {
            display: none;
        }

        .hactive {
            display: block;
        }
        
        .content_rotator figure img {
            padding: 0;
        }
        .gallery-utilities{
            position: absolute;
            bottom: 0px;
            right:0;
            width: 100%;
            z-index:100;
        }
        .gallery-captions{
            background: rgba(40,36,37,0.9);
            float:right;
            width:80%;
            padding: 10px;       
        }
            .gallery-captions h2{
                display: none;
                color: #fff;
                font-size: 1.5em;
                letter-spacing:normal;
                margin-bottom: 0 !important;
            }
                .gallery-captions h2.active{
                    display: block;
                }
        .gallery-nav{
            position:relative;
            display: block;
            float:right;   
            width: 100%;             
        }
            .gallery-nav-list{
                display: inline-block;
                float: right;
                padding: 10px;
            }
                .gallery-nav-list-item{
                    list-style-type: none;
                    padding-left: 10px;
                    margin: 0;
                    float: left;
                    display: block;
                    opacity:0.3;
                }
                .gallery-nav-list-item.active{
                    opacity:1;
                }
        .gallery-nav-dot{
            display: block;
            width: 16px;
            height: 16px;
            border-radius:16px;
            background: #fff;
        }
        
            .timer-wrap{
                width: 100%;
                position: absolute;
                z-index:1;
            }
                .timer{
                    height:2px;
                    background: rgba(176, 209, 54, 0.3);
                    width:0%;
                }
            .gallery-images{
                margin: 0;
                padding: 0;
                top: 0;
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: 0;
            }
            .gallery-images li{
                display:none;
                position: absolute;
                width: 100%;
                height: 100%;
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
                .gallery-images li.active{
                    display: block;
                }
        @media only screen and (max-width: 767px) {
            
        }
    </style>
    
    <?php include($path.'/Library/Includes/style.pack.php'); ?>
</head>

<body>
    <?php include 'Library/header.php'; ?>
    <div class="container_12">
        <section class="grid_9 push_3" id="home_content_rotator">
            <div class="slide_wrapper">
		        <?php include 'Library/homeProductSlider.php'; ?>            	
            </div>
            <!--<img src="/MediaFiles/Images/Home_Rotator/Stone_Bath_11.jpg" class="mobile_only" alt="apaiser | Luxury stone freestanding baths, basins and vanities" />-->
            <div id="content_slider" style="position: relative; width: 100%;">
                <div class="slider_page_body">
                    <div class="content_rotator" style="position: relative; width: 100%;">
                        <div class="timer-wrap">
                            <div class="timer"></div>
                        </div>
                        <ul class="gallery-images">
                            <li data-slide="1" ><img src="/MediaFiles/Images/Home_Rotator/hoppen-rotator-cover.jpg" alt="Kelly Hoppen MBE by apaiser" /></li>
                            <li data-slide="2" ><img src="/MediaFiles/Images/Home_Rotator/Stone_Bath_12.jpg" alt="Luxury stone freestanding bathtubs at W Retreat Koh Samui, Thailand" /></li>
                            <li data-slide="3" ><img src="/MediaFiles/Images/Home_Rotator/Stone_Bath_13.jpg" alt="Luxury stone freestanding bathtub and basins" /></li>
                            <li data-slide="4" ><img src="/MediaFiles/Images/Home_Rotator/origami-range.jpg" alt="Kelly Hoppen MBE by apaiser | Origami Range" /></li>
                            <li data-slide="5" ><img src="/MediaFiles/Images/Home_Rotator/apaiser-Pool-freestanding-basin-at-Park-Hyatt-New-York-1024x682.jpg" alt="Park Hyatt New York, Pool freestanding Basin" /></li>
                            <li data-slide="6" ><img src="/MediaFiles/Images/Home_Rotator/Hotels_13.jpg" alt="Luxury stone freestanding bathtub at Cheval Blanc Rhandeli, Maldives" /></li>
                            <li data-slide="7" ><img src="/MediaFiles/Images/Home_Rotator/bande-range.jpg" alt="Kelly Hoppen MBE by apaiser | Bande Range" /></li>
                            <li data-slide="8" ><img src="/MediaFiles/Images/Home_Rotator/Eco_12.jpg" alt="Luxury stone basin" /></li>
                        </ul>
                        <div class="gallery-utilities">
                            <div class="gallery-captions">
                                <h2 data-slide="1"><a href="//kh.apaiser.com" style="color:#fff;text-decoration:none;">Kelly Hoppen &amp; apaiser | See the collection <i class="fa fa-angle-right"></i></a></h2>
                                <h2 data-slide="2">W Retreat Koh Samui, Thailand</h2>
                                <h2 data-slide="3">Double Oval vanity and Lunar freestanding bath, colour Nimbus</h2>
                                <h2 data-slide="4"><a href="//kh.apaiser.com/origami" style="color:#fff;text-decoration:none;">Kelly Hoppen &amp; apaiser | See the collection <i class="fa fa-angle-right"></i></a></h2>
                                <h2 data-slide="5">Park Hyatt New York, Pool freestanding Basin</h2>
                                <h2 data-slide="6">Cheval Blanc Randheli Maldives</h2>
                                <h2 data-slide="7"><a href="//kh.apaiser.com/bande" style="color:#fff;text-decoration:none;">Kelly Hoppen &amp; apaiser | See the collection <i class="fa fa-angle-right"></i></a></h2>
                                <h2 data-slide="8">Eclipse basins, colour Charcoal</h2>
                            </div>
                            <div class="gallery-nav">
                                <ul class="gallery-nav-list">
                                    <li class="gallery-nav-list-item" onclick="rotateContent('1');clearTimeout(sltime);" data-slide="1"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('2');clearTimeout(sltime);" data-slide="2"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('3');clearTimeout(sltime);" data-slide="3"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('4');clearTimeout(sltime);" data-slide="4"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('5');clearTimeout(sltime);" data-slide="5"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('6');clearTimeout(sltime);" data-slide="6"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('7');clearTimeout(sltime);" data-slide="7"><a href="#" class="gallery-nav-dot"></a></li>
                                    <li class="gallery-nav-list-item" onclick="rotateContent('8');clearTimeout(sltime);" data-slide="8"><a href="#" class="gallery-nav-dot"></a></li>
                                </ul>
                            </div>    
                        </div>
                        
                    </div>
                </div>
                <!-- /Sanctuary in Stone -->
            </div>
        </section>
        <aside class="grid_3 pull_9 callout_wrap">
            <div class="callout_heading">

                <div class="slider_page_text currPage first" data-page="page_1">
                    <h1>Create Your Sanctuary In Stone</h1>
                    <p>apaiser bathware manufactures a unique range of stone bathware, vanity basins, basins and baths designed to transform the bathroom into a sanctuary.</p>
                </div>
            </div>
        </aside>

        <div class="clear"></div>
        <?php include 'Library/home_LeftAdSpace.php'; ?>
        <?php include 'Library/home_RightAdSpace.php'; ?>

    </div>
    <?php include 'Library/footer.php'; ?>
    <?php // include($path.'/Library/Includes/script.pack.php'); ?>
    
    <script src="/Library/Scripts/jquery.jshowoff.js"></script>
    <script src="/Library/Scripts/jquery.matchHeight-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Set the minimum height of the callout section to the height of the sliders
            var slideHeight = $('.slide_wrapper').height();
            if ($(window).width() > 767) {
                $('.callout_heading').css({ 'min-height': 504 - 20 });
                //$('#content_slider').css({ 'min-height': slideHeight});
            }

            $('.slide_launch').mouseenter(function () {
                $(this).parent().stop(true, false).animate({ 'margin-left': '0' }, 200);
                $(this).parent().siblings().stop(true, false).animate({ 'margin-left': '-100px' }, 200);
            });

            $('.slider').mouseleave(function () {
                $(this).stop(true, false).animate({ 'margin-left': '-100px' }, 200);
            });

            $('.baths').mouseenter(function () {
                $(this).addClass('baths_on');
            }).parent().mouseleave(function () {
                $('.baths').removeClass('baths_on');
            });

            $('.basins').mouseenter(function () {
                $(this).addClass('basins_on');
            }).parent().mouseleave(function () {
                $('.basins').removeClass('basins_on');
            });

            $('.vanities').mouseenter(function () {
                $(this).addClass('vanities_on');
            }).parent().mouseleave(function () {
                $('.vanities').removeClass('vanities_on');
            });

            $('.extras').mouseenter(function () {
                $(this).addClass('extras_on');
            }).parent().mouseleave(function () {
                $('.extras').removeClass('extras_on');
            });
            
            $('.fw_home_banner').matchHeight();
            
           rotatorInit();
           
           $('.gallery-utilities').mouseenter(function(){
                clearTimeout(sltime);
                $('.timer').stop();
            }).mouseleave(function(){
                $('.timer').animate({width:'0%'},150, function(){
                    sltime = setTimeout(function(){
                        $('.timer').animate({width:'100%'},5000, function(){
                            rotate();
                        });
                    }, 10);    
                })
            });
            $('.gallery-nav li').on('click', function(){
                clearTimeout(sltime);
            });
        });
        
        /* ====================== */
/* Image Rotator Function */
/* ====================== */
function rotatorInit(){
    // Initialize and set the first items
    $('.gallery-images li:first-child, .gallery-captions h2:first-child, .gallery-nav li:first-child').addClass('active');
    sltime = setTimeout(function(){
        $('.timer').animate({width:'100%'},8000, function(){
            rotate();
        });
    }, 10);
}

function rotateContent(n){
    // Variables
    var $currImage = $('.gallery-images li.active');
    var $newImage = $('.gallery-images li[data-slide="'+n+'"]');
    
    var $currCap = $('.gallery-captions h2.active');
    var $newCap = $('.gallery-captions h2[data-slide="'+n+'"]');
    
    var $currDot = $('.gallery-nav li.active');
    var $newDot = $('.gallery-nav li[data-slide="'+n+'"]');
    
    // Change the image
    if ($currImage.attr('data-slide') != $newImage.attr('data-slide'))
    {
        $currImage.fadeOut(750, function(){
            $newImage.addClass('active').siblings().removeClass('active');
        });
        $newImage.fadeIn(750);
    }
    
    // Change the captions
    $currCap.fadeOut(0, function(){
        $newCap.addClass('active').siblings().removeClass('active');
        $('.gallery-captions h2.active').fadeIn(0);
    });
    
    // Change the dot
    $newDot.addClass('active').siblings().removeClass('active');

    
    
    sltime = setTimeout(function(){
        $('.timer').animate({width:'100%'},8000, function(){
            rotate();
        });
    }, 10);
}

function rotate(){
    var $nextGroup = $('.gallery-nav li.active').next().attr('data-slide');
    $('.timer').animate({width:'0%'},100);
    
    if($nextGroup == undefined){
        $first = $('.gallery-nav li:first-child').attr('data-slide');

        rotateContent($first);
    } else {
        rotateContent($nextGroup);
    }
}
    </script>
    
</body>
</html>