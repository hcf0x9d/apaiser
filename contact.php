<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>apaiser | Contact for Stone Bathtubs, Basins and Vanities</title>
    <link rel="canonical" href="http://www.apaiser.com/contact" />
	
	<meta name="keywords" content="luxury bathtub, stone bathtub, double basin vanity, stone basin, luxury bathtub, modern bathrooms">
	<meta name="description" content="apaiser offers an exclusive range of luxury bathtubs, stone basins & double basin vanities that inspire a whole new approach to the art of bathroom design.">
    
    <script src="/Library/Scripts/jquery-1.8.2.min.js"></script>
    <script src="/Library/Scripts/jquery.easing.1.3.js"></script>
    <script src="/Library/Scripts/jquery.quicksand.js"></script>
    <script src="/Library/Scripts/modernizr-2.6.2.js"></script>
    <script src="/Library/Scripts/holder.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEcWVApPJQzmpgcHrQrplA7OiGbXIbKls&amp;sensor=false"></script>
    
    <link href="/Library/WebFonts/MyFontsWebfontsKit.css" rel="stylesheet" />
    <link href="/Library/Style/12.css" rel="stylesheet" />
    <link href="/Library/Style/reset.css" rel="stylesheet" />
    <link href="/Library/Style/text.css" rel="stylesheet" />

    <link href="/Library/Style/style.css" rel="stylesheet" />

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
   
    <meta name="viewport" content="width=device-width" />
<style>
	fieldset{
		width:100%;
	}
	input[type=text],
	input[type=tel],
	input[type=email],
	textarea 
	{
		width:96%;
		padding:2%;
		clear:left;
		border:1px solid #fff;
		font-size:12px;
		font-family:'Century Gothic', CenturyGothicPro, sans-serif;
		font-weight:normal;
	}
	select
	{
		width:100%;
		padding:2%;
		clear:left;
		border:1px solid #fff;
	}
	label
	{
		font-size:10px;
		color:#fff;
		margin-top:10px;
		display:block;
	}

	.country_list
	{
		width:21%;
		margin:0 2%;
		float:left;
	}
	.country_group
	{
		cursor:pointer;
	}
		.country_list h3
		{
			font-size:1.2em;
			color:#fff;
			font-weight:normal;
			margin-top:10px !important;
			letter-spacing:normal;
		}
		.country_list p
		{
			margin-bottom:0;
		}
	span.redirect { 
	unicode-bidi:bidi-override; 
	direction: rtl; 
	}
	h4{
		font-weight:bold;
		text-transform:lowercase;
		color:#fff;
		margin:20px 0 10px 0;
	}
	p{
		margin-bottom:5px;	
	}
    
</style>
<script>
	$(document).ready(function () {
		$('.at').empty().append('@');
		
		if ($(window).width() > 767) {
            $('.atel').removeAttr('href');
        }

		$('.country_group').mouseenter(function () {
			$(this).children('h3, p').css({ 'color': '#b0d136' });
		}).mouseleave(function () {
			$(this).children('h3, p').css({ 'color': '#fff' });
		});
		$('.country_group').children().click(function () {
			var loc = $(this).text();
			
			sendMail(loc);
		});
	});
function sendMail(loc){
			var that = loc;//$(this).text();
			ga('send', 'event', 'Email', 'Click Link','Contact from '+that);
			setTimeout(function(){location.href='m'+'ail'+'to:in'+'fo'+'@ap'+'aiser.'+'com?subject=apaiser contact form from '+that;},200);return false;
}

	
</script>
<script type="text/javascript">

        var map;
        var point = new google.maps.LatLng(47.807424, -122.377484);

        var MY_MAPTYPE_ID = 'styled';

        function initialize() {

            var stylez = [
			  {
				"featureType": "water",
				"stylers": [
				  { "color": "#59504b" },
				  { "lightness": -10 }
				]
			  },{
				"elementType": "labels",
				"stylers": [
				  { "saturation": -100 }
				]
			  },{
				"featureType": "landscape",
				"stylers": [
				  { "saturation": -90 },
				  { "lightness": -17 }
				]
			  },{
				"featureType": "poi",
				"stylers": [
				  { "saturation": -100 }
				]
			  },{
				"featureType": "road.arterial",
				"stylers": [
				  { "saturation": -100 }
				]
			  },{
				"featureType": "road.highway",
				"elementType": "geometry.fill",
				"stylers": [
				  { "color": "#B0D137" }
				]
			  },{
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [
				  { "color": "#ffffff" },
				  { "visibility": "simplified" }
				]
			  },{
				"featureType": "landscape"  },{
				"featureType": "road.local",
				"elementType": "geometry.fill",
				"stylers": [
				  { "saturation": -68 },
				  { "lightness": -28 }
				]
			  },{
				"stylers": [
				  { "visibility": "simplified" }
				]
			  },{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
				  { "lightness": -41 },
				  { "visibility": "simplified" }
				]
			  },{
			  },{
				"featureType": "transit.line",
				"stylers": [
				  { "saturation": -100 }
				]
              },{
              }
            ]
    

            var mapOptions = {
                zoom: 10,
                center: point,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
    
               //{
                //  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
               //},
                mapTypeId: MY_MAPTYPE_ID
            };

            map = new google.maps.Map(document.getElementById('map_canvas'),
                mapOptions);
   
            var styledMapOptions = {
                name: 'Styled'
            };
            /*var iconBase = '/Images/Icons/';
            var marker = new google.maps.Marker({
                position: point,
                map: map,
                icon: iconBase + 'AVTK_MapPin.png'
            });*/
            var styledMapType = new google.maps.StyledMapType(stylez, styledMapOptions);
    
            map.mapTypes.set(MY_MAPTYPE_ID, styledMapType);
        }
    
        $(document).ready(function () {
            initialize();
        });
    
    </script>

</head>

<body>
<?php $path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/Library/header.php'); ?>

<div class="container_12">
        <article class="grid_3 contact-info" id="contact-info">
            <h1>Contact apaiser</h1>

			<h4>Australia</h4>
            <p>
                <b>apaiser Flagship Melbourne showroom</b><br />
                344 Burnley Street<br />
                Richmond, VIC, Australia<br>
            </p>
            <p>telephone<br/>
            <a class="atel" href="tel:61394215722"><b>+61 3 9421 5722</b></a></p>

            <p>email<br/>
            <a href="#" onclick="javascript:window.location ='mailto:info'+'@apaiser'+'.com?subject=apaiser australia inquiry'"><b><span class="redirect">moc.resiapa@ofni</span></b></a></p>

			<h4>United States of America</h4>

            <p>telephone - Glen Rosser<br/>
            <a class="atel" href="tel:12066506780"><b>+1 206 650 6780</b></a></p>

<!--            <p>fax<br/>
            <a class="atel" href="tel:12062993070"><b>+1 206 299 3070</b></a></p>-->

            <p>email<br/>
            <a href="#" onclick="javascript:window.location ='mailto:glen'+'@apaiser'+'.com?subject=apaiser USA inquiry'"><b><span class="">glen<span class="at">(at)</span>apaiser.com</span></b></a></p>

			<h4>Asia</h4>
            
            <p>
                <b>Singapore showroom</b><br />
                23 Mosque St<br />
                Singapore<br>
            </p>
            <p>telephone<br/>
            <a class="atel" href="tel:6562232378"><b>+65 6223 2378</b></a></p>

            <p>email<br/>
            <a href="#" onclick="javascript:window.location ='mailto:singapore'+'@apaiser'+'.com?subject=apaiser asia inquiry'"><b><span class="">singapore<span class="at">(at)</span>apaiser.com</span></b></a></p>

            <h4>United Kingdom</h4>
            
            <p>telephone - Mark Coates<br/>
            <a class="atel" href="tel:447810860940"><b>+44 7810 860 940</b></a></p>

            <p>email<br/>
            <a href="#" onclick="javascript:window.location ='mailto:mark'+'@apaiser'+'.com?subject=apaiser UK inquiry'"><b><span class="">mark<span class="at">(at)</span>apaiser.com</span></b></a></p>

            <h4>Europe</h4>
            
            <p>telephone<br/>
            <a class="atel" href="tel:447810860940"><b>+44 7810 860 940</b></a></p>

            <p>email<br/>
            <a href="#" onclick="javascript:window.location ='mailto:mark'+'@apaiser'+'.com?subject=apaiser Europe inquiry'"><b><span class="">mark<span class="at">(at)</span>apaiser.com</span></b></a></p>

        </article>
        
        <section class="grid_9" style="margin-bottom:20px;">
          <div class="grid_4 alpha">
          	<h4>Enquiry Form</h4>
            <?php include($path."/ContactManager/index.php");?>
          </div>
          <div class="grid_5 omega">
          	<h4>Global headquarters</h4>
          	<img src="/MediaFiles/Images/contact-b-showroom.jpg" alt="apaiser Global Headquarters | Australia" />
            <p class="grid_2 alpha" style="margin-top:10px;">
                <b>apaiser Flagship Melbourne showroom</b><br />
                344 Burnley Street<br />
                Richmond, VIC, Australia<br>
                <br>
            </p>
            <div class="clear"></div>
            <p style="margin-top:10px;">
                Showrooms Australia wide and globally
            </p>
            
            <img src="/MediaFiles/Images/map-1.png" alt="apaiser Global Locations" />
          </div>
        </section>
        
    </div>
    
<?php include($path.'/Library/footer.php'); ?>

</body>
</html>