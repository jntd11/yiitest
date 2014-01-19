<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main-mobile'); ?>
<div class="span-19">
	<div id="content">
		<div >
			<?php
				
				foreach ($this->menu as $key=>$value){
					if(isset($value['url'])) {
						$link = "index.php?r=".$this->getUniqueId()."/".CHtml::normalizeUrl($value['url'][0]);
						//$this->getRoute().$value['url'][0];
						echo '<a href="'.$link.'" class="buttons"><input type="button" value="'.$value['label'].'" /></a>'." ";
					}
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
		<div  id="bottommenu">
			<?php
				
				foreach ($this->menu as $key=>$value){
					if(isset($value['url'])) {
						$link = "index.php?r=".$this->getUniqueId()."/".CHtml::normalizeUrl($value['url'][0]);
						echo '<a href="'.$link.'" class="buttons"><input type="button" value="'.$value['label'].'" /></a>'." ";
					}
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
</div>
<div class="span-5 last">
	<div id="sidebar" style="display: none;">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>array(''),
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	<?php
		if(count($this->buttons) > 0){
			echo "<div class='portlet-content'><ul class='operations'>";  
			foreach($this->buttons as $key => $val){
				//echo "<li >".$val."</li>";
			}
			echo "</ul></div>";
		}
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>