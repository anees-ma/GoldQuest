<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2009-09-30
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @copyright 2004-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @since 2008-03-04
 */

// require_once('../config/lang/eng.php');
require_once('TCPDF/tcpdf.php');

// mysql connection
$con = mysql_connect("localhost","farmocar_farmo");
  if(!$con)
	  {
	  die(mysql_error());
	  }
	
// get data from users table
mysql_select_db("farmocar_cart");
$result = mysql_query("SELECT * FROM shops ");

while($row = mysql_fetch_array($result))
  {
    $fname = $row['shop_name'];
// 	$lname = $row['lastname'];
// 	$address = $row['address'];
// 	$country = $row['country'];
// 	$email = $row['email'];
  }

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetPrintHeader(false); $pdf->SetPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$htmlcontent =
"<html>
<body>
    <table width='500' border='0' align='center' cellpadding='5' cellspacing='0'>
      <tr>
        <td width='165'>Extreme Customs Pty. Ltd.</td>
        <td width='165'>TAX INVOICE</td>
        <td width='165' align='left'><?php echo date('M-d-Y'); ?></td>
      </tr>
      <tr>
        <td width='165'>Order No:</td>
        <td width='335' colspan='2'>58972</td>
      </tr>
	  <tr>
	    <td width='500' colspan='3'>&nbsp;</td>
	  </tr>	
	  <tr>
	    <td width='165'>CUSTOMER:</td>
        <td width='335' colspan='2'><?php echo '$fname $lname'; ?></td>
	  </tr>
	  <tr>
        <td width='165'>&nbsp;</td>
        <td width='335' colspan='2'><?php echo '$address'; ?></td>
	  </tr>
	  <tr>
        <td width='165'>&nbsp;</td>
        <td width='335' colspan='2'><?php echo '$country'; ?></td>
	  </tr>
	  <tr>
	    <td width='500' colspan='3'>&nbsp;</td>
	  </tr>	
	  <tr>
	    <td width='165'>Product</td>
	    <td width='165'>Qty</td>
	    <td width='165'>Total</td>
	  </tr>
	</table>
</body>
</html>";

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// test some inline CSS
$inlinecss = '<p>This is just an example of html code to demonstrate some supported CSS inline styles.
<span style="font-weight: bold;">bold text</span>
<span style="text-decoration: line-through;">line-trough</span>
<span style="text-decoration: underline line-through;">underline and line-trough</span>
<span style="color: rgb(0, 128, 64);">color</span>
<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background color</span>
<span style="font-weight: bold;">bold</span>
<span style="font-size: xx-small;">xx-small</span>
<span style="font-size: x-small;">x-small</span>
<span style="font-size: small;">small</span>
<span style="font-size: medium;">medium</span>
<span style="font-size: large;">large</span>
<span style="font-size: x-large;">x-large</span>
<span style="font-size: xx-large;">xx-large</span>
</p>';

$pdf->writeHTML($inlinecss, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>