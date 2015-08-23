<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>apaiser | Freestanding Bathtubs, Stone Basins and Stone Bathware</title>

	<meta name="keywords" content="stone bath tub, stone bath, stone basin, wash basins, Free standing baths, vanities, modern bathroom, stone bathware">
    <meta name="description" content="apaiser offers a variety of stone bathware, bath tubs, wash basins and vanities designed to complement any home. apaiser also offers an extensive range of modern free standing baths that suit any bathroom.">
    
	<?php include 'Library/dochead.php'; ?>
    <link rel="canonical" href="http://www.apaiser.com/product/" /> 
     <script type="text/javascript">
        var allProds, displayProds = [];
        var curCategory = '';
        var curType = '';
        var curPage = 0;

        if ($(window).width() < 700) {
            var itemsPerPage = 90000;
        } else {
            var itemsPerPage = 9;
        }

        $(document).ready(function () {
            $('#portfolioContainer').addClass('loadingbg');

            $.ajax({
                dataType: "json",
                type: "GET",
                url: "api.php",
                success: function (data) {
                    allProds = data;
			
			        var prodCategory = getUrlVar('category');
                    var prodType = getUrlVar('type');

                    if (getUrlVar('page')) {
                        curPage = parseInt(getUrlVar('page'));
                        if (curPage >= 1)
                            curPage -= 1;
                    } else {
                        curPage = 0;
                    }
					
                    filterProducts(prodType, prodCategory);

                    $('#portfolioContainer').removeClass('loadingbg');
                },
                fail: function () {
                    console.log('fail');
                },
                complete: function () {
                    console.log('complete');
                }
            });

            $('.type').live('click', function () {
                if ($(this).siblings('ul').is(':visible')) {

                } else {
                    $(this).addClass('current').parent().siblings().children().removeClass('current');
                    $('.product_shape').slideUp(300);
                    $(this).siblings('.product_shape').slideDown(300);
                }
                $('.product_shape a').removeClass('current');
            });

            $('.product_shape a').live('click', function () {
                $('.product_shape a').removeClass('current');
                $(this).addClass('current');
            });

            $('.allprod').live('click', function () {
                $('.product_shape').slideUp(300);
            });

            $('a[data-category="' + getUrlVar('type') + '"]').addClass('current').siblings('ul').show().find('a[data-category="' + getUrlVar('category') + '"]').addClass('current');
        });

        function filterClick(prodtype, prodcat) {
            if (!prodtype || prodtype == 'all') prodtype = 'all';
            if (!prodcat || prodcat == 'all') prodcat = 'all';

            updateUrl(prodtype, prodcat, curPage);
        }

        function filterProducts(prodtype, prodcat) {
            curType = prodtype;
            curCategory = prodcat;

            if ((!prodtype) || (prodtype.toLowerCase() == 'all')) prodtype = null;
            if ((!prodcat) || (prodcat.toLowerCase() == 'all')) prodcat = null;

            displayProds.length = 0;

            $.each(allProds, function (key, val) {
                var display = false;
				
				;

                if (prodtype) {
                    // filter by type (Bath, Basin, etc.)
                    if (val.prodtype.toLowerCase() == prodtype.toLowerCase()) {
                        // filter by category (Oval, circle, etc.), if it's been passed in

                        if (prodcat) {
                            if (val.prodcat.toLowerCase() == prodcat.toLowerCase())
                                display = true;
                        } else
                            display = true;
                    }
                } else // if prodtype not specified, maybe display everything?
                    display = true;

                if (display)
                    displayProds.push(val);
            });

            if ($(window).width() < 700) {

            } else {
                setupPager(displayProds.length);
            }

            displayProducts(curPage);
        }

        function displayProducts(targPage) {
            var isPaging = (targPage != curPage);

            // paging logic to roll targPage over if not within available range
            if ((targPage * itemsPerPage) > displayProds.length)
                targPage = 0;
            else if ((targPage * itemsPerPage) < 0)
                targPage = (Math.floor(displayProds.length / itemsPerPage));

            curPage = targPage;

            if (isPaging)
                updateUrl(curType, curCategory, curPage);

            // update current pager button display
            $('a.currentPage').removeClass('currentPage');
            $('a#pager_btn_' + targPage).addClass('currentPage');


            // add special class to old display items
            $('article.product').addClass('remove');
            for (var i = (targPage * itemsPerPage) ; i < ((targPage + 1) * itemsPerPage) ; i++) {
                if (displayProds[i]) {
                    var prodHtml = '<article class="product" style="display: none;" data-categories="' + displayProds[i].prodtype.toLowerCase() + displayProds[i].prodcat + ' ' + displayProds[i].prodtype.toLowerCase() + '" data-shape="' + displayProds[i].prodcat + '" data-type="' + displayProds[i].prodtype + '" >';

                    prodHtml += '<a href="/products/' + displayProds[i].prodtype + '/' + displayProds[i].product + '">';
                    prodHtml += '<h3>' + displayProds[i].prodname + '</h3>';
					prodHtml += '<img src="/MediaFiles/Images/Products/Thumbs/' + displayProds[i].prodtype + '/' + displayProds[i].image  + '" alt="custom stone bathware" />';
                    prodHtml += '</a></article>';

                    $('#portfolio_wavy').append(prodHtml);
                }
            }


            // fade out and remove old items
            $('article.product.remove').hide(0, function () {
                $(this).remove();
                //showProduct();
            });
            //function showProduct() {
            $('article.product').show(0);
            //}

        }

        function setupPager(itemCount) {
            $('#pager').empty();

            var totalPages = Math.ceil(itemCount / itemsPerPage);
            if (totalPages > 1) {
                // skip to first
                var pagerHtml = '<a class="page_fast" onclick="displayProducts(0);" ><<</a>';

                for (var i = 0; i < totalPages ; i++) {
                    pagerHtml += ' <a class="page_number" id="pager_btn_' + i + '" onclick="displayProducts(' + i + ');" >' + (i + 1) + '</a>';
                }

                // skip to last
                pagerHtml += ' <a class="page_fast" onclick="displayProducts(' + (totalPages - 1) + ');" >>></a>';

                $('#pager').append(pagerHtml);
            }
        }

        function updateUrl(prodType, prodCat, pageNum) {
            // update url with category and type for newer browsers or redirect for older
            if (window.history && window.history.pushState) {
                window.history.pushState('', '', '/product.php?type=' + prodType + '&' + 'category=' + prodCat + '&page=' + (pageNum + 1));
                //window.history.pushState('', '', '/product/' + prodType + '/' + prodCat + '/' + (pageNum + 1));

                filterProducts(prodType, prodCat);
            } else {
                window.location.href = '/product.php?type=' + prodType + '&category=' + prodCat + '&page=' + (pageNum + 1);
                //window.location.href = '/product/' + prodType + '/' + prodCat + '/' + (pageNum + 1);
            }
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


        $(document).ready(function () {
            $('.product_shape a, .type').live('click', function () {
                // $('.product_shape a, .type').removeClass('current');
                //$(this).addClass('current');
            });
            $('#filter_control').live('click', function () {
                $(this).siblings('ul').slideToggle();
                $(this).children('span').html($(this).text() == "Hide Product Filters" ? "Show Product Filters" : "Hide Product Filters");
                $(this).toggleClass('mobile_nav_active');
            });

            if ($(window).width() > 500) {
                $('.product').live('mouseenter', function () {
                    $('.product').not(this).stop(true, false).fadeTo(100, 0.5);
                    $(this).stop(true, false).fadeTo(100, 1);
                });
                $('#portfolio_wavy').live('mouseleave', function () {
                    $('.product').stop(true, false).fadeTo(100, 1);
                });
            }
        });
    </script>
    
    
    <style>
        .loadingbg {
            background-image: url(/MediaFiles/Images/ajax-loader.gif);
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>

    <?php include 'Library/header.php'; ?>
    <div class="container_12" style="margin-bottom: 20px;">
        <nav class="grid_3">
            <h1>Stone bathware, bathtubs, basins, vanities &amp; shower bases by apaiser</h1>
            <p>apaiser&trade; has developed an extensive selection of stone composite baths, basins and integrated vanity units, as well as a range of complementary products. Each piece is exquisitely hand crafted from apaiser's unique proprietary stone composite formula, comprising of a proprietary blend of marble, stone aggregate, resins and polymers, embedded with natural elements such as stone and mother of pearl. Available in a broad range of colours, sizes and designs, the collection is suitable for every bathroom environment. Whether contemporary, or traditional, natural and organic, or luxurious and opulent, there is the perfect design for every space.</p>
            <div id="filter_control" class="mobile_nav_control mobile_only mobile_nav_active" style="text-align: center;">
                <img src="/MediaFiles/Images/resp_navi_bg.png" style="width: 16px; margin-right: 5px;" alt="responsive navigation" /><span>Hide Product Filters</span>
            </div>
            <ul id="product_categories" class="portfolio-filters">
                <li class="product_class"><a class="active allprod" onclick="filterClick('all', 'all');">All</a></li>
                <li class="product_class">
                    <a class="type" data-category="bath" onclick="filterClick('bath', 'all');" title="Stone baths and tubs">Bath</a>
                    <ul class="product_shape">
                        <li><a data-category="oval" onclick="filterClick('bath', 'oval');" title="Oval stone baths and tubs">Oval</a></li>
                        <li><a data-category="rectangle" onclick="filterClick('bath', 'rectangle');" title="Rectangular stone baths and tubs">Rectangle</a></li>
                        <li><a data-category="asymmetrical" onclick="filterClick('bath', 'asymmetric');" title="Asymmetrical stone baths and tubs">Asymmetrical</a></li>
                        <li><a data-category="circle" onclick="filterClick('bath', 'circle');" title="Circular stone baths and tubs">Circle</a></li>
                    </ul>
                </li>
                <li class="product_class">

                    <a class="type" data-category="basin" onclick="filterClick('basin', 'all');" title="Stone basins">Basin</a>
                    <ul class="product_shape">
                        <li><a data-category="oval" onclick="filterClick('basin', 'oval');" title="Oval stone basins">Oval</a></li>
                        <li><a data-category="rectangle" onclick="filterClick('basin', 'rectangle');" title="Rectangular stone basins">Rectangle</a></li>
                        <li><a data-category="asymmetrical" onclick="filterClick('basin', 'asymmetric');" title="Asymmetrical stone basins">Asymmetrical</a></li>
                        <li><a data-category="circle" onclick="filterClick('basin', 'circle');" title="Circular stone basins">Circle</a></li>
                    </ul>
                </li>
                <li class="product_class">
                    <a class="type" data-category="vanity" onclick="filterClick('vanity', 'all');" title="Stone vanities">Vanity</a>
                    <ul class="product_shape">
                        <li><a data-category="oval" onclick="filterClick('vanity', 'oval');" title="Oval stone vanities">Oval</a></li>
                        <li><a data-category="rectangle" onclick="filterClick('vanity', 'rectangle');" title="Rectangular stone basins">Rectangle</a></li>
                        <!--<li><a data-category="asymmetrical" onclick="filterClick('vanity', 'asymmetric');">Asymmetrical</a></li>-->
                        <li><a data-category="circle" onclick="filterClick('vanity', 'circle');" title="Circular stone basins">Circle</a></li>
                    </ul>
                </li>
                <li class="product_class">
                    <a class="type" data-category="Extra" onclick="filterClick('extra', 'all');" title="Stone extras">Extras</a>
                    <!--
                    <ul class="product_shape">
                        <li><a data-category="baths" onclick="filterClick('extra', 'baths');">Baths</a></li>
                    </ul>
                    -->
                </li>
            </ul>
        </nav>
        <div class="grid_9" id="portfolioContainer" style="margin-top: 20px;">
            <div id="portfolio_wavy"></div>

            <div class="clearfix"></div>

            <div id="pager"></div>
        </div>
    </div>
    <div class="seo" style="display:none;">
    	<ul>
        	<?php $path = $_SERVER['DOCUMENT_ROOT'];
            	
            	include($path.'/products/config.php');

				$result = mysql_query("SELECT * FROM tbl_product_overview");
				
				while($rows = mysql_fetch_array($result)){
					echo '<li><a href="/products/'.$rows['ProdCat'].'/'.$rows['ProdID'].'" title="'.$rows['ProdName'].'">'.$rows['ProdName'].'</a></li>';	
				}
				
			?>
        </ul>
    </div>
     <?php include 'Library/footer.php'; ?>
    

</body>
</html>