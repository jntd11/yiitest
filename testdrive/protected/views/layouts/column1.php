<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
		<div >
			<?php
				
				foreach ($this->menu as $key=>$value){
					$link = "index.php?r=".$this->getUniqueId()."/".CHtml::normalizeUrl($value['url'][0]);
					//$this->getRoute().$value['url'][0];
					echo '<a href="'.$link.'" class="buttons"><input type="button" value="'.$value['label'].'" /></a>'." ";
				}
			?>
			<?php
				if(count($this->buttons) > 0){
					echo "<div class='portlet-content'><ul class='operations'>";  
					foreach($this->buttons as $key => $val){
						echo "<li >".$val."</li>";
					}
					echo "</ul></div>";
				}
			?>
		</div>
		<div>&nbsp;</div>
	<?php echo $content; ?>
	<div>&nbsp;</div>
		<div >
			<?php
				
				foreach ($this->menu as $key=>$value){
					$link = "index.php?r=".$this->getUniqueId()."/".CHtml::normalizeUrl($value['url'][0]);
					//$this->getRoute().$value['url'][0];
					echo '<a href="'.$link.'" class="buttons"><input type="button" value="'.$value['label'].'" /></a>'." ";
				}
			?>		
			<?php
				if(count($this->buttons) > 0){
					echo "<div class='portlet-content'><ul class='operations'>";  
					foreach($this->buttons as $key => $val){
						echo "<li >".$val."</li>";
					}
					echo "</ul></div>";
				}
			?>
		</div>
</div><!-- content -->
<?php $this->endContent(); ?>