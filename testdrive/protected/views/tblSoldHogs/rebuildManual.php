<div class="form" id="forms">
<div class="view">
	<b><?php echo CHtml::encode($model->getAttributeLabel('tbl_sold_hogs_id')); ?>:</b>
	<span id="tbl_sold_hogs_id"><?php echo $dataProvider->tbl_sold_hogs_id; ?></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('hog_ear_notch')); ?>:</b>
	<span id="hog_ear_notch"><?php echo $dataProvider->hog_ear_notch; ?></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('customer_name')); ?>:</b>
	<span id="customer_name"><?php echo $dataProvider->customer_name; ?></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('date_sold')); ?>:</b>
	<span id="date_sold"><?php echo $dataProvider->date_sold; ?></span>
	<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('sold_price')); ?>:</b>
	<span id="sold_price"><?php echo $dataProvider->sold_price; ?></span>
	<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('invoice_number')); ?>:</b>
	<span id="invoice_number"><?php echo $dataProvider->invoice_number; ?></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('comments')); ?>:</b>
	<span id="comments"><?php echo $dataProvider->comments; ?></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('reason_sold')); ?>:</b>
	<span id="reason_sold"><?php echo $dataProvider->reason_sold; ?></span>
	<br />
</div>
<div class="errorSummary">
<ul>
<li>Customer Not found for the above hog. Choose a name from the below list of customer names:</li>
</ul>
</div>
<div class="row">
<input name="soldhogname" id="soldhogname" type="hidden" value="<?php echo $dataProvider->tbl_sold_hogs_id;?>" />
<b>Customer Name:</b>
<select name="custname" id="custname">
<?php

foreach ($datacustmodel as $items) {
		$selected = '';
	if(substr($dataProvider->customer_name, 0, 4) ==  substr($items['label'], 0, 4) || substr($dataProvider->customer_name, 0, 3) ==  substr($items['label'], 0, 3)
	|| substr($dataProvider->customer_name, 0, 3) ==  substr($items['label'], 0, 3) || substr($dataProvider->customer_name, 0, 1) ==  substr($items['label'], 0, 1))
		$selected = 'selected="selected"';
	echo "<option value='".$items['value']."' ".$selected.">".$items['label']."</option>";
    
} 
?>
</select>
</div>
<div class="row">
		<?php //echo CHtml::submitButton('Update', array('onClick'=>'')); ?>
		<?php echo CHtml::Button("Update Name",array('id'=>'updates','onClick'=>'updateSoldHog();')); ?>
</div>

</div>