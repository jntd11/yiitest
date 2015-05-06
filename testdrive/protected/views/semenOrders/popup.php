<?php
echo '<div id="committed_results">aa<table class="items" >
<thead><tr>
<th>Boar Ear Notch</th>
<th>Ear Tag</th>
<th>Committed</th>
<th>Stand By</th>
<th>Ship Date</th>
</tr></thead>';
echo '<tbody>';
foreach($rows as $key=>$row) {
	$modelSowBoar=SowBoar::model()->findByPk($row['sow_boar_id']);
	if(isset($modelSowBoar->ear_notch))
		$modelSowBoar->ear_notch = SemenOrdersController::calculateYear($modelSowBoar->ear_notch,2);
	$rows[$key]['ear_notch']=$modelSowBoar->ear_notch;
	$rows[$key]['ear_tag']=$modelSowBoar->ear_tag;
	$ret=$this->GetComitStandby($row['sow_boar_id'],$row['ship_date']);
	$rows[$key]['standby']=$ret['standby'];
	$rows[$key]['commited']=$ret['commited'];
	echo '<tr class="odd"><td>'.$rows[$key]['ear_notch'].'</td>
	<td>'.$rows[$key]['ear_tag'].'</td>
	<td>'.$rows[$key]['standby'].'</td>
	<td>'.$rows[$key]['commited'].'</td>
	<td>'.$rows[$key]['ship_date'].'</td>
	</tr>';
}
echo '</tbody></table></div>';
$this->widget('ext.mPrint.mPrint', array(
		'title' => 'Boars Committed',          //the title of the document. Defaults to the HTML title
		'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
		'text' => 'Print Results',   //text which will appear beside the print icon. Defaults to NULL
		'element' => '#div_committed_results',        //the element to be printed.
		'exceptions' => array(       //the element/s which will be ignored
		),
		'publishCss' => true,
		'cssFile'=>'styles.css',
		'publishCss' => true,       //publish the CSS for the whole page?
		'visible' => true,  //should this be visible to the current user?
		'alt' => 'print',       //text which will appear if image can't be loaded
		'debug' => true,            //enable the debugger to see what you will get
		'id' => 'print-div1'         //id of the print link
));
exit;

?>