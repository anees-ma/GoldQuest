<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        table,td,tr{
            border: 1px solid grey;
        }
        table{
            width: 100%;
        }
        .exrpt{
    text-align: left;
    border: 1px solid #3d75a4;
    padding: 15px;
    border-radius: 15px;
        }
    </style>
</head>
<?php 
include 'header.php';
include 'config.php';
?>
<?php 
//time st//
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$curDate = date('Y-m-d H:i:s');
$curDateoff=date('m');
$month_num=$curDateoff;
$month_name=date('M', mktime(0, 0, 0, $month_num, 10));
$dap=date('d').'-'.$month_name.'-'.date('Y').' '.date('H:i');
$dap2=date('d').'-'.date('m').'-'.date('Y');
//time ed//

$frnme=$_POST['funv1'];
$adclsuc=$_POST['adclsuc'];

if($frnme == 'cmsad'){
 ?>
 <div class="form-style">
     <?php 
     if($adclsuc != NULL){
         ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurl" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Client Registration Done Successfully.
        </div>
        <?php
     }
     ?>
     <div class="form-title page-title">Add Client</div>
 <form action="addclient.php" method="post" enctype="multipart/form-data" style="text-align:left" id="adcl_submi">
  <div class="form-group">
    <label for="cmpnme">Company Name: <span style="color:red">*</span></label>
    <input type="text" class="form-control" name="cmpnme" id="cmpnme">
  </div>
    <div class="form-group">
    <label for="cmpuid">Client Code: <span style="color:red">*</span></label>
    <input type="text" class="form-control" name="cmpuid" id="cmpuid">
    <p style="color: red; display: none" id="dp-error">Duplicate Client Code</p>
  </div>
  <div class="form-group">
    <label for="addrs">Address: <span style="color:red">*</span></label>
    <input type="text" class="form-control" name="addrs" id="addrs">
  </div>
  <div class="form-group">
    <label for="state">State: <span style="color:red">*</span></label>
    <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" name="state" id="state">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" name="mobile" id="mobile">
  </div>
  <div class="form-group">
    <label for="email">To Email: <span style="color:red">*</span></label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
    <div class="form-group">
    <label for="email2">CC Email:</label>
    <input type="email" class="form-control" name="email2" id="email2">
  </div>
    <div class="form-group">
    <label for="email3">CC Email(GQG):</label>
    <input type="email" class="form-control" name="email3" id="email3">
  </div>
    <!-- <div class="form-group">
    <label for="email4">Email 4:</label>
    <input type="email" class="form-control" name="email4" id="email4">
  </div> #CH-->
  <div class="form-group">
    <label for="contper">Contact Person:</label>
    <input type="text" class="form-control" name="contper" id="contper">
  </div>
  <div class="form-group">
    <label for="role">Role:</label>
    <input type="text" class="form-control" name="role" id="role">
  </div>
    <div class="form-group">
    <label for="gst">GST NO:</label>
    <input type="text" class="form-control" name="gst" id="gst">
  </div>
  <div class="form-group">
    <label for="tatd">TAT:</label>
    <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="tatd" id="tatd">
  </div>
  
  <div class="form-group">
    <label for="dsagr">Date of Service Agreement:</label>
    <input type="date" class="form-control" name="dsagr" id="dsagr" max="9999-12-31">
  </div>
   <!--<div class="form-group">
    <label for="dsagrexp">Agreement Expiry Date: <span style="color:red">*</span></label>
    <input type="date" class="form-control" name="dsagrexp" id="dsagrexp">
  </div>-->
   <div class="form-group">
    <label for="agrper">Agreement Period: <span style="color:red">*</span></label><br>
    <select id="agrper" name="agrper">
        <option>Unless Terminated</option>
        <option>1 Year</option>
        <option>2 Years</option>
        <option>3 Years</option>
    </select>
    <!--<input type="text" class="form-control" name="agrper" id="agrper">-->
  </div>
   <div class="form-group">
    <label>Upload Agreement:</label><br>
    <input type="file" class="form-control" name="agrbrw" id="agrbrw">
    <!--<div id="pstPHfri" style="width:100%"></div> -->
  </div>
  
  <div class="form-group">
      <table>
          <th>Service Name</th>
          <th>Price</th>
      <?php 
      $chk=mysqli_query($con,"select * from serv_list");
      $i=0;
      while($chkres=mysqli_fetch_assoc($chk)){
          $subserv=$chkres['subservice_name'];

          $subservid=$chkres['id'];

          $subservexp=explode(',',$subserv);
         // $subservcnt=count($subservexp)-1;#CH - added below line unstead
          $subservcnt = ($subservid==43)?1:count($subservexp)-1;//For Insta drug test by Anees on Mar 12, 2021
          //selection of display name
          $disqry=mysqli_query($con,"select * from display_names where id='$subservid'");
          $disqryres=mysqli_fetch_assoc($disqry);
          $dis_sub=$disqryres['subservice_name'];
          $dis_subexp=explode(',',$dis_sub);

          ?>
          <tr>
              <!-- <td><span onclick="toh(this)" data-togmn="<?php echo $i;?>" class="serv_but">+&nbsp;<?php echo strtoupper($chkres['service_name']);?></span><br> -->
              <?php 
              $k=0;
              for($k=0; $k < $subservcnt; $k++){
                  ?>
                  <tr>
                      <td><input type="checkbox" name="services[]" value="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" id="<?php echo strtolower($subservexp[$k]);?>">&nbsp;<label for="<?php echo strtolower($subservexp[$k]);?>"><?php echo strtoupper($subservexp[$k]);?></label></td>
                      <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td>
                  </tr>
                  <?php
              }
              ?>
              <!-- </td> -->
          </tr>
          <?php
                 $i++;
      }
      ?>
      
      
      </table>
  </div>
</form>
<button type="submit" class="btn btn-primary" id="add_client">Submit</button>
<!--<div class="bx_1">
    <div class="bx_title">Are you Sure Want to Submit?</div>
    <div class="bx_butn"><button id="yes_sub" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="no_sub" class="btn btn-danger">No</button></div>
</div>-->
</div>
 <?php
}
elseif($frnme == 'invoice'){
    ?>
    <div class="form-style">
     <div class="form-title page-title">Generate New Invoice</div>
 <form action="pdf2/inv.php" method="post" enctype="multipart/form-data" target="_blank" style="text-align:left">
  <div class="form-group">
    <label for="clrefin">Client Code:</label>
    <input type="text" class="form-control" name="clrefin" id="clrefin" required>
  </div>
  <div class="form-group">
    <label for="invnum">Invoice Number:</label>
    <input type="text" class="form-control" name="invnum" id="invnum" required>
  </div>
  <div class="form-group">
    <label for="saac">SAC Code:</label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" name="saac" id="saac" required>
  </div>
   <div class="form-group">
    <label for="stcde">State Code</label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" name="stcde" id="stcde" required>
  </div>
    <div class="form-group">
    <label for="moinv">Month:</label>
    <select class="instyl" id="inmnth" name="inmnth" required>
        <option>--Select Month--</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
    <select class="instyl" id="inyer" name="inyer" required>
        <option>--Select Year--</option>
        <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
        <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
        <option value="<?php echo date('Y')-2;?>"><?php echo date('Y')-2;?></option>
        </select>
  </div>
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
<button class="btn btn-sm btn-warning" onclick="maninv()">Manual Invoice</button>
</div>
    <?php
}
elseif($frnme == 'timelines'){
    ?>
    <div class="form-title page-title">Acknowledgement Pending</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th> Client Code</th>
                    <th>Company Name</th>
                    <th>Application Count</th>
                    <th>Send Approvals</th>
                    <?php 
                    $cllog=mysqli_query($con,"select DISTINCT client_uid from applications where date='$dap2'");
                    $o=1;
                    while($cllogres=mysqli_fetch_assoc($cllog)){
                        $crid=$cllogres['client_uid'];
                        $sepcl=mysqli_query($con,"select * from applications where date='$dap2' && client_uid='$crid'");
                        $cllogcnt=mysqli_num_rows($sepcl);
                        $crqry=mysqli_query($con,"select * from clent_details where client_uid='$crid'");
                        $crqryres=mysqli_fetch_assoc($crqry);
                        //find exit mails
                        $fmil=mysqli_query($con,"select * from dropbx_mails where client_uid='$crid' && mail_snd='$dap2'");
                        $fmilcnt=mysqli_num_rows($fmil);
                    ?>
                    <tr class="mls<?php echo $crid;?>">
                       <td><?php echo $o;?></td>
                       <td><?php echo $cllogres['client_uid'];?></td>
                       <td><?php echo $crqryres['company_name'];?></td>
                       <td><?php echo $cllogcnt;?></td>
                       <?php 
                       if($fmilcnt > 0){
                           ?>
                           <td><button class="btn btn-sm btn-success" disabled>Already Sent!</button></td>
                           <?php
                       }
                       else{
                           ?>
                           <td><button class="btn btn-sm btn-primary" onclick="malsnd(this)" data-mclid="<?php echo $cllogres['client_uid'];?>" data-tdte="<?php echo $dap2;?>">Send</button></td>
                           <?php
                       }
                       ?>
                    </tr>
                    <?php
                    $o++;
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'cmsmgs'){
    ?>
    <div class="form-title page-title">GoldQuest Active Clients(Active)</div>

    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="ac-check-all">
      <span id="ac-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-active-client-btn" onclick="deleteActiveClient()" class="btn btn-danger">Delete</button>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th>Detailed View</th>
                    <th>Company name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Agreement Period</th>
                    <th>Role</th>
                    <th>GST</th>
                    <th>Actions</th>
                    <?php 
                    $sta_at='Active';
                    $clensel=mysqli_query($con,"select * from clent_details where status='$sta_at' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $clientname=$clenselres['company_name'];
                        $clientid=$clenselres['client_id'];
                        $cid = $clenselres['id'];
                    ?>
                    <tr id="blkr<?php echo $clientid;?>">
                        <td><input type="checkbox" value="<?php echo $cid; ?>" class="check-delete-active"><span><?php echo $l;?></span></td>
                        <td class="detview" onclick="detv(this)" data-clid="<?php echo $clientid;?>">View</td>
                        <td><?php echo ucfirst($clenselres['company_name']);?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['dsagreepero'];?></td>
                        <td><?php echo ucfirst($clenselres['role']);?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="update" onclick="upd(this)" data-updid="<?php echo $clientid ;?>" class="btn btn-warning">Edit</button>
                        <button id="delete" onclick="blck(this)" data-blcid="<?php echo $clientid;?>" class="btn btn-danger fblo<?php echo $clientid;?>">Block</button></td>
                    </tr>
                    <?php
                    $l++;
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'blkusrs'){
    ?>
    <div class="form-title page-title">Client Management System (Inactive)</div>

    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="inac-check-all">
      <span id="inac-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-inactive-client-btn" onclick="deleteInactiveClient()" class="btn btn-danger">Delete</button>

    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th>Detailed View</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Agreement Period</th>
                    <th>Role</th>
                    <th>GST</th>
                    <th>Actions</th>
                    <?php 
                    $sta_at='In Active';
                    $clensel=mysqli_query($con,"select * from clent_details where status='$sta_at' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $clientname=$clenselres['company_name'];
                        $clientid=$clenselres['client_id'];
                        $cid = $clenselres['id'];
                    ?>
                    <tr id="blkr<?php echo $clientid;?>">
                        <td><input type="checkbox" value="<?php echo $cid; ?>" class="check-delete-inactive"><span><?php echo $l;?></span></td>
                        <td class="detview" onclick="detvinc(this)" data-clid="<?php echo $clientid;?>">View</td>
                        <td><?php echo ucfirst($clenselres['company_name']);?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['dsagreepero'];?></td>
                        <td><?php echo ucfirst($clenselres['role']);?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="delete" onclick="unblck(this)" data-blcid="<?php echo $clientid;?>" class="btn btn-success fblo<?php echo $clientid;?>">Unblock</button></td>
                    </tr>
                    <?php
                    $l++;
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'passwrds'){
    ?>
    <div class="form-title page-title">Client Login Credentials </div>
    <div class="task_tabl">
                <table class="dataTable-gn tbl_data">
                  <thead>
                    <tr>
                    <th>SL</th>
                    <th> Client Code</th>
                    <th>Company Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Login Link</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $cllog=mysqli_query($con,"select * from client_login order by id  DESC");
                    $o=1;
                    while($cllogres=mysqli_fetch_assoc($cllog)){
                        $crid=$cllogres['client_uid'];
                        $crqry=mysqli_query($con,"select * from clent_details where client_uid='$crid'");
                        $crqryres=mysqli_fetch_assoc($crqry);
                    ?>
                    <tr>
                       <td><?php echo $o;?></td>
                       <td><?php echo $cllogres['client_uid'];?></td>
                       <td><?php echo $crqryres['company_name'];?></td>
                       <td><?php echo $cllogres['email'];?></td>
                       <td><?php echo $cllogres['pas_wrd'];?></td>
                       <!-- <td><a style="color:blue;font-weight:bold" href="http://www.goldquestglobal.in/customerlogin?m=<?php echo$cllogres['email'];?>&s=<?php echo $cllogres['pas_wrd'];?>" target="_blank">Go</a></td> #CH-->
                       <td><a style="color:blue;font-weight:bold" href="http://localhost/GoldQuest/customerlogin?m=<?php echo$cllogres['email'];?>&s=<?php echo $cllogres['pas_wrd'];?>" target="_blank">Go</a></td>

                    </tr>
                    <?php
                    $o++;
                    }
                    ?>
                  </tbody>
                </table>
            </div>
    <?php
}
elseif($frnme == 'ademploye'){
    $next_index_qry=mysqli_query($con,'SELECT AUTO_INCREMENT
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = "'.DB_NAME.'"
AND TABLE_NAME = "employee_login"');
    $next_index=intval(mysqli_fetch_assoc($next_index_qry)['AUTO_INCREMENT']);
    $next_index_len = strlen((int)$next_index);
    if($next_index_len==1){
      $employee_id_snippet = '000'.$next_index;
    }elseif($next_index_len==2){
      $employee_id_snippet = '00'.$next_index;
    }elseif($next_index_len==3){
      $employee_id_snippet = '0'.$next_index;
    }
    elseif($next_index_len==4){
      $employee_id_snippet = $next_index;
    }
    ?>
    <div class="form-title page-title">Add Employee</div>
    <div class="form-style">
        <?php 
     if($adclsuc != NULL){
         ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurlemp" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Employee Done Successfully.
        </div>
        <?php
     }
     ?>
 <form action="addemp.php" method="post" enctype="multipart/form-data" style="text-align:left" id="add_empact">
  <div class="form-group">
    <label for="empidd">Employee ID: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" id="empidd" name="empidd_dummy" value="GQ-<?php echo $employee_id_snippet; ?>" disabled>
    <input type="hidden" name="empidd" value="GQ-<?php echo $employee_id_snippet; ?>">
  </div>
  <div class="form-group">
    <label for="empnmee">Employe Name: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="empnmee" name="empnmee">
  </div>
  <div class="form-group">
    <label for="empmobb">Employee Mobile: <span style="color:red">*</span></label>
    <input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control" id="empmobb" name="empmobb">
  </div>
  <div class="form-group">
    <label for="eemaill">Email: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="eemaill" name="eemaill">
  </div>
  <div class="form-group">
    <label for="passd">Password: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="passd" name="passd">
  </div>
  <div class="form-group">
    <label for="emprolee">Role: <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="emprolee" name="emprolee">
  </div>
</form>
<button class="btn btn-primary" id="add_empsub">Submit</button>
<div class="bx_1">
    <div class="bx_title">Are you Sure Want to Submit?</div>
    <div class="bx_butn"><button id="yes_subemp" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="no_subemp" class="btn btn-danger">No</button></div>
</div>
</div>
    
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Employee Mobile</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <?php 
                    $empm=mysqli_query($con,"select * from employee_login order by id  DESC");
                    $e=1;
                    while($empmres=mysqli_fetch_assoc($empm)){
                    ?>
                    <tr>
                       <td><?php echo $e;?></td>
                       <td><?php echo $empmres['emp_id'];?></td>
                       <td><?php echo $empmres['emp_name'];?></td>
                       <td><?php echo $empmres['emp_mobile'];?></td>
                       <td><?php echo $empmres['email'];?></td>
                       <td><?php echo $empmres['pass_wrd'];?></td>
                       <td><?php echo ucfirst($empmres['emp_role']);?></td>
                       <td>
                          <button class="btn btn-primary" onclick="editempl(this)" data-emiid="<?php echo $empmres['id'];?>">Edit</button>
                          <button class="btn btn-danger dlt-emp" data-dltid="<?php echo $empmres['id'];?>">Delete</button>
                     </td>
                    </tr>
                    <?php
                    $e++;
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'outsp'){
    ?>
    <div class="form-title">Outstanding Payouts</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Application creation</th>
                    <th>Total Value</th>
                    <th>Advance</th>
                    <th>Pending</th>
                    <th>Status</th>
                    <tr>
                        <td>1258</td>
                        <td>Pratap</td>
                        <td>Yes</td>
                        <td>10000</td>
                        <td>5000</td>
                        <td>No</td>
                        <td><button id="update" onclick="shpupd(this)" data-shupi="<?php echo $shpres['shop_id'];?>" class="btn btn-warning">Update</button>
                        <button id="delete" onclick="shpdel(this)" data-shdeli="<?php echo $shpres['shop_id'];?>" class="btn btn-danger">Delete</button></td>
                    </tr>
                </table>
            </div>
    <?php
}
elseif($frnme == 'cretapl'){
    ?>
    <div class="form-style">
     <div class="form-title">Create Application</div>
 <form action="kl.php">
  <div class="form-group">
    <label for="cpmne">Company Name:</label>
    <input type="text" class="form-control" id="cpmne">
  </div>
  <div class="form-group">
    <label for="empnme">Employee Name:</label>
    <input type="text" class="form-control" id="empnme">
  </div>
  <div class="form-group">
    <label for="empid">Employee Id:</label>
    <input type="text" class="form-control" id="empid">
  </div>
  <div class="form-group">
    <label for="empmob">Employee Mobile</label>
    <input type="text" class="form-control" id="empmob">
  </div>
  <div class="form-group">
    <label for="eemail">Email:</label>
    <input type="text" class="form-control" id="eemail">
  </div>
  <div class="form-group">
    <label for="desg">Designation:</label>
    <input type="text" class="form-control" id="desg">
  </div>
  <button type="submit" onclick="cretaptwo(this)"  data-edu="educ" class="btn btn-primary">Next</button>
</form>
</div>
    <?php
}
elseif($frnme == 'exclrpt'){
    ?>
    <div class="form-style">
     <div class="form-title page-title">Download Excel Tracker</div>
     <form class="exrpt" action="excel2.php" method="post" enctype="multipart/form-data" style="text-align:left;">
  <div class="form-group">
    <label for="exrefid">Enter Client Referece ID: (Client Wise)</label>
    <input type="text" class="form-control" id="exrefid" name="exrefid">
  </div>
<button type="submit" class="btn btn-primary">Download</button>
</form><br>
<form class="exrpt" action="excel3.php" method="post" enctype="multipart/form-data" style="text-align:left;">
  <div class="form-group">
     <label for="exrefid">Select Month/Year (Month Wise)</label><br>
    <label for="moinv">Month:</label>
    <select class="instyl" id="apmnth" name="apmnth" required>
        <option>--Select Month--</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
    <select class="instyl" id="apyer" name="apyer" required>
        <option>--Select Year--</option>
        <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
        <option value="<?php echo date('Y')-1;?>"><?php echo date('Y')-1;?></option>
        <option value="<?php echo date('Y')-2;?>"><?php echo date('Y')-2;?></option>
        </select>
  </div>
<button type="submit" class="btn btn-primary">Download</button>
</form>
</div>
    <?php
}
elseif($frnme == 'reminder'){
    ?>
    <div class="form-title page-title">TAT Exceeded WIP Cases</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th>Application ID</th>
                    <th>Client ID</th>
                    <th>Company Name</th>
                    <th>Candidate Reference ID</th>
                    <th>Days to Complete</th>
                    <th>Master Tracker</th>
                    <?php 
                    $comple='completed';
                    $niem=NULL;
                    $clensel=mysqli_query($con,"select * from applic_entry where over_status !='$comple' && no_dys_tkn !='$niem' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $case_recv_date=$clenselres['case_rv_dt'];
                        $tinstamp_date=$clenselres['no_dys_tkn'];
                        $appid=$clenselres['appl_id'];
                        $client_uid=$clenselres['gqg_ref_id'];
                        
                        $contimest=date('d-m-Y', strtotime($tinstamp_date));
                        $date1_ts = strtotime($dap2);
                        $date2_ts = strtotime($contimest);
                        $diff = $date2_ts - $date1_ts;
                        $cvh=round($diff / 86400);
                        if($cvh <= 2){
                    ?>
                    <tr id="blkr<?php echo $clientid;?>">
                        <td><?php echo $l;?></td>
                        <td><?php echo $appid;?></td>
                        <td><?php echo $client_uid;?></td>
                        <td><?php echo $clenselres['clnt_ful_nme'];?></td>
                        <td><?php echo $clenselres['cand_ref_id'];?></td>
                        <td><?php
                        echo $cvh;
                        ?></td>
                        <!-- <td style="padding:10px"><a href="http://www.goldquestglobal.in/masterchecker.php?ref_id=<?php echo $appid;?>" target="_blank" class="startmstr">START</a></td> #CH-->
                        <td style="padding:10px"><a href="http://localhost/GoldQuest/masterchecker.php?ref_id=<?php echo $appid;?>" target="_blank" class="startmstr">START</a></td>
                    </tr>
                    <?php
                    $l++;
                        }
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'apmng'){
    ?>
    <div class="form-title page-title">Active Client List</div>
    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="acl-check-all">
      <span id="acl-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-client-btn" onclick="deleteClient()" class="btn btn-danger">Delete</button>
    <div style="float:right;margin-right:20px;">
        Cases:
        <select onchange="cassta(this)" id="casgett">
            <option>Pending</option>
            <option>Completed</option>
        </select>
    </div>
    
    <div class="task_tabl">
                <table class="dataTable-gn tbl_data">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Client Company Name</th>
                        <th>Client Code</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $adaps=mysqli_query($con,"select * from clent_details order by id desc");
                        $v=1;
                        while($adapsres=mysqli_fetch_assoc($adaps)){
                            $cladid=$adapsres['client_id'];
                            $clserv=$adapsres['service_name'];
                            
                            //selection of applications
                            $adaps2=mysqli_query($con,"select * from applications where client_id='$cladid' && status !='completed'");
                            $adaps2res=$adapsres=mysqli_fetch_assoc($adaps2);
                            $clrefid=$adaps2res['client_uid'];
                            $clcomnme=$adaps2res['company_name'];
                            $adaps2cnt=mysqli_num_rows($adaps2);
                            
                        
                        if($adaps2cnt > 0){
                                ?>

                                <tr>
                                    <td><input type="checkbox" value="<?php echo $adapsres['id']; ?>" class="check-delete"><span style="padding-left: 6px"><?php echo $v;?></span></td>
                                    <td><span title="Click Here to Access All Applications" style="cursor:pointer" onclick="appi(this)" data-refid="<?php echo $clrefid;?>"><?php echo strtoupper($clcomnme);?></span></td>
                                   
                                    <td><?php echo $clrefid;?>&nbsp;<span class="aprcn"><?php echo $adaps2cnt;?></span>&nbsp;Received</td>
                                </tr>
                                <?php
                                $v++;
                            }
                            
                        }
                        ?>
                  </tbody>
                </table>
            </div>
    <?php
}
elseif($frnme == 'adsrvi'){
    ?>
    <div class="form-style">
     <div class="form-title">Add Service</div>
 <form action="servadd.php" method="post">
  <div class="form-group">
    <label for="sernme">Service Name:</label>
    <input type="text" class="form-control" name="service_name" id="sernme" required>
  </div>
  <div id="subele">

  <div class="form-group" id="sub1">
    <label for="sub1">Sub Service Name: 1</label>
    <input type="text" class="form-control" name="sub1" id="sub1">
  </div>
  </div>
  <div class="admore"><button onclick="addsub()" type="button" class="btn btn-warning"> + AdMore</button></div>
  <!--<div class="form-group">-->
  <!--  <label for="actamnt">Actual Amount:</label>-->
  <!--  <input type="text" class="form-control" id="actamnt">-->
  <!--</div>-->
  <!--<div class="form-group">-->
  <!--  <label for="offramnt">Offer Amount:</label>-->
  <!--  <input type="text" class="form-control" id="offramnt">-->
  <!--</div>-->
  <input type="hidden" name="elemcnt" id="elemcnt" value="">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
    <?php
}
elseif($frnme == 'sermngmt'){
    ?>
    
    <div class="form-title">Service Management</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>Sl.No</th>
                    <th>Service Name</th>
                    <th>Sub Service Name</th>
                    <th>Action</th>
                    <?php
                  $serdet=mysqli_query($con,"select * from serv_list"); 
                  $g=1;
                   while($serres=mysqli_fetch_assoc($serdet)){
                    $id=$serres['id'];
                    $service_name=$serres['service_name'];
                    $sub_service=$serres['subservice_name'];
                    $sub_serviceexp=explode(',',$sub_service);
                    $sub_servicevnt=count($sub_serviceexp)-1;
                    ?>
                    <tr>
                        <td><?php echo $g;?></td>
                        <td><?php echo strtoupper($service_name);?></td>
                        <td>
                        <?php 
                        $h=0;
                        $p=1;
                        for($h=0; $h < $sub_servicevnt; $h++){
                            ?>
                            <span><?php echo $p.'.';?></span>&nbsp;<span><?php echo ucwords($sub_serviceexp[$h]);?></span><br>
                            <?php
                            $p++;
                        }
                        ?>
                        </td>
                        <td>
                        <!--<button id="update" onclick="updserv(this)" data-updservidi="<?php echo $id ;?>" class="btn btn-warning">Edit</button>-->
                        <button id="delete" onclick="serdel(this)" data-serdeli="<?php echo $id ;?>" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <?php
                    $g++;
                    }
                   ?> 
                </table>
            </div>
    <?php
}
?>
<!--post clientdetails start-->
<script>
    function shpdel(client){ 
        var clientid=$(client).data('shdeli');
        $.ajax({
            url: 'clientdetailsblock.php';
            type: 'post',
            data: {clientid:clientid},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
    
</script>

<!--post client details end-->
<!--education details under create application st-->
<script>
      function cretaptwo(two){
                var nextva=$(two).data('edu');
                $.ajax({
                    url: 'educheck.php',
                    type: 'post',
                    data: {nextva:nextva},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--education details under create application ed-->

<!-- edit variablles post start-->
<script>
    function upd(editdet){ 
        var editid=$(editdet).data('updid');
       
        $.ajax({
            url: 'clientdetailsedit.php',
            type: 'post',
            data: {editid:editid,},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!-- edit variables post end-->
<!--block st-->
<script>
    function blck(clienty){ 
        var clientid=$(clienty).data('blcid');
        $.ajax({
            url: 'clientdetailsblock.php',
            type: 'post',
            data: {clientid:clientid},
             beforeSend: function(){
                        $('.tbl_data .fblo' +clientid).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.tbl_data .fblo' +clientid).html(resp);
                        $('.tbl_data #blkr' +clientid).css('display','none');
                    }
        })
    }
    
</script>
<!--block ed-->

<!-- un block st-->
<script>
    function unblck(clientyt){ 
        var clientid=$(clientyt).data('blcid');
        $.ajax({
            url: 'clientdetailsunblock.php',
            type: 'post',
            data: {clientid:clientid},
             beforeSend: function(){
                        /*$('.tbl_data .fblo' +clientid).html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');*/
                    },
                    success: function(resp){
                        $('.tbl_data .fblo' +clientid).html(resp);
                        $('.tbl_data #blkr' +clientid).css('display','none');
                    }
        })
    }
    
</script>
<!--un block ed-->

<!-- service variablles post start edit-->
<script>
    function updserv(serviceedit){ 
        var serviceid=$(serviceedit).data('updservidi');
      
        $.ajax({
            url: 'serviceedit.php',
            type: 'post',
            data: {serviceid:serviceid,},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!-- service variables post edit end-->


<!-- service variablles post delete start-->
<script>
    function serdel(servicedelete){ 
        var servid=$(servicedelete).data('serdeli');
      
        $.ajax({
            url: 'servicedelete.php',
            type: 'post',
            data: {servid:servid},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!-- service variables post delete end-->

<!-- send ref id excel report start-->
<script>
    function sendexl(exclre){ 
        var exrefidc=$('#exrefid').val();
      
        $.ajax({
            url: 'excelview.php',
            type: 'post',
            data: {exrefidc:exrefidc},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!-- send ref id excel report end-->

<!--agreement upload st-->
<script> 
$("#agrbrw").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#pstPHfri");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<embed />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
</script>


<script>
    $(document).ready(function(){
        $('#agrupl').click(function(){
            $('#agrbrw').trigger('click');
        })
    })
</script>
<!--agreement upload ed-->

<!--client detailed view st-->
<script>
    function detv(detv){ 
        var client_id=$(detv).data('clid');
      
        $.ajax({
            url: 'clientdetv.php',
            type: 'post',
            data: {client_id:client_id},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!--client detailed view ed-->

<!--client detailed view for inactive clients st-->
<script>
    function detvinc(detv){ 
        var client_id=$(detv).data('clid');
      
        $.ajax({
            url: 'clientdetvinc.php',
            type: 'post',
            data: {client_id:client_id},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
   
</script>
<!--client detailed view for inactive clients ed-->

<!--cases status st-->
<script>
    function cassta(hnj){ 
        var case_stau=$(hnj).val();
        /*alert(case_stau);*/
      
        $.ajax({
            url: 'casestatus.php',
            type: 'post',
            data: {case_stau:case_stau},
             beforeSend: function(){
                        $('.task_tabl').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.task_tabl').html(resp);
                    }
        })
        $('#acl-check-all').prop('checked',false);
    }
   
</script>
<!--cases status ed-->

<!--add sub service st-->
<script>
    function addsub(){
    geelm=document.getElementById('subele');
    elmcnt=document.getElementById('elemcnt');
    
    //functionalities
    var lastelem=geelm.lastElementChild;
    var lastelid=lastelem.getAttribute("id");
    
    var elct=geelm.childElementCount;
    
     elmcnt.value = elct; 
            /*elmcnt.innerHTML =  
                   "Value = " + "'" + elmcnt.value + "'";*/ 
    
    var spl=lastelid.split('sub');
    var splid=spl[1];
    var pars=parseInt(splid)+(1);
    var finpar='sub'+pars;
    
    elm1=document.createElement('div');
    elm1.classList.add('form-group');
    elm1.setAttribute('id',finpar);
    
    elm2=document.createElement('label');
    elm2txt=document.createTextNode('Sub Service Name:'+' '+pars);
        elm3=document.createElement('input');
        elm3.classList.add('form-control');
        elm3.setAttribute('type','text');
        elm3.setAttribute('name',finpar);
        elm3.setAttribute('id',finpar);
    
    elm2.appendChild(elm2txt);
    elm1.appendChild(elm2);
    elm1.appendChild(elm3);
    geelm.appendChild(elm1);
    
    }
</script>
<!--add sub service ed-->

<!--show the applications st-->
<script>
    function appi(fgy){
        var cliuid=$(fgy).data('refid');
        var cgwtt_sta=$('#casgett').val();
        
        $.ajax({
            url: 'aplshow.php',
            type: 'post',
            data: {cliuid:cliuid,cgwtt_sta:cgwtt_sta},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
    }
</script>
<!--show the applications ed-->

<!--validating client data st-->
<script>
    $(document).ready(function(){
        $('.bx_1').hide();
    $('#add_client').click(function(e){
        let validation = 1;
        e.preventDefault();
        var vcomp_nme=$('#cmpnme').val();
        var vcref_id=$('#cmpuid').val();
        var vaddr_v=$('#addrs').val();
        var vstate=$('#state').val();
        var vmobile=$('#mobile').val();
        var vemail=$('#email').val();
        var vdatagst=$('#dsagr').val();
        var vagperi=$('#agrper').val();
        var email2=$('#email2').val();
        var email3=$('#email3').val();
        var email4=$('#email4').val();
        var tatd=$('#tatd').val();
        
    
        if(/(.+)@(.+){2,}\.(.+){2,}/.test(vemail)){
        
        if(vcomp_nme != '' && vcref_id != '' && vaddr_v != '' && vstate != '' && vmobile != '' && vemail != '' && vagperi != '' && vdatagst != '' && tatd != ''){
            //$('#chkclk').trigger('click');
            validation = 1;
        }
        else{
            validation = 0;
            alert('Please fill all the details');
        }
        }
        else{
            validation = 0;
            alert('Please enter valid email id');
        }

        if(iSduplicateClientCode==0 && validation==1){
          //$('#adcl_submi').submit();
          $('#chkclk').trigger('click');
        }else if(iSduplicateClientCode==1){
          let element = document.getElementById("cmpuid");
          element.scrollIntoView();
        }else{
          
        }

        })
        $('#yes_sub').click(function(){
            $('#yes_sub').attr("disabled", true);
            $('#adcl_submi').submit();
        })
        
        $('#no_sub').click(function(){
            /*$('.bx_1').hide(1000);*/
            $('#timescl').trigger('click');
        })
        
    })
</script>
<!--validating client data ed-->

<!--validating add employee st-->
<script>
    $(document).ready(function(){
      $('.dataTable-gn').DataTable({
        "dom": 'lfrtp',
        "bSort" : false,
      });
        $('.bx_1').hide();
    $('#add_empsub').click(function(){
        var vemp_nme=$('#empnmee').val();
        var vemp_id=$('#empidd').val();
        var vmob_emp=$('#empmobb').val();
        var vemail_emp=$('#eemaill').val();
        var vemp_pas=$('#passd').val();
        var vemp_role=$('#emprolee').val();
        
    
        if(/(.+)@(.+){2,}\.(.+){2,}/.test(vemail_emp)){
        
        if(vemp_nme != '' && vemp_id != '' && vmob_emp != '' && vemail_emp != '' && vemp_pas != '' && vemp_role != ''){
            $('#empchkclk').trigger('click');
        }
        else{
            alert('Please fill all the details');
        }
        }
        else{
            alert('Please enter valid email id');
        }
        })
        $('#empyes_sub').click(function(){
            $('#add_empact').submit();
            
        })
        
        $('#empno_sub').click(function(){
            $('#timesclemp').trigger('click');
        })
        
    })
</script>
<!--validating add employee ed-->
<!--not null for prices st-->
<script>
function clchk(gtum){
    
            var ghk=$(gtum).data('chomn');
            var isChecked = $('#'+ghk).is(":checked");
            if (isChecked) {
                /*alert("CheckBox checked.");*/
            } else {
                $('#vbs'+ghk).val('');
                alert('Please select service');
            }
            /*alert(ghk);*/
}
</script>
<!--not null for prices ed-->

<!--edit employee st-->
<script>
function editempl(ediotem){
            var ediemido=$(ediotem).data('emiid');
            $.ajax({
            url: 'editemploy.php',
            type: 'post',
            data: {ediemido:ediemido},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
            
}


</script>
<!--edit employee ed-->
<script>
    $(document).ready(function(){
        $('#pusurl').click(function(){
            window.history.pushState("object or string", "Title", "/#");
        })
        $('#pusurlemp').click(function(){
            window.history.pushState("object or string", "Title", "/#");
        })
    })
    //drop box mails send st
    function malsnd(msnd){
        var mcid = $(msnd).data('mclid');
        var mtdte = $(msnd).data('tdte');
        
        $.ajax({
            url: 'drpmlts.php',
            type: 'post',
            data: {mcid:mcid,mtdte:mtdte},
             beforeSend: function(){
                        /*$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');*/
                    },
                    success: function(resp){
                        $('.mls'+mcid).css('display','none');
                    }
        })
    }
    //drop box mails send st
    //manual invoice st
    function maninv(){
        var client_id = $('#clrefin').val();
        var inv_num = $('#invnum').val();
        var sac_cde = $('#saac').val();
        var mnth_num = $('#inmnth').val();
        var yr_num = $('#inyer').val();
        $.ajax({
            url: 'manulinv.php',
            type: 'post',
            data: {client_id:client_id,inv_num:inv_num,sac_cde:sac_cde,mnth_num:mnth_num,yr_num:yr_num},
             beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
        })
        /*alert(client_id);*/
    }
    //manual invoice ed



    $('#acl-check-all').change(function() {
        if(this.checked) {
          $('.check-delete').prop('checked',true);
          showDeleteBtn();
        }else{
          $('.check-delete').prop('checked',false);
          hideDeleteBtn();
        }       
    });

    $(document).on('change','.check-delete',function() {

      if($(".check-delete").is(':checked')) {
        showDeleteBtn();
      }else{
        hideDeleteBtn();
      }
    });

    function showDeleteBtn(){
      $("#delete-client-btn").fadeIn(300);
    }

    function hideDeleteBtn(){
      $("#delete-client-btn").fadeOut(300);
    }

    function deleteClient(){
      if(confirm("Are you sure, you want to delete?")){
        let case_stau=$('#casgett').val();
        let deletIds = [];
        $('.check-delete:checked').each(function() {
         deletIds.push($(this).val());
        });

        $.ajax({
          url: 'deleteClients.php',
          type: 'post',
          data: {deleteIds:deletIds,case_stau:case_stau},
          beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
          },
          success: function(resp){
            if(resp==false){
               alert('Deleting selected items failed, please try again later');
            }else{
              $('.task_tabl').html(resp);
              alert('Selected items deleted successfully');
              $('#acl-check-all').prop('checked', false);
            }
          }
        })
      }else{
        $('#acl-check-all').prop('checked', false);
        $('.check-delete').prop('checked',false);
      }
    }

    $(document).on('click','.dlt-emp',function(){
      if(confirm("Are you sure, you want to delete?")){
        var empid=$(this).data('dltid');
        var row = $(this).parents().eq(1);
        $.ajax({
        url: 'delete-employee.php',
        type: 'post',
        data: {deleteempid:empid},
         beforeSend: function(){
                    //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                },
                success: function(resp){
                  $(row).remove();
                }
        })
      }
              
  })

    //Active client bulk delete starts
    $(document).on('change','#ac-check-all',function(){
        if(this.checked) {
          $('.check-delete-active').prop('checked',true);
          showActiveClientDeleteBtn();
        }else{
          $('.check-delete-active').prop('checked',false);
          hideActiveClientDeleteBtn();
        }       
    });

    $(document).on('change','.check-delete-active',function() {

      if($(".check-delete-active").is(':checked')) {
        showActiveClientDeleteBtn();
      }else{
        hideActiveClientDeleteBtn();
      }
    });

    function showActiveClientDeleteBtn(){
      $("#delete-active-client-btn").fadeIn(300);
    }

    function hideActiveClientDeleteBtn(){
      $("#delete-active-client-btn").fadeOut(300);
    }

    function deleteActiveClient(){
      if(confirm("Are you sure, you want to delete?")){
        let deletIds = [];
        $('.check-delete-active:checked').each(function() {
         deletIds.push($(this).val());
        });

        $.ajax({
          url: 'deleteClients.php',
          type: 'post',
          data: {deleteIds:deletIds, type: 'active_clients'},
          beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
          },
          success: function(resp){
            if(resp==false){
               alert('Deleting selected items failed, please try again later');
            }else{
              //$('.task_tabl').html(resp);
              $('.right .right_con').html(resp);
              alert('Selected items deleted successfully');
              $('#ac-check-all').prop('checked', false);
            }
          }
        })
      }else{
        $('#ac-check-all').prop('checked', false);
        $('.check-delete-active').prop('checked',false);
      }
    }
    //Active clients bulk delete ends

    //Inactive clients bulk delete starts
    $(document).on('change','#inac-check-all',function(){
        if(this.checked) {
          $('.check-delete-inactive').prop('checked',true);
          showInactiveClientDeleteBtn();
        }else{
          $('.check-delete-inactive').prop('checked',false);
          hideInactiveClientDeleteBtn();
        }       
    });

    $(document).on('change','.check-delete-inactive',function() {

      if($(".check-delete-inactive").is(':checked')) {
        showInactiveClientDeleteBtn();
      }else{
        hideInactiveClientDeleteBtn();
      }
    });

    function showInactiveClientDeleteBtn(){
      $("#delete-inactive-client-btn").fadeIn(300);
    }

    function hideInactiveClientDeleteBtn(){
      $("#delete-inactive-client-btn").fadeOut(300);
    }

    function deleteInactiveClient(){
      if(confirm("Are you sure, you want to delete?")){
        let deletIds = [];
        $('.check-delete-inactive:checked').each(function() {
         deletIds.push($(this).val());
        });

        $.ajax({
          url: 'deleteClients.php',
          type: 'post',
          data: {deleteIds:deletIds, type: 'inactive_clients'},
          beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
          },
          success: function(resp){
            if(resp==false){
               alert('Deleting selected items failed, please try again later');
            }else{
              //$('.task_tabl').html(resp);
              $('.right .right_con').html(resp);
              alert('Selected items deleted successfully');
              $('#inac-check-all').prop('checked', false);
            }
          }
        })
      }else{
        $('#inac-check-all').prop('checked', false);
        $('.check-delete-inactive').prop('checked',false);
      }
    }
    //Inactyive clients bulk delete ends

    //Unique client uid check, preventing duplicate client id
    var iSduplicateClientCode = 0;
    $(document).on('blur','#cmpuid',function(){
      let clientid = $('#cmpuid').val();
      $.ajax({
            url: 'checkduplicate.php',
            type: 'post',
            dataType: 'json',
            data: {clientid:clientid,type:'add client'},
            beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
            },
            success: function(res){
                console.log(res);
                if(res.status==0){
                  iSduplicateClientCode = 1;
                  let element = document.getElementById("cmpuid");
                  element.scrollIntoView();
                  if(res.client_id==0){
                    $('#dp-error').show();
                  }else{
                    $('#dp-error').hide();
                  }

                }else if(res.status==1){
                  iSduplicateClientCode = 0;
                  $("#submitcdb").submit();
                  $('#dp-error').hide();
                }
            },
            error: function(xhr,textStatus,errorThrown){
               console.log("ERROR : ", errorThrown);
               console.log("ERROR : ", xhr);
            }
        })
    })

    $(document).on('click','#add_client',function(e){
      

    })
    //Unique client uid check, preventing duplicate client id ends
</script>