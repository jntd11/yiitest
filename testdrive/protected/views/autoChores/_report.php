<?php
/* @var $this ChoresController */
/* @var $model Chores */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");
$from_date = (isset($_POST['from_date']))?$_POST['from_date']:$activitydate;
$to_date = (isset($_POST['to_date']))?$_POST['to_date']:$activitydate;
$farm = (isset($_POST['farm']))?$_POST['farm']:$farmHerd;
?>

<div class="form">

<?php
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'autoChores_frm',
			'enableAjaxValidation'=>false,
	));
?>
	<div class="row">
		<?php echo "From Date"; ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'from_date',
				//'attribute' => 'fr',
				'value'=>''.$from_date.'',
				'options' =>array(
						//'dateFormat'=>'dd/mm/yyyy',
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.$activitydate.'',
						'buttonImage'=>'img/calendar.gif',

						),
				'htmlOptions' => array(
						'id'=>'from_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'value'=>$from_date,

				),
		));
		?>
		<?php echo "To Date"; ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'to_date',
				//'attribute' => 'fr',
				'value'=>''.$to_date.'',
				'options' =>array(
						//'dateFormat'=>'dd/mm/yyyy',
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.$activitydate.'',
						'buttonImage'=>'img/calendar.gif',
						),
				'htmlOptions' => array(
						'id'=>'to_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
				),
		));
	  ?>
	 <?php echo "Farm & Herd"; ?>
		&nbsp;
    <?php
       echo CHtml::TextField('farm',$farm,array('onkeyup'=>'caps(this);'));
    ?>
    &nbsp;
    <?php
	echo CHtml::submitButton('Go',array('onClick'=>'','name'=>'go'));
	/* echo CHtml::ajaxSubmitButton("print","",
 	  array('success' => 'function(data) {
 	                  var myWindow = window.open("","MsgWindow","width=600,height=600");
                      myWindow.document.write(data);
 	                  myWindow.print();
              }')
	  ); */
	$this->endWidget();
	if(count($model->errors) > 0){
		echo '<div class="errorSummary">';
		echo "<ul>";
		foreach ($model->errors as $errors){
			echo "<li>".$errors[0]."</li>";
		}
		echo "</ul>";
		echo "</div>";

	}

?>
	</div>
	<?php


	 if(count($results) > 0) {
	//print_r($results); ?>
	<div id="print">
	<div class="grid-view" id="container">
	<table  class="items" style="width: 100%">
	     <tr>
	        <td><?php echo "From Date: <b> $from_date </b>"; ?></td>
	        <td><?php echo "To Date: <b> $to_date </b>"; ?></td>
	        <td><?php echo "Farm & Herd: <b> $farm </b>";  ?></td>
	     </tr>
	     <tr>
	     	<th width="30%" style="text-align: left">Description</th>
	     	<th  width="30%" style="text-align: left">Farm &amp; Herd</th>
	     	<th  width="30%" style="text-align: left">Comments</th>
	     </tr>
	     <?php
	     	foreach($results as $key=>$result){
		 ?>
		 	<tr class="even hasmenu"><td colspan="3" align="center" style="text-align: center; border-bottom: 2px solid;"><?php echo $key." ".date("l",strtotime($key)); ?></td></tr>
		 <?php
			foreach ($result as $keyrow=>$resultrow){
		 ?>
		 <tr class="odd hasmenu">
	     	<td><?php echo $resultrow['description']; ?></td>
	     	<td><?php echo $resultrow['farm_herd']; ?></td>
	     	<td><?php echo $resultrow['comments']; ?></td>
	     </tr>
		 <?php
			 }
			}
	     ?>
	</table>
	<?php }?>

	</div>

	</div>
	<?php
	if(count($results))
$this->widget('ext.mPrint.mPrint', array(
  'title' => 'Chores Report',          //the title of the document. Defaults to the HTML title
  'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
  'text' => 'Print Results',   //text which will appear beside the print icon. Defaults to NULL
  'element' => '#print',        //the element to be printed.
  'exceptions' => array(       //the element/s which will be ignored
    '.summary',
    '.search-form'
  ),
  //'cssFile'=>'styles.css',
  'publishCss' => true,       //publish the CSS for the whole page?
  'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
  'alt' => 'print',       //text which will appear if image can't be loaded
  'debug' => false,            //enable the debugger to see what you will get
  'id' => 'print-div1'         //id of the print link
));
?>


</div><!-- form -->