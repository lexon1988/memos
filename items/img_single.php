	<a id='go_in_top2' style='margin-top:-40px;'></a>

	<div class="grid-item">
	  
	  
	  <!-- Полный текст -->
		  <div class='text_full' id='text_full2'>
		  <span class='glyphicon glyphicon-remove' style='float:right; margin-top:10px; margin-left:10px;'' id='text_full_close2'></span>
			<hr>
		  <div class="mCustomScrollbar" style=' height:90%; padding:5px; text-align:justify;' data-mcs-theme="dark-2">

			 Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя в постели превратился в страшное насекомое. Лежа на панцирнотвердой спине, он видел, стоило ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот, на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло. Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились у него перед глазами. «Что со мной случилось?» – подумал он. Это не было сном. Его комната, настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон – Замза был коммивояжером, – висел портрет, который он недавно вырезал из иллюстрированного журнала и вставил в красивую золоченую рамку. На портрете была изображена дама в меховой шляпе и боа, она сидела очень прямо и протягивала зрителю тяжелую меховую муфту, в которой целиком исчезала ее рука. Затем взгляд Грегора устремился в окно, и пасмурная погода – слышно было, как по жести подоконника стучат капли дождя – привела его и вовсе в грустное настроение. «Хорошо бы еще немного поспать и забыть всю эту чепуху», – подумал он, но это было совершенно неосуществимо, он привык спать на правом боку, а в теперешнем своем
			
			<hr>	
			
		 </div>	
		 </div>	
	  <!-- ### Полный текст -->
		
		
		<?php
			list($width, $height, $type, $attr) = getimagesize("rezimg/6.jpg");
			$perc=300/($width*0.01)*0.01;
			$crop= 32*$perc;
		?>
		
		<div style="overflow:hidden;">
			<img  class='img_main'  src='rezimg/6.jpg' style="margin:0px 0px -<?php echo $crop; ?>px 0px;">
		</div>
		
		
		<div class='text'>
			<p>А тут мы напишем текста на 140 символов, такой же как у твиттера, который стимулирует креотивность и прочее. Осталось ещё примерно 30 символов, но нужно завершить нез... </p>
		
			<a href='#go_in_top2' style='text-decoration:none;'><div class='button_full_text' id='text_full_show2'>Весь текст- <b>43245</b> символов</div></a>
		</div>

	<div class='rating '>
		<table width=100%>
			<tr>
				<td width='33%'; >
					<div class='rating_hide'>
						<span class='glyphicon glyphicon-heart span1'></span>&nbsp;&nbsp;<small id='like2' style='font-size:10px; '>   </small><br>
						<span class='glyphicon glyphicon-bullhorn span1'></span>&nbsp;&nbsp;<small id='repost2' style='font-size:10px; '></small>
						<script>
							$('#like2').text(abc2("13788656"));
							$('#repost2').text(abc2("43234543"));
	
							$('#text_full_show2').click(function() {
								$("#text_full2").show();							
							});

							$('#text_full_close2').click(function() {
								$('#text_full2').hide();
							});
						</script>
					</div>
				</td>
				<td  width='33%' style='text-align:center;'>
					<div class='midle_butt'><span class='glyphicon glyphicon-unchecked' style='margin-left:3.5px;'></span></div>
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