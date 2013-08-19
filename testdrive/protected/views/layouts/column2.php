<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
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
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>