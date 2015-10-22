<?php
/* @var $this ChoresController */
/* @var $model Chores */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");
$from_date = (isset($_GET['from_date']))?$_GET['from_date']:date("m/d/Y");
$to_date = (isset($_GET['to_date']))?$_GET['to_date']:date("m/d/Y",strtotime("+1 day"));
$standby = (isset($_GET['standby']))?$_GET['standby']:"N";
Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date',$from_date,array('expire'=>time()+(365*24*60*60)));
Yii::app()->request->cookies['to_date'] =  new CHttpCookie('to_date',$to_date,array('expire'=>time()+(365*24*60*60)));


?>

<div class="form">

<?php
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'autoChores_frm',
			'enableAjaxValidation'=>false,
			'method'=>'get',
			'action'=>'index.php?r=SemenOrders/report',
	));
?>
	<div class="row">
		<?php echo "From Date"; ?>
		<input type="text" id="from_date" name="from_date" value="<?php echo $from_date; ?>" size="20" maxlength="20"/>
		<?php echo "To Date"; ?>
		<input type="text" id="to_date" name="to_date" value="<?php echo $to_date; ?>" size="20" maxlength="20"/>
		<?php

		/* $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'from_date',
				//'attribute' => 'fr',
				'value'=>''.$from_date.'',
				'options' =>array(
						//'dateFormat'=>'dd/mm/yyyy',
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.date("m/d/Y").'',
						'buttonImage'=>'img/calendar.gif',

						),
				'htmlOptions' => array(
						'id'=>'from_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'value'=>$from_date,

				),
		)); */
		?>

		<?php
		/* $this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
		)); */
	  ?>
	 <?php echo "Standby Only"; ?>
		&nbsp;
    <?php
       $cheched = "";
       if($standby == "Y")
       		$cheched = "checked";
       echo '<input name="standby" type="checkbox" '.$cheched .'/ value="Y">';
    ?>
    &nbsp;
    <?php
	echo CHtml::submitButton('Go',array('onClick'=>'','name'=>'go','id'=>'go'));
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
	<table  class="items">
	     <tr>
	        <td colspan="4"><?php echo "From Date: <b> $from_date </b>"; ?></td>
	        <td colspan="3"><?php echo "To Date: <b> $to_date </b>"; ?></td>
	        <td colspan="4"><?php echo "Standby Only: <b> $standby </b>";  ?></td>
	     </tr>
	     <tr>
	     	<th  style="text-align: left" width="20%">Customer</th>
	     	<th   style="text-align: left" width="20%">Boar</th>
	     	<th   style="text-align: left" width="5%">Tag</th>
	     	<th   style="text-align: left" width="5%">Doses</th>
	     	<th   style="text-align: left" width="5%">Ordered</th>
	     	<th   style="text-align: left" width="5%">Ship </th>
	     	<th   style="text-align: left" width="5%">$/Dose</th>
	     	<th   style="text-align: left" width="5%">SH</th>
	     	<th   style="text-align: left" width="10%">Misc $</th>
	     	<th   style="text-align: left" width="10%">COD $</th>
	     	<th   style="text-align: left" width="10%">StandBy</th>
	     	</tr>
	     <?php
	     	$count = 0;
	     	foreach($results as $key=>$result){
	     		$count++;
		 ?>
		 	<tr class="even hasmenu" id="<?php echo "head_".$count ?>" onClick="window.location='index.php?r=SemenOrders/create&d=<?php echo $key;?>'">
		 	<td colspan="11" align="center" style="text-align: center; border-bottom: 2px solid;" >
		 	<input id="<?php echo "head_".$count; ?>_date" value="<?php echo $key;?>" type="hidden" />
		 	<input id="<?php echo "head_".$count; ?>_header" value="1" type="hidden"/>
		 	<?php echo $key." ".date("l",strtotime($key)); ?></td></tr>
		 <?php
			foreach ($result as $keyrow=>$resultrow){
				$modelCustomer=TblCustomerEntry::model()->findByPk($resultrow['customer_id']);
				$modelSowBoar=SowBoar::model()->findByPk($resultrow['sow_boar_id']);
				$modelSowBoar->ear_notch = SemenOrdersController::calculateYear($modelSowBoar->ear_notch,2);
		 ?>
		 <tr class="odd hasmenu" id="<?php echo $resultrow['semen_orders_id'] ?>" onClick="window.location='index.php?r=SemenOrders/update&id=<?php echo $resultrow['semen_orders_id'] ?>'">
	     	<td>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_id" value="<?php echo $resultrow['semen_orders_id'];?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_date" value="<?php echo $key;?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_header" value="0" type="hidden"/>
	     	<?php echo $modelCustomer->first_name." ".$modelCustomer->last_name; ?></td>
	     	<td ><span class="print"><?php echo $modelSowBoar->ear_notch; ?></span></td>
	     	<td class="print"><?php echo $modelSowBoar->ear_tag; ?></td>
			<td class="rightElement"><?php echo $resultrow['doses']; ?></td>
	     	<td class="print"><?php echo $resultrow['ordered_date']; ?></td>
	     	<td class="print"><?php echo $resultrow['ship_date']; ?></td>
	     	<td class="rightElement"><?php echo round($resultrow['price_dose'],2); ?></td>
	     	<td class="rightElement"> <?php echo round($resultrow['shipping_cost'],2); ?></td>
	     	<td class="rightElement"><?php echo round($resultrow['misc'],2); ?></td>
	     	<td class="rightElement"><?php echo round($resultrow['cod_charges'],2); ?></td>
	     	<td id="<?php echo $resultrow['semen_orders_id']; ?>_standby"><?php echo ($resultrow['onstandby'] == "Y")?$resultrow['onstandby']:""; ?></td>
	     </tr>
		 <?php
			 }
			}
	     ?>
	</table>


	</div>

	</div>
	<?php }?>
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
		  'publishCss' => true,
		  'cssFile'=>'styles.css',
		  'publishCss' => true,       //publish the CSS for the whole page?
		  'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
		  'alt' => 'print',       //text which will appear if image can't be loaded
		  'debug' => true,            //enable the debugger to see what you will get
		  'id' => 'print-div1'         //id of the print link
		));
?>
</div><!-- form -->
