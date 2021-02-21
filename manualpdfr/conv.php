<?php 
include 'config.php';
extract($_POST);
//variables declaration
$client_uid='GQG-TATA-06';

$pdf_nme=$client_uid.'Invoice';
if(isset($submit)){
$pdf .='';
//logo and address
$pdf .='';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th>'.'<img style="width:200px" src="http://www.goldquestglobal.com/images/logo.png">'.'</th>';
$pdf .='<th></th>';
$pdf .='<th>'.'# 18, Krishna Summit, Shop No-303 "B"<br>3rd Floor, Marathahalli Outer Ring Road,<br>Bangalore, Karnataka - 560037 <br>Phone: +91-80-48663693'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';
 
//heading invoice copy
$pdf .='<div style="color:blue;text-align:center;font-weight:700;font-size:18px">INVOICE COPY';
$pdf .='</div>';

//address and goldquest table
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th>'.'GoldQuest Global HR Services Private Limited <br># 18, Krishna Summit, Shop No-303 "B"<br>3rd Floor, Marathahalli Outer Ring Road, <br>Bangalore, Karnataka - 560037<br>Phone: +91-80-48663693'.'</th>';

$pdf .='<th></th>';
$pdf .='<th>'.'GoldQuest GSTIN : 29AAHCG0129Q1Z6<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State : Karnataka<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAN Number : AAHCG0129Q <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State Code : 29 <br> Reverse Charge (Y/N) : N'.'</th>';

$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
$pdf .=' <div style="background-color:darkblue;color:white;font-weight:bold;font-size:16px">BILL TO';
$pdf .='</div>';
$pdf .='<br><br>';

//norwin technology address and gstin number
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th>'.'Attention : <br>M/s. Norwin Technologies (India) Pvt Ltd<br>No.92 , Z Square Building, <br>17th Main Road , 5th Block,<br>Jyoti Nivas College Rd,<br>Koramangala,Bengaluru,<br>Karnataka 560095'.'</th>';

$pdf .='<th></th>';
$pdf .='<th>'.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GSTIN : 29AAECN9570D1Z6<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State : Karnataka<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date : 01.02.2020 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Number:FY2019-20/133 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State Code : 29'.'</th>';

$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';
//product desc and sac table

$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Product</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">SAC Code</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">UoM</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Quantity</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Rate </th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Amt</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Discount</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Taxable value</th>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';
//invoice period for the month of jan2020 table data 

//gst and cgst details

$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold"></th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">CGST</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold"></th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">SGST</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold"></th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">IGST</th>';
$pdf .='<th style="background-color:darkblue;color:white;font-weight:bold">Total</th>';
$pdf .='</tr>';
$pdf .='<tr>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Rate</th>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Amount</th>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Rate</th>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Amount</th>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Rate</th>';
$pdf .='<th style="border:1px solid grey;font-weight:bold">Amount</th>';
$pdf .='</tr>';

$pdf .='<tr>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='<td>'.$shop_name.'';
$pdf .='</td>';
$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<br><br>';
$pdf .=' <div style="background-color:white;color:black;border:2px solid grey;">Total Invoice Amount in words : Fifteen Thousand Five Hundred & Seventy Six Rupees Only';
$pdf .='</div>';
//bank details table

$pdf .='<br><br>';
$pdf .='<table style="border 1px solid grey; width:50%">';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">GoldQuest Bank Details - NEFT / RTGS</th>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<table style="border:1px solid grey; width:50%">';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">Bank Name</th>';
$pdf .='<th style="border:1px solid grey; ">ICICI BANK LTD </th>';
$pdf .='</tr>';

$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">Bank A/c No </th>';
$pdf .='<th style="border:1px solid grey; ">058305004248 </th>';
$pdf .='</tr>';

$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">Bank Branch </th>';
$pdf .='<th style="border:1px solid grey; ">Marathahalli</th>';
$pdf .='</tr>';

$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">Bank IFSC  </th>';
$pdf .='<th style="border:1px solid grey; ">ICIC0001417</th>';
$pdf .='</tr>';

$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th style="border:1px solid grey; ">MICR </th>';
$pdf .='<th style="border:1px solid grey; ">560229040 </th>';
$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<br><br>';
$pdf .='<table style="border 1px solid grey; width:50%">';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Total Amount before Tax </th>';
$pdf .='<th style="border:1px solid grey; ">13200 </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Add : CGST </th>';
$pdf .='<th style="border:1px solid grey; ">1188 </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Add : SGST</th>';
$pdf .='<th style="border:1px solid grey; ">1188 </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Add : IGST</th>';
$pdf .='<th> </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Total Tax Amount</th>';
$pdf .='<th style="border:1px solid grey; ">2376 </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>Total Amount after Tax (R.off)</th>';
$pdf .='<th style="border:1px solid grey; ">1576 </th>';
$pdf .='</tr>';
$pdf .='<tr style="border:1px solid grey; width:50%">';
$pdf .='<th>GST on Reverse Charge</th>';
$pdf .='<th style="border:1px solid grey; ">N </th>';
$pdf .='</tr>';
$pdf .='</table>';
$pdf .='<br><br>';

//special notes table
$pdf .='<div style="background-color:white;color:black;border:2px solid grey;">SPECIAL NOTES AND INSTRUCTIONS';
$pdf .='</div>';
$pdf .='<div style="background-color:white;color:black;border:2px solid grey;">Make all your payment Cheques, RTGS/NEFT Payable to :"GOLDQUEST GLOBAL HR SERVICES PRIVATE LIMITED"
Payments received after due date shall be liable of interest @ 3% per month, part of month taken as full month.
In case of any enquiry concerning this Invoice, Please email us at accounts@goldquestglobal.com';
$pdf .='</div>';

$pdf .='<br>';
//signature



$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th></th>';
$pdf .='<th></th>';
$pdf .='<th>'.'<img style="width:100px";"align-items:right"; src="http://farmocart.com/newp/images/New%20Project.jpg" >'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';


$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th></th>';
$pdf .='<th></th>';
$pdf .='<th>'.'Authorised Signatory'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';

$pdf .='<br><br><br><br><br><br>';
//logo and address
$pdf .='';
$pdf .='<table>';
$pdf .='<tr>';
$pdf .='<th>'.'<img style="width:200px" src="http://www.goldquestglobal.com/images/logo.png">'.'</th>';
$pdf .='<th></th>';
$pdf .='<th>'.'# 18, Krishna Summit, Shop No-303 "B"<br>3rd Floor, Marathahalli Outer Ring Road,<br>Bangalore, Karnataka - 560037 <br>Phone: +91-80-48663693'.'</th>';
$pdf .='</tr>';
$pdf .='</table>';


$servqr=mysqli_query($con,"select * from clent_details where client_uid='$client_uid'");
$servqrres=mysqli_fetch_assoc($servqr);
$serv_nme=$servqrres['service_name'];
$serv_price=$servqrres['service_price'];
$prc_exp=explode(',',$serv_price);
$serv_exp=explode(',',$serv_nme);
$serv_count=count($serv_exp)-1;

$pdf .='<table style="border:1px solid grey;width:100%">';
$pdf .='<tr style="border:1px solid grey">';
$pdf .='<th style="border:1px solid grey;font-size:12px">'.'Ref Id'.'</th>';
$pdf .='<th style="border:1px solid grey;font-size:12px">'.'Emp Name'.'</th>';
//serives th st
$k=0;
for($k=0; $k < $serv_count; $k++){
    $servicename=$serv_exp[$k];
      $snmeexp=explode('#',$servicename);
     
       $serfinl=$snmeexp[1];
    $pdf .='<th style="border:1px solid grey;padding:5px;font-size:10px;font-weight:bold">'.ucwords($serfinl).'</th>';
}
//serives th ed

$pdf .='<th style="border:1px solid grey;font-size:12px">'.'Additional Fee'.'</th>';
$pdf .='<th style="border:1px solid grey;font-size:12px">'.'Total'.'</th>';

$pdf .='<th style="border:1px solid grey;font-size:12px">'.'Report Sent Date'.'</th>';
$pdf .='</tr>';
$qry5=mysqli_query($con,"select * from applications where client_uid='$client_uid'");
while($qryres5=mysqli_fetch_assoc($qry5)){
$empnames=$qryres5['emp_name'];
$id=$qryres5['id'];
$refid=$qryres5['ref_id'];

//selection of addl fee
$fee=mysqli_query($con,"select * from applic_entry where appl_id='$refid'");
$feeres=mysqli_fetch_assoc($fee);
$ad_fee=$feeres['addl_fee'];
$fnl_rdt=$feeres['finl_rpt_dt'];


$empname=$qryres5['emp_name'];
$pdf .= '<tr style="border:1px solid grey">';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$refid.'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$empname.'</td>';
$k=0;
for($k=0; $k < $serv_count; $k++){
    //selection status in applications tb
    $prg=mysqli_query($con,"select * from applications where ref_id='$refid'");
    $prgres=mysqli_fetch_assoc($prg);
    $servicename=$serv_exp[$k];
    $snmeexp=explode('#',$servicename);
    $serfinl=$snmeexp[1];
    $seriexplo=explode('-',$serfinl);
    $serimplo=implode('_',$seriexplo);
    $st_prc=$prgres[$serimplo];
    if($st_prc != 'nil'){
     $ser_prc=$prc_exp[$k];
     $pri_mg;
     $pri_mg=$pri_mg+$ser_prc;
    }
    else{
     $ser_prc='0';   
    }
    $pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$ser_prc.'</td>';
 
 
}
/*$tot=$serv_price;*/
/*$res = explode(',',$tot);*/
/*$result = array_sum($res);*/
$totalresult=$pri_mg+$ad_fee;
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$ad_fee.'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$totalresult.'</td>';
$pdf .='<td style="border:1px solid grey;font-size:12px;text-align:center">'.$fnl_rdt.'</td>';
$pdf .= '</tr>';
}
$pdf .='</table>';	 
  
}



require('TCPDF/tcpdf.php');
$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set title of pdf
$tcpdf->SetTitle($pdf_nme);

// set margins
$tcpdf->SetMargins(10, 10, 10, 10);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set header and footer in pdf
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->setListIndentWidth(3);

// set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, 11);

// set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AddPage();

$tcpdf->SetFont('times', '', 9.5);

$tcpdf->writeHTML($pdf, true, false, false, false, '');

//Close and output PDF document
$tcpdf->Output($pdf_nme, true);

?>