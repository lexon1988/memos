<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=0.90">
	<title>Memario.com</title>
  

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />	
	<link rel="stylesheet" href="css/jquery.fancybox.css" />		
	<link rel="stylesheet" href="css/style.css" />
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/imgload.js"></script>
	<script type="text/javascript" src="js/toggleNavBar.min.js"></script>
	<script  src="js/masonry.js"></script>
	<script src="js/jquery.infinitescroll.min.js"></script>

	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script>
					
	$(document).ready(function() {
			
				$('.fancybox-buttons').fancybox({
					openEffect  : 'none',
					closeEffect : 'none',

					prevEffect : 'none',
					nextEffect : 'none',

					closeBtn  : false,

					helpers : {
						title : {
							type : 'inside'
						},
						buttons	: {}
					},

					afterLoad : function() {
						this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
					}
				});
				
				
				$('.fancybox-thumbs').fancybox({
					prevEffect : 'none',
					nextEffect : 'none',

					closeBtn  : false,
					arrows    : false,
					nextClick : true,

					helpers : {
						thumbs : {
							width  : 50,
							height : 50
						}
					}
				});

	});
	

		function abc2(n) {
			n += "";
			n = new Array(4 - n.length % 3).join("U") + n;
			return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
		}
	</script>
  
  </head>
  <body>


  
	<?php
		include('news.html');
		include('settings.html');
		include('menu.html');
	?>

	  

<div class="grid">
     
	<?php

		include('items/img_single.php');
		include('items/img_multiple.php');
		include('items/loren.php');
	
	?>
		  

</div> 
	  
 
	    
 
	<nav id="pagination">
	  <p>
		
		<a id='next_page' href="page.php?p=2"></a>
		  
	  </p>
	</nav>
	   

	<script src="js/jquery.fancybox.pack.js"></script>	
	<script src="js/script.js"></script>
	
	

	

  </body>
</html>
