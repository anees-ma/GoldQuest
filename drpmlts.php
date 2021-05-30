<?php 
include 'config.php';
$mcid=$_POST['mcid'];
$mtdte=$_POST['mtdte'];
$cllog=mysqli_query($con,"select * from applications where client_uid='$mcid' && date='$mtdte'");
$n=1;
while($cllogres=mysqli_fetch_assoc($cllog)){
    $cl_id=$cllogres['client_uid'];
    $ref_id=$cllogres['ref_id'];
    $cl_emnme=$cllogres['emp_name'];
    //selection of client
    $crqry=mysqli_query($con,"select * from clent_details where client_uid='$cl_id'");
    $crqryres=mysqli_fetch_assoc($crqry);
    $cl_email=$crqryres['email'];
    $cl_cmpnme=$crqryres['company_name'];
    //selection of aplic
    $craplic=mysqli_query($con,"select * from applic_entry where appl_id='$ref_id'");
    $craplicres=mysqli_fetch_assoc($craplic);
    $cl_oref=$craplicres['cand_ref_id'];
    $cl_emp=$craplicres['clnt_emp_id'];
    $templ .="<tr style='border:1px solid black'>
    <td style='border:1px solid black'>$n</td>
    <td style='border:1px solid black'>$ref_id</td>
    <td style='border:1px solid black'>$cl_id</td>
    <td style='border:1px solid black'>$cl_emnme</td>
    </tr>";
   $n++; 
}
include 'drpbxtlne.php';
?>