<script>
    $('#navigation').live('click', function () {
        $('#navul').slideToggle();
        $(this).toggleClass('mobile_nav_active');
    });
	
	$(function () {
		setNavigation();
		setFooterNav();
	});

	function setNavigation() {
		var path = window.location.pathname;

		$('nav').find('a').each(function () {
			var href = $(this).attr('href').substring(1);

			if (path.substring(1) === href) {
				$(this).addClass('current');
			}
		});
	}

	function setFooterNav() {
		
	}
</script>
<div id="fw_header_wrap">
    <header class="container_12">
        <div class="grid_3">
   		   	 <a href="/" title="apaiser | Luxury Stone Bathware including Stone Bathtubs, Vanities and Basins">
            	<img src="/MediaFiles/Images/apaiser_logo.png" style="padding-left:10px;" alt="apaiser luxury stone bathware, bathtubs and stone basins"/>
            </a>
            <div id="navigation" class="mobile_nav_control mobile_only"><img src="/MediaFiles/Images/resp_navi_bg.png" alt="responsive navigation menu"/><span></span></div>
        </div>
        <div class="grid_9">
            <nav>
                <ul id="navul">
                    <li><a href="/" class="default" title="apaiser | Luxury Stone Bathware including Stone Bathtubs, Vanities and Basins">home</a></li>
                    <li><a href="/about" title="apaiser | Award Winning Stone Baths, Vanities and Freestanding Basins">about</a></li>
                    <li><a class="products" href="/product" title="apaiser | Free Standing Baths, Stone Bathtubs, Wash Basins & Vanities">products</a></li>
                    <li><a href="/projects" title="apaiser | Award winning, luxury Stone Bathtubs, Basins & Vanities">projects</a></li>
                    <li><a href="/custom" title="apaiser | Custom Stone Bathware for Modern Bathrooms">custom</a></li>
                    <li><a href="/blog/" title="apaiser | News and Press Releases">blog</a></li>
                    <li><a href="/contact" title="apaiser | Contact for Stone Bathtubs, Basins and Vanities">contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
</div>