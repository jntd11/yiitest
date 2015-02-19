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
			'method'=>'get'
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
						'defaultDate'=>''.date("m/d/Y").'',
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
	 <?php echo "Standby Only"; ?>
		&nbsp;
    <?php
       echo CHtml::checkBox('standby',false,array('value' => 'Y'));
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
	<table  class="items" style="width: 100%">
	     <tr>
	        <td colspan="5"><?php echo "From Date: <b> $from_date </b>"; ?></td>
	        <td colspan="5"><?php echo "To Date: <b> $to_date </b>"; ?></td>
	        <td colspan="4"><?php echo "Standby Only: <b> $standby </b>";  ?></td>
	     </tr>
	     <tr>
	     	<th  style="text-align: left">Customer Id</th>
	     	<th   style="text-align: left">Sow Boar Id</th>
	     	<th   style="text-align: left">Ordered Date</th>
	     	<th   style="text-align: left">Ship Date</th>
	     	<th   style="text-align: left">Doses</th>
	     	<th   style="text-align: left">Price per Dose</th>
	     	<th   style="text-align: left">Shipping Cost</th>
	     	<th   style="text-align: left">Misc charges</th>
	     	<th   style="text-align: left">Comments</th>
	     	<th   style="text-align: left">On Standby</th>
	     	<th   style="text-align: left">Invoice #</th>
	     	<th   style="text-align: left">Semen type</th>
	     	<th   style="text-align: left">COD charges</th>
	     	<th   style="text-align: left">Payment type</th>
	     	</tr>
	     <?php
	     	$count = 0;
	     	foreach($results as $key=>$result){
	     		$count++;
		 ?>
		 	<tr class="even hasmenu" id="<?php echo "head_".$count ?>" onClick="window.location='index.php?r=SemenOrders/create'">
		 	<td colspan="14" align="center" style="text-align: center; border-bottom: 2px solid;" >
		 	<input id="<?php echo "head_".$count; ?>_date" value="<?php echo $key;?>" type="hidden" />
		 	<input id="<?php echo "head_".$count; ?>_header" value="1" type="hidden"/>
		 	<?php echo $key." ".date("l",strtotime($key)); ?></td></tr>
		 <?php
			foreach ($result as $keyrow=>$resultrow){
		 ?>
		 <tr class="odd hasmenu" id="<?php echo $resultrow['semen_orders_id'] ?>" onClick="window.location='index.php?r=SemenOrders/update&id=<?php echo $resultrow['semen_orders_id'] ?>'">
	     	<td>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_id" value="<?php echo $resultrow['semen_orders_id'];?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_date" value="<?php echo $key;?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_header" value="0" type="hidden"/>
	     	<?php echo $resultrow['customer_id']; ?></td>
	     	<td><?php echo $resultrow['sow_boar_id']; ?></td>
	     	<td><?php echo $resultrow['ordered_date']; ?></td>
	     	<td><?php echo $resultrow['ship_date']; ?></td>
	     	<td><?php echo $resultrow['doses']; ?></td>
	     	<td><?php echo $resultrow['price_dose']; ?></td>
	     	<td><?php echo $resultrow['shipping_cost']; ?></td>
	     	<td><?php echo $resultrow['misc']; ?></td>
	     	<td><?php echo $resultrow['comments']; ?></td>
	     	<td id="<?php echo $resultrow['semen_orders_id']; ?>_standby"><?php echo $resultrow['onstandby']; ?></td>
	     	<td><?php echo $resultrow['invoice']; ?></td>
	     	<td><?php echo $resultrow['semen_type']; ?></td>
	     	<td><?php echo $resultrow['cod_charges']; ?></td>
	     	<td><?php echo $resultrow['payment_type']; ?></td>
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
  //'cssFile'=>'styles.css',
  'publishCss' => true,       //publish the CSS for the whole page?
  'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
  'alt' => 'print',       //text which will appear if image can't be loaded
  'debug' => false,            //enable the debugger to see what you will get
  'id' => 'print-div1'         //id of the print link
));
?>


</div><!-- form -->