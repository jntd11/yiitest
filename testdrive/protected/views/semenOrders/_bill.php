<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bill-print-form',
	'enableAjaxValidation'=>false,
));

$payArray = array(
	"CC"=>"Credit Card",
	"COD"=>"COD",
	"CHK "=>"Check",
	"N10"=>"Net 10 Days",
	"N30"=>"Net 30 Days",
		
)
?>
<h3>Bill of Sale for: <?php echo $modelCustomer->first_name." ".$modelCustomer->last_name; ?></h3>
	<?php 
	if(count($results) > 0) {
		 ?>
		<div >
		<div class="grid-view" id="container">
		<table  class="items">
		     <tr>
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
		     	foreach($results as $key=>$resultrow){
		     		$count++;
			 ?>
			 	<tr class="even" >
			 	<td colspan="11" align="center" >
			 	<input id="<?php echo "head_".$count; ?>_date" value="<?php echo $key;?>" type="hidden" />
			 	<input id="<?php echo "head_".$count; ?>_header" value="1" type="hidden"/>
			 	</td></tr>
			 <?php
					$modelSowBoar=SowBoar::model()->findByPk($resultrow['sow_boar_id']);
					$modelSowBoar->ear_notch = SemenOrdersController::calculateYear($modelSowBoar->ear_notch,2);
			 ?>
			 <tr class="odd" >
		     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_id" value="<?php echo $resultrow['semen_orders_id'];?>" type="hidden"/>
		     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_date" value="<?php echo $key;?>" type="hidden"/>
		     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_header" value="0" type="hidden"/>
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
		     ?>
		     <tr><td colspan="10" style="text-align: center; border-bottom: 2px solid;"></td></tr>
		</table>
		<?php }?>
<?php echo $form->errorSummary($model);
		if($model->isNewRecord)
  			echo '<input id="isnew" value="1" name="isnew" type="hidden"/>';
		else
			echo '<input id="isnew" value="0" name="isnew" type="hidden"/>';
	?>
<table >
	<tr >	
	    <th  style="text-align: left" width="20%">Description</th>
	    <th  style="text-align: left" width="20%">Quantity</th>
	    <th  style="text-align: left" width="20%">Price</th>
	    <th  style="text-align: left" width="20%">Total</th>
	 </tr>
	 
<?php 
	for($i=1;$i <= 5; $i++) { 
?>
	<tr >
	    <td >
		<div class="row">
			<input type="text" name="Bill[<?php echo $i; ?>][description]" id="description_<?php echo $i; ?>" size="70" 
			value="<?php echo isset($modelBill[$i]['description'])?$modelBill[$i]['description']:''; ?>"/>
		</div>
	    </td>
	    <td >
		<div class="row">
		<input type="hidden" name="Bill[<?php echo $i; ?>][date_ship]"  id="d_<?php echo $i; ?>"  value="<?php echo $_GET['d']; ?>" />
	 <input type="hidden" name="Bill[<?php echo $i; ?>][customer_id]"  id="id_<?php echo $i; ?>"  value="<?php echo $model->customer_id; ?>"  />
			<input type="text" name="Bill[<?php echo $i; ?>][quantity]"  id="quantity_<?php echo $i; ?>" size="10"  value="<?php echo isset($modelBill[$i]['quantity'])?$modelBill[$i]['quantity']:''; ?>"/>
		</div>
	    </td>
	    <td >
		<div class="row">
			<input type="text" name="Bill[<?php echo $i; ?>][price]" id="price_<?php echo $i; ?>" onBlur="fill(<?php echo $i; ?>);" size="10" 
			value="<?php echo isset($modelBill[$i]['price'])?$modelBill[$i]['price']:''; ?>"/>
		</div>
	    </td>
	    <td >
		<div class="row">
			<input type="text" name="Bill[<?php echo $i; ?>][total]" id="total_<?php echo $i; ?>" size="10" 
			value="<?php echo isset($modelBill[$i]['total'])?$modelBill[$i]['total']:''; ?>"/>
		</div>
	    </td>
    </tr>
<?php
	} 
	
?>

<tr><td>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
	</td>
	<td>
	<?php
	$this->widget('ext.mPrint.mPrint', array(
			'title' => ' ',          //the title of the document. Defaults to the HTML title
			'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
			'text' => 'Print Customer Copy',   //text which will appear beside the print icon. Defaults to NULL
			'element' => '#print1',        //the element to be printed.
			'exceptions' => array(       //the element/s which will be ignored
					'.merchant',
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
	</td>
	<td>
	<?php
	$this->widget('ext.mPrint.mPrint', array(
			'title' => ' ',          //the title of the document. Defaults to the HTML title
			'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
			'text' => 'Print Merchant Copy',   //text which will appear beside the print icon. Defaults to NULL
			'element' => '#print',        //the element to be printed.
			'exceptions' => array(       //the element/s which will be ignored
					'.customer',
					'.search-form'
			),
			//'cssFile'=>'styles.css',
			'publishCss' => true,       //publish the CSS for the whole page?
			'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
			'alt' => 'print',       //text which will appear if image can't be loaded
			'debug' => false,            //enable the debugger to see what you will get
			'id' => 'print-div2'         //id of the print link
	));
	?>
	</td>
	</tr>
</table>	
<?php $this->endWidget(); ?>

	<div id="print">
		<div class="rightElement " >
				  <p>Invoice #: <?php echo $modelBos->invoice_no; ?><br>
				  Date: <?php echo date("m/d/Y") ?><br>
			      <span class="">Merchant Copy</span></p> 
		</div>
		<div class="leftElement">
				  <?php echo $modelBos->header; ?> 
		</div>
		<table width="100%">
		<tr>
			<td width="40%" ><?php
				echo "<b>BILL TO</b>" ."<br>";
				if($modelCustomer->company_name != "")
					echo $modelCustomer->company_name."<br>";
				echo $modelCustomer->first_name." " .$modelCustomer->last_name."<br>";
				echo $modelCustomer->address1."<br>";
				if($modelCustomer->address2 != "")
					echo $modelCustomer->address2."<br>";
				echo $modelCustomer->city." ".$modelCustomer->state." ".$modelCustomer->zip."<br>";
				
				
				?></td>
			<td width="10%">&nbsp;</td>
			<td width="40%" >
			<?php
				echo "<b>SHIP TO</b>" ."<br>";
				if($modelCustomer->ship_company_name != "")
					echo $modelCustomer->ship_company_name."<br>";
				echo $modelCustomer->ship_name."<br>";
				if($modelCustomer->ship_address1 != "") {
					echo $modelCustomer->ship_address1."<br>";
					if($modelCustomer->ship_address2 != "")
						echo $modelCustomer->ship_address2."<br>";
					echo $modelCustomer->ship_city." ".$modelCustomer->ship_state." ".$modelCustomer->ship_zip."<br>";
				}else{
					echo $modelCustomer->address1."<br>";
					if($modelCustomer->address2 != "")
						echo $modelCustomer->address2."<br>";
					echo $modelCustomer->city." ".$modelCustomer->state." ".$modelCustomer->zip."<br>";
		
				}
				
				
				?>
			</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>		
		</table>
		<div class="leftElement"><?php echo "<b>PHONE # </b>".$modelCustomer->phone_home." <b>HERDMARK </b>".$modelCustomer->herdmark; ?></div>	
	<table width="100%">
		<tr >	
		    <th class="borderbottom" style="text-align: left" width="20%">TERMS</th>
		    <th class="borderbottom" style="text-align: left" width="20%">SHIP</th>
		    <th class="borderbottom" style="text-align: left" width="20%">CREDIT CARD #</th>
		    <th class="borderbottom" style="text-align: left" width="20%">TYPE/EXP DATE</th>
		 </tr>
		 <tr class="borderbottom">	
		    <td  style="text-align: left" width="20%"><?php echo $payArray[$model->payment_type]; ?></td>
		    <td  style="text-align: left" width="20%"><?php echo $model->ship_date; ?></td>
		    <td  style="text-align: left" width="20%"><?php if($model->payment_type == "CC") echo $modelCustomer->cc_number; ?></td>
		    <td  style="text-align: left" width="20%"><?php echo $modelCustomer->cc_brand." ".$modelCustomer->cc_expiration; ?></td>
		 </tr>
	</table>
	
	<?php 
if(count($results) > 0) {
	 ?>
	<table  class="items">
	     <tr>
	     	<th  class="borderbottom" style="text-align: left" width="20%">Boar</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Tag</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Doses</th>
	     	<th class="borderbottom"  style="text-align: left" width="5%">Ordered</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Ship </th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">$/Dose</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">SH</th>
	     	<th  class="borderbottom" style="text-align: left" width="10%">Misc $</th>
	     	<th   class="borderbottom" style="text-align: left" width="10%">COD $</th>
	     	<th  class="borderbottom" style="text-align: left" width="10%">StandBy</th>
	     	</tr>
	     <?php
	     	$count = 0;
	     	foreach($results as $key=>$resultrow){
	     		$count++;
		 ?>
		 	<tr class="even" >
		 	<td colspan="11" align="center" >
		 	<input id="<?php echo "head_".$count; ?>_date" value="<?php echo $key;?>" type="hidden" />
		 	<input id="<?php echo "head_".$count; ?>_header" value="1" type="hidden"/>
		 	</td></tr>
		 <?php
				$modelSowBoar=SowBoar::model()->findByPk($resultrow['sow_boar_id']);
				$modelSowBoar->ear_notch = SemenOrdersController::calculateYear($modelSowBoar->ear_notch,2);
		 ?>
		 <tr class="odd" >
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_id" value="<?php echo $resultrow['semen_orders_id'];?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_date" value="<?php echo $key;?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_header" value="0" type="hidden"/>
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
	     ?>
	     <tr><td colspan="10" style="text-align: center; border-bottom: 2px solid;"></td></tr>
	</table>
	<?php }?>
	<table width="100%">
		<tr class="borderbottom">	
		    
		    <th class="borderbottom"  style="text-align: left" width="10%">Quantity</th>
		    <th class="borderbottom" style="text-align: left" width="60%">Description</th>
		    <th class="borderbottom" style="text-align: left" width="10%">Price</th>
		    <th class="borderbottom"  style="text-align: Right" width="20%">Total</th>
		 </tr>
	<?php 
		$total = 0; 
		for($i=1;$i <= 5; $i++) { 	
			$total += isset($modelBill[$i]['total'])?$modelBill[$i]['total']:0;
	?>
		<tr >
		   
		    <td >
			<div class="row">
				<?php echo isset($modelBill[$i]['quantity'])?$modelBill[$i]['quantity']:''; ?>
			</div>
		    </td>
		     <td >
			<div class="row">
				<?php echo isset($modelBill[$i]['description'])?$modelBill[$i]['description']:''; ?>
			</div>
		    </td>
		    <td >
			<div class="row" style="text-align: Right">
				<?php (isset($modelBill[$i]['price']) && $modelBill[$i]['price'])?printf("%.2f",$modelBill[$i]['price']):''; ?>
			</div>
		    </td>
		    <td style="text-align: Right">
			<div class="row">
				<?php (isset($modelBill[$i]['total'])  && $modelBill[$i]['total'])?printf("$%.2f",$modelBill[$i]['total']):''; ?>
			</div>
		    </td>
	    </tr>
	<?php
		} 
	?>
	<?php 
		for($i=1;$i <= 10; $i++) { 
	?>
			<tr ><td   colspan="4">&nbsp;</td></tr>
	<?php }?>
	<tr ><th  class="borderbottom"  colspan="2">Thank you for your business.</th><th class="borderbottom" >Total</th><th class="borderbottom" style="text-align: Right" >
		<?php printf("$%.2f",$total);?></th></tr>
	<tr id="footer1"><td></td><td colspan="2" ><?php echo $modelBos->footer;?></p></td><td></td></tr>
	</table>
	
	</div>
	
	<div id="print1">
		<div class="rightElement " >
				  <p>Invoice #: <?php echo $modelBos->invoice_no; ?><br>
				  Date: <?php echo date("m/d/Y") ?><br>
			      <span class="">Customer Copy</span></p> 
		</div>
		
		<div class="leftElement">
				  <?php echo $modelBos->header; ?>
		</div>
		<table width="100%">
		<tr>
			<td width="40%" ><?php
				echo "<b>BILL TO</b>" ."<br>";
				if($modelCustomer->company_name != "")
					echo $modelCustomer->company_name."<br>";
				echo $modelCustomer->first_name." " .$modelCustomer->last_name."<br>";
				echo $modelCustomer->address1."<br>";
				if($modelCustomer->address2 != "")
					echo $modelCustomer->address2."<br>";
				echo $modelCustomer->city." ".$modelCustomer->state." ".$modelCustomer->zip."<br>";
				
				
				?></td>
			<td width="10%">&nbsp;</td>
			<td width="40%" >
			<?php
				echo "<b>SHIP TO</b>" ."<br>";
				if($modelCustomer->ship_company_name != "")
					echo $modelCustomer->ship_company_name."<br>";
				echo $modelCustomer->ship_name."<br>";
				if($modelCustomer->ship_address1 != "") {
					echo $modelCustomer->ship_address1."<br>";
					if($modelCustomer->ship_address2 != "")
						echo $modelCustomer->ship_address2."<br>";
					echo $modelCustomer->ship_city." ".$modelCustomer->ship_state." ".$modelCustomer->ship_zip."<br>";
				}else{
					echo $modelCustomer->address1."<br>";
					if($modelCustomer->address2 != "")
						echo $modelCustomer->address2."<br>";
					echo $modelCustomer->city." ".$modelCustomer->state." ".$modelCustomer->zip."<br>";
				
				}
				
				
				
				?>
			</td>
		</tr>
		 <tr><td colspan="2">&nbsp;</td></tr>
		</table>
		<div class="leftElement"><?php echo "<b>PHONE # </b>".$modelCustomer->phone_home." <b>HERDMARK </b>".$modelCustomer->herdmark; ?></div>	
	<table width="100%">
		<tr >	
		    <th class="borderbottom" style="text-align: left" width="20%">TERMS</th>
		    <th class="borderbottom" style="text-align: left" width="20%">SHIP</th>
		    <th class="borderbottom" style="text-align: left" width="20%">CREDIT CARD #</th>
		    <th class="borderbottom" style="text-align: left" width="20%">TYPE/EXP DATE</th>
		 </tr>
		 <tr class="borderbottom">	
		    <td  style="text-align: left" width="20%"><?php echo $payArray[$model->payment_type]; ?></td>
		    <td  style="text-align: left" width="20%"><?php echo $model->ship_date; ?></td>
		    <td  style="text-align: left" width="20%"><?php if($model->payment_type == "CC") echo preg_replace("/.*([0-9][0-9][0-9][0-9])$/","************$1",$modelCustomer->cc_number); ?></td>
		    <td  style="text-align: left" width="20%"><?php echo $modelCustomer->cc_expiration; ?></td>
		 </tr>
	</table>
	<?php 
if(count($results) > 0) {
	 ?>
	<table  class="items">
	     <tr>
	     	<th  class="borderbottom" style="text-align: left" width="20%">Boar</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Tag</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Doses</th>
	     	<th class="borderbottom"  style="text-align: left" width="5%">Ordered</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">Ship </th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">$/Dose</th>
	     	<th  class="borderbottom" style="text-align: left" width="5%">SH</th>
	     	<th  class="borderbottom" style="text-align: left" width="10%">Misc $</th>
	     	<th   class="borderbottom" style="text-align: left" width="10%">COD $</th>
	     	<th  class="borderbottom" style="text-align: left" width="10%">StandBy</th>
	     	</tr>
	     <?php
	     	$count = 0;
	     	foreach($results as $key=>$resultrow){
	     		$count++;
		 ?>
		 	<tr class="even" >
		 	<td colspan="11" align="center" >
		 	<input id="<?php echo "head_".$count; ?>_date" value="<?php echo $key;?>" type="hidden" />
		 	<input id="<?php echo "head_".$count; ?>_header" value="1" type="hidden"/>
		 	</td></tr>
		 <?php
				$modelSowBoar=SowBoar::model()->findByPk($resultrow['sow_boar_id']);
				$modelSowBoar->ear_notch = SemenOrdersController::calculateYear($modelSowBoar->ear_notch,2);
		 ?>
		 <tr class="odd" >
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_id" value="<?php echo $resultrow['semen_orders_id'];?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_date" value="<?php echo $key;?>" type="hidden"/>
	     	<input id="<?php echo $resultrow['semen_orders_id']; ?>_header" value="0" type="hidden"/>
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
	     ?>
	     	     <tr><td colspan="10" style="text-align: center; border-bottom: 2px solid;"></td></tr>
	</table>
	<?php }?>
	<table width="100%">
		<tr class="borderbottom">	
			<th class="borderbottom"  style="text-align: left" width="10%">Quantity</th>
		    <th class="borderbottom" style="text-align: left" width="60%">Description</th>
		    
		    <th class="borderbottom" style="text-align: left" width="10%">Price</th>
		    <th class="borderbottom"  style="text-align: right" width="20%">Total</th>
		 </tr>
	<?php 
		$total = 0; 
		for($i=1;$i <= 5; $i++) { 	
			$total += isset($modelBill[$i]['total'])?$modelBill[$i]['total']:0;
	?>
		<tr >
			 <td >
			<div class="row">
				<?php echo isset($modelBill[$i]['quantity'])?$modelBill[$i]['quantity']:''; ?>
			</div>
		    </td>
		    <td >
			<div class="row">
				<?php echo isset($modelBill[$i]['description'])?$modelBill[$i]['description']:''; ?>
			</div>
		    </td>
		   
		    <td >
			<div class="row" style="text-align: Right">
				<?php (isset($modelBill[$i]['price'])  && $modelBill[$i]['total'])?printf("%.2f",$modelBill[$i]['price']):''; ?>
			</div>
		    </td>
		    <td >
			<div class="row" style="text-align: Right">
				<?php (isset($modelBill[$i]['total']) && $modelBill[$i]['total'])?printf("$%.2f",$modelBill[$i]['total']):''; ?>
			</div>
		    </td>
	    </tr>
	<?php
		} 
	?>
	<?php 
		for($i=1;$i <= 10; $i++) { 
	?>
			<tr ><td   colspan="4">&nbsp;</td></tr>
	<?php }?>
	<tr ><th  class="borderbottom"  colspan="2">Thank you for your business.</th><th class="borderbottom" >Total</th>
	<th class="borderbottom" style="text-align: Right" ><?php printf("$%.2f",$total);?></th></tr>
	<tr id="footer1"><td></td><td colspan="2" ><?php echo $modelBos->footer;?></td><td></td></tr>
	</table>
	
	</div>
</div>
</div>
</div>
<style>
<!--
#print, #print1{
	display: none;
}
.borderbottom{
	border-bottom: solid 2px;
}

-->
</style>
