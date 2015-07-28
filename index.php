<?php
	require_once('template/header.php');
?>

		   <div id="sliderFrame">
	        <div id="slider">
	            <a href="http://www.menucool.com/jquery-slider" target="_blank">
	                <img src="img/image-slider-1.jpg" alt="Супа топчета" />
	            </a>
	            <a href="http://www.menucool.com/jquery-slider" target="_blank">
	                <img src="img/image-slider-2.jpg" alt="Гъбена супа" />
	            </a>
	            <a href="http://www.menucool.com/jquery-slider" target="_blank">
	                <img src="img/image-slider-3.jpg" alt="Спаначена супа" />
	            </a>
	            <a href="http://www.menucool.com/jquery-slider" target="_blank">
	                <img src="img/image-slider-4.jpg" alt="Крем супа" />
	            </a>
	        </div>
        <!--thumbnails-->
        <div id="thumbs">
            <div class="thumb">
                <div class="frame"><img src="img/thumb1.jpg" /></div>
                <div class="thumb-content"><p>Супа топчета</p>Кратко описание</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="img/thumb2.jpg" /></div>
                <div class="thumb-content"><p>Гъбена супа</p>Гъбената супа ...</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="img/thumb3.jpg" /></div>
                <div class="thumb-content"><p>Спаначена супа</p>Супата трябва ...</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="img/thumb4.jpg" /></div>
                <div class="thumb-content"><p>Крем супа</p>Крем супата се нуждае от ...</div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
        <div style="clear:both;height:0;"></div>
    </div>

		

<?php
	require_once('template/footer.php');
?>