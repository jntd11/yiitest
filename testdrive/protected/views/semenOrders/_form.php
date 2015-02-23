<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */
/* @var $form CActiveForm */


$hogtag = Yii::app()->request->cookies['hog_tag'];
$datedefault = (isset($model->ordered_date))?$model->ordered_date:"";
$dateShip = (isset($model->ship_date))?$model->ship_date:"";
if($datedefault == "" && (isset($_GET['d']))) {
	$datedefault = $_GET['d'];
}
if($dateShip == "" && (isset($_GET['d']))) {
	$dateShip = $_GET['d'];
}

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'semen-orders-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::Button('List Orders',array('onClick'=>'window.location="index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & Duplicate' : 'Save & Duplicate',array('id'=>'savenew','name'=>'savedup')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go"')); ?>
	</div>
	<div>&nbsp;</div>

	<table>
	<tr >
	<td colspan="2">
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'company_name'); ?>
		<?php echo $form->textField($modelCustomer,'company_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($modelCustomer,'company_name'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'first_name'); ?>
		<?php echo $form->textField($modelCustomer,'first_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($modelCustomer,'first_name'); ?>
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'last_name'); ?>
		<?php echo $form->textField($modelCustomer,'last_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($modelCustomer,'last_name'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'address1'); ?>
		<?php echo $form->textField($modelCustomer,'address1',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($modelCustomer,'address1'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'address2'); ?>
		<?php echo $form->textField($modelCustomer,'address2',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($modelCustomer,'address2'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'city'); ?>
		<?php echo $form->textField($modelCustomer,'city',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'city'); ?>
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'state'); ?>
		<?php echo $form->textField($modelCustomer,'state',array('size'=>20,'maxlength'=>30)); ?>
		<?php echo $form->error($modelCustomer,'state'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'zip'); ?>
		<?php echo $form->textField($modelCustomer,'zip'); ?>
		<?php echo $form->error($modelCustomer,'zip'); ?>
	</div>
	</td>
	<td>
		<div class="row">
		<?php echo $form->labelEx($modelCustomer,'country'); ?>
		<?php echo $form->textField($modelCustomer,'country',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($modelCustomer,'country'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'contact'); ?>
		<?php echo $form->textField($modelCustomer,'contact',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'contact'); ?>
	</div>
		</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'phone_home'); ?>
		<?php echo $form->textField($modelCustomer,'phone_home',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'phone_home'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'phone_business'); ?>
		<?php echo $form->textField($modelCustomer,'phone_business',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'phone_business'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'phone_cell'); ?>
		<?php echo $form->textField($modelCustomer,'phone_cell',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'phone_cell'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'phone_other1'); ?>
		<?php echo $form->textField($modelCustomer,'phone_other1',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'phone_other1'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'phone_other2'); ?>
		<?php echo $form->textField($modelCustomer,'phone_other2',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'phone_other2'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($modelCustomer,'county'); ?>
		<?php echo $form->textField($modelCustomer,'county',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($modelCustomer,'county'); ?>
	</div>
	</td>
	<td>
		<div class="row">
		<?php echo $form->labelEx($modelCustomer,'mailing_code'); ?>
		<?php echo $form->textField($modelCustomer,'mailing_code',array('size'=>20,'maxlength'=>50,'onkeyup'=>'caps(this)')); ?>
		<a href="#" class="splitmenubutton" data-showmenu="dropmenu1" data-splitmenu="false">Code</a>
		<?php echo $form->error($modelCustomer,'mailing_code'); ?>
	</div>

    </td>
    </tr>
        <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_company_name'); ?>
			<?php echo $form->textField($modelCustomer,'ship_company_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_company_name'); ?>
		</div>
	</td>
	<td>

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_name'); ?>
			<?php echo $form->textField($modelCustomer,'ship_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_name'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_address1'); ?>
			<?php echo $form->textField($modelCustomer,'ship_address1',array('size'=>20,'maxlength'=>100)); ?>
			<?php echo $form->error($modelCustomer,'ship_address1'); ?>
		</div>
	</td>
	<td>

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_address2'); ?>
			<?php echo $form->textField($modelCustomer,'ship_address2',array('size'=>20,'maxlength'=>100)); ?>
			<?php echo $form->error($modelCustomer,'ship_address2'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_city'); ?>
			<?php echo $form->textField($modelCustomer,'ship_city',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_city'); ?>
		</div>
	</td>
	<td>

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_state'); ?>
			<?php echo $form->textField($modelCustomer,'ship_state',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($modelCustomer,'ship_state'); ?>
		</div>
	   </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_zip'); ?>
			<?php echo $form->textField($modelCustomer,'ship_zip'); ?>
			<?php echo $form->error($modelCustomer,'ship_zip'); ?>
		</div>
	</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_country'); ?>
			<?php echo $form->textField($modelCustomer,'ship_country',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_country'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_contact'); ?>
			<?php echo $form->textField($modelCustomer,'ship_contact',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_contact'); ?>
		</div>
	</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_phone'); ?>
			<?php echo $form->textField($modelCustomer,'ship_phone',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($modelCustomer,'ship_phone'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td colspan="2">

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'ship_area'); ?>
			<?php echo $form->textField($modelCustomer,'ship_area',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'ship_area'); ?>
		</div>

    </td>
    </tr>
      <tr>
    <td>
			<div class="row">
			<?php echo $form->labelEx($modelCustomer,'cc_brand'); ?>
			<?php echo $form->textField($modelCustomer,'cc_brand',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'cc_brand'); ?>
		</div>
		</td>
	<td>

		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'cc_number'); ?>
			<?php echo $form->textField($modelCustomer,'cc_number'); ?>
			<?php echo $form->error($modelCustomer,'cc_number'); ?>
		</div>
	    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'cc_expiration'); ?>
			<?php echo $form->textField($modelCustomer,'cc_expiration',array('size'=>6,'maxlength'=>6)); ?>
			<?php echo $form->error($modelCustomer,'cc_expiration'); ?>
		</div>
		</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($modelCustomer,'cc_name'); ?>
			<?php echo $form->textField($modelCustomer,'cc_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($modelCustomer,'cc_name'); ?>
		</div>
    </td>
    </tr>

   <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->dropDownList($model,'payment_type',array(''=>'select','COD'=>'COD', 'CC'=>'CC', 'CHK'=>'CHK', 'N10'=>'N10', 'N30'=>'N30'),array('onChange'=>'checkOption(this)')); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>
</td>
</tr>
       <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'cod_charges'); ?>
		<?php echo $form->textField($model,'cod_charges',array()); ?>
		<?php echo $form->error($model,'cod_charges'); ?>
	</div>
	</td></tr>
    <tr>
    <td>

	<div class="row">
		<?php //echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->hiddenField($model,'customer_id'); ?>
		<?php echo $form->error($model,'customer_id'); ?>
			<?php //echo $form->labelEx($model,'sow_boar_id'); ?>

			<?php echo $form->labelEx($model,'ordered_date'); ?>
		<?php //echo $form->textField($model,'ordered_date');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			  		'model' => $model,
			  		'attribute' => 'ordered_date',
			  		'options' =>array(
			  				'dateFormat'=>'m/d/yy',
							'constrainInput'=> false,
							'showOn'=>'button',
							'defaultDate'=>''.$datedefault.'',
							'buttonImage'=>'img/calendar.gif',
			  		),

			  		'htmlOptions' => array(
			  				'id'=>'ordered_date',
			  				'size' => '20',         // textField size
			  				'maxlength' => '20',    // textField maxlength
							'value'=>$datedefault,

			  		),
			  ));
		?>
		<?php echo $form->error($model,'ordered_date'); ?>
		<span id="day"></span>
	</div>
</td>
</tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_date'); ?>
		<?php //echo $form->textField($model,'ship_date');
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			  		'model' => $model,
			  		'attribute' => 'ship_date',
			  		'options' =>array(
			  				'dateFormat'=>'m/d/yy',
							'constrainInput'=> false,
							'showOn'=>'button',
							//'defaultDate'=>''.$datedefault.'',
							'buttonImage'=>'img/calendar.gif',
			  		),

			  		'htmlOptions' => array(
			  				'id'=>'ship_date',
			  				'size' => '20',         // textField size
			  				'maxlength' => '20',    // textField maxlength
							'value'=>$dateShip,
			  		),
			  ));?>
		<?php echo $form->error($model,'ship_date'); ?>
	</div>
	</td>
	</tr>
	    <tr>
    <td>

	<div class="row">
		<?php echo $form->hiddenField($model,'sow_boar_id'); ?>
		<?php echo $form->error($model,'sow_boar_id'); ?>
		<?php if($hogtag == 'T') {?>
		<label>Sow Ear Tag </label>
			<input type="text" name="ear_tag" id="ear_tag">
		<?php }else{ ?>
		<label>Sow Ear Notch</label>
			<input type="text" name="ear_notch" id="ear_notch">
		<?php }?>
		<span id="sow_boar_name"></span>
		<span id="sow_boar_reg"></span>
	</div>
</td>
</tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'doses'); ?>
		<?php echo $form->textField($model,'doses'); ?>
		<?php echo $form->error($model,'doses'); ?>
	</div>
</td>
</tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'price_dose'); ?>
		<?php echo $form->textField($model,'price_dose'); ?>
		<?php echo $form->error($model,'price_dose'); ?>
	</div>
	</td>
	<td>	<div class="row">
		<?php echo $form->labelEx($model,'semen_type'); ?>
		<?php echo $form->textField($model,'semen_type',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkSemenType(this.value);')); ?>
		<?php echo $form->error($model,'semen_type'); ?>
		<input name="semen_id" id="semen_id" value="" type="hidden" />
	</div>
	</td>
	</tr>
	    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'shipping_cost'); ?>
		<?php echo $form->textField($model,'shipping_cost'); ?>
		<?php echo $form->error($model,'shipping_cost'); ?>
	</div>
</td>
<td><div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model,'misc'); ?>
		<?php echo $form->error($model,'misc'); ?>
	</div></td>
</tr>

    <tr>
    <td colspan="2">

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>
</td>
</tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'onstandby'); ?>
		<?php echo $form->textField($model,'onstandby',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'onstandby'); ?>
	</div>
	</td>
	</tr>

   <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
		<?php echo $form->error($model,'invoice'); ?>
	</div>
</td></tr>

  </table>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
  <div class="row buttons">
		<?php echo CHtml::Button('List Orders',array('onClick'=>'window.location="index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & Duplicate' : 'Save & Duplicate',array('id'=>'savenew','name'=>'savedup')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go"')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->