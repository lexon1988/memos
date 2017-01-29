<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=0.8">


	<title>Memario.com</title>
  
	
	<link href="https://fonts.googleapis.com/css?family=Arsenal|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />	
	<link rel="stylesheet" href="css/style.css" />
	
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/imgload.js"></script>
	<script type="text/javascript" src="js/toggleNavBar.min.js"></script>
	<script  src="js/masonry.js"></script>
	<script src="js/jquery.infinitescroll.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    

  </head>

  <body>


  
  <div class='modal_shade'></div>
  
  <div class='modal' id='modal'>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dignissim orci. Cras pellentesque eros eu lectus pulvinar, at tincidunt lorem malesuada. Suspendisse pulvinar auctor pretium. Nunc ornare mollis augue ac convallis
  <hr>
  </div>

  <div class='modal2' id='modal2'>
  MODAL 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dignissim orci. Cras pellentesque eros eu lectus pulvinar, at tincidunt lorem malesuada. Suspendisse pulvinar auctor pretium. Nunc ornare mollis augue ac convallis
  <hr>
  </div>
  

  
  <div class='menu full-width'	 id='navbar'>

	  <div class='menu_inner'>
	  
	  <table width=100%>
	  <tr>
		  <td class='menu_logo_td'> 	
		  <img src='img/menu.png' id='menu' height=40em>  
		  <a href='index.php'><img src='img/logo.png' height=40em></a>
		  </td>	
			
			<td class='search_bar_td'>	
		
			
					
			<form action="index.php" method="get" class="search">
				<input type="text" name="search" placeholder="Что хотите найти?" class="input">
				<input type="submit" name="" value="" class="submit">
			</form>

						
					
				
				</td>
				
				<td class='auth_td' >
				<img src='img/settings.png' id='sett'   height=40em>  	
				</td>

				<tr>
				</table>
			
			
		
	    </div>	
  
  </div>
  
<br>	

  

  
    <div class="grid">
	

      <div class="grid-item ">
		
		<?php
		list($width, $height, $type, $attr) = getimagesize("rezimg/6.jpg");
		$perc=300/($width*0.01)*0.01;
		$crop= 32*$perc;
		?>
		
		<div style="overflow:hidden;">
			<img  class='img_main'  src='rezimg/6.jpg' style="margin:0px 0px -<?php echo $crop; ?>px 0px;">
		</div>
		


		

		
		<div class='rating '>
		<table width=100%>
			<tr>
		
				<td width='33%'; >
					<div class='rating_hide'>
						<span class='glyphicon glyphicon-heart span1'></span><small style='font-size:10px; '>&nbsp; &nbsp; 5 432 344  </small><br>
						<span class='glyphicon glyphicon-bullhorn span1'></span><small style='font-size:10px; '>&nbsp; &nbsp; 423 344  </small>
					<div>
				</td>
				
				<td  width='33%' style='text-align:center;'>
				
					<div class='midle_butt'><span class='glyphicon glyphicon-unchecked' style='margin:0'></span></div>
				
				</td>
				
				<td  width='33%'>
					<div class='rating_hide'>
					
						<div style='float:right;'><font size='3'>
							<b>Сегодня</b></font>
						</div>
					</div>
				</td>
			</tr>
		</table>	
		</div>
			
      </div>
	  
	
	  

	  
	  
	  
	  
	  
      <div class="grid-item">
		<img class='img_main' src='rezimg/3.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>


      <div class="grid-item">
		<img class='img_main' src='rezimg/4.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      
	  </div>


      <div class="grid-item">
		<img class='img_main' src='rezimg/5.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>



      <div class="grid-item">
		<img class='img_main' src='rezimg/6.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
	<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>

	  
	  
	  <!-- МНОГО КАРТИНОК -->
	  
      <div class="grid-item grid-item-multy ">
		
			
			<div id="content-2" class="mCustomScrollbar" style='width:290px; height:300px;' data-mcs-theme="minimal-dark">
			
				<img  class='img_main img_main_multy'  src='http://masonry/rezimg/7.jpg'><br><br>
				<img  class='img_main img_main_multy'  src='rezimg/2.jpg'><br><br>
				<img  class='img_main img_main_multy'  src='rezimg/3.jpg'><br><br>
			
			
			</div>
			
		
		<p class='text' style='background-color: #262626; color:white; border:none;'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		
		<div class='rating' style='background-color: #262626; color:white; border:none;'>
			<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
			<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
			<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
					
		</div>	
      </div>
	  
	  <!-- МНОГО КАРТИНОК -->
	  
	  
	  
	  


      <div class="grid-item">
			<img class='img_main' src='rezimg/7.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
			<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>



      <div class="grid-item">
		<img class='img_main' src='rezimg/8.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>



      <div class="grid-item">
		<img class='img_main' src='rezimg/9.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
	<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>




      <div class="grid-item">
		<img class='img_main' src='https://pp.vk.me/c639225/v639225781/4596/Fp8516bPW6o.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>

      </div>



      <div class="grid-item">
		<img class='img_main' src='https://pp.vk.me/c639225/v639225781/4575/sfvorseR2y0.jpg'>
		<p class='text'>Комментарий к посту, с текстом каким - то на русском, скорей всего.</p>
		<div class='rating'>
				<span class='glyphicon glyphicon-heart span1'></span><small> 1322  </small>&nbsp;&nbsp;&nbsp;
				<span class='glyphicon glyphicon-bullhorn span1'></span><small> 43  </small>
				<div style='float:right;'><font size='3'><b>Сегодня</b></font></div>
		
		</div>
      </div>	  
	  
</div> 
	  
 
	  
	  
	 
    <nav id="pagination">
      <p>
	  
	  
        <a id='next_page' href="page.php?p=2"></a>
     
	  
	  </p>
    </nav>
   

	


	<script src="js/script.js"></script>
	
	

  </body>

</html>
