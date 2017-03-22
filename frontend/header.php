<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=1, user-scalable=no">
	<title>Memario.com</title>


	<link rel="stylesheet" href="/frontend/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/frontend/css/jquery.mCustomScrollbar.css" />
	<link rel="stylesheet" href="/frontend/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="/frontend/css/style.css" />


	<script src="/frontend/js/jquery.min.js"></script>
	<script src="/frontend/js/imgload.js"></script>
	<script type="text/javascript" src="/frontend/js/toggleNavBar.min.js"></script>
	<script  src="/frontend/js/masonry.js"></script>
	<script src="/frontend/js/jquery.infinitescroll.min.js"></script>
	<script src="/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>


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
		include_once('./frontend/news.html');
		include_once('./frontend/settings.html');
		include_once('./frontend/menu.html');
	?>
