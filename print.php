<?php
$output = '';
$output .= '<table width="100%" border="1" cellpadding="4" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	To,<br />
	<b>RECEIVER (BILL TO)</b><br />
	Name : '.$_POST['companyName'].'<br /> 
	Billing Address : '.$_POST['address'].'<br />
	</td>
	<td width="35%">         
	
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="4" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Item Name</th>
	<th align="left">Quantity</th>
	<th align="left">Price</th>
	<th align="left">Tax</th>
	<th align="left">Line Total.</th> 
	</tr>';
$count = 0;   
for ($i = 0; $i < count($_POST['productName']); $i++) { 
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$_POST['productName'][$i].'</td>
	<td align="left">'.$_POST['quantity'][$i].'</td>
	<td align="left">'.$_POST['price'][$i].'</td>
	<td align="left">'.$_POST['tax'][$i].'</td>
	<td align="left">'.$_POST['total'][$i].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Subtotal without tax:</b></td>
	<td align="left"><b>'.$_POST['subTotal'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Taxtotal:</td>
	<td align="left">'.$_POST['taxRate'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Tax Amount: </td>
	<td align="left">'.$_POST['taxAmount'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Subtotal with tax:</b> </td>
	<td align="left"><b>'.$_POST['totalAftertax'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5">Discount:</td>
	<td align="left">'.$_POST['discount'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Final Total:</b></td>
	<td align="left"><b>'.$_POST['finaltotal'].'</b></td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
$FileName = $_POST['companyName'].'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($FileName, array("Attachment" => false));
?>   
   