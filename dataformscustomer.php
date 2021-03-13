<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        table,td,tr{
            border: 1px solid grey;
        }
        table{
            width: 100%;su
        }
    </style>
</head>
<?php 
include 'header.php';
include 'config.php';

if(isset($_POST['funv1'])){
    $frnme=$_POST['funv1'];
}

$log_id=$_POST['log_id'];
$adclsucc=$_POST['adclsucc'];

if($frnme == 'cdb'){ 

    $clientsql=mysqli_query($con,"select * from clent_details where client_id='$log_id'");
    $clientres=mysqli_fetch_assoc($clientsql);
    $company_name=$clientres['company_name'];
    $client_id=$clientres['client_id'];
?>
<form action="submitcdb.php" method="post" enctype="multipart/form-data" name="submitcdb" id="submitcdb"><!--Candidate Dropbox -->

    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-lg-12">
            <div class="form-title page-title">Create Application</div>
        </div>
<div class="col-lg-6">
            
    <div class="form-style" style="width: 90%;">
        <?php 
        if($adclsucc != NULL){
            ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurl" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Application Done Successfully.
        </div>
            <?php
        }
        ?>
     
 
  <div class="form-group">
    <label for="candidate_name">Candidate Name<span style="color:red">*:</label>
    <input type="text" value="" class="form-control" id="candidate_name" name="candidate_name" required>
  </div>
  <div class="form-group">
    <label for="mobile_number">Mobile Number<span style="color:red">*:</span></label>
    <input type="number" class="form-control" id="mobile_number" name="mobile_number" required>
    <p style="color: red; display: none" id="dp-mobile">Duplicate mobile number</p>
  </div>
  <div class="form-group">
    <label for="email_id">Email ID<span style="color:red">*:</span></label>
    <input type="email" class="form-control" id="email_id" name="email_id" required>
    <p style="color: red; display: none" id="dp-email">Duplicate email id</p>
  </div>
  <div class="form-group">
    <label for="location">Location:</label>
    <input type="text" class="form-control" id="location" name="location">
  </div>
  <div class="form-group">
    <label for="company_name">Company Name:</label>
    <input type="text"  value="<?php echo strtoupper($company_name); ?>" class="form-control" id="company_name" disabled>
    <input type="hidden" name="company_name" value="<?php echo strtoupper($company_name); ?>">
  </div>
  <div class="form-group">
    <label for="employer_name">Employer Name:</label>
    <input type="text" class="form-control" id="employer_name" name="employer_name">
  </div>
  <!-- <div class="form-group">
    <label for="employee_name">Employee Name: (Full Name as per Govt ID Proof)</label>
    <input type="text" class="form-control" id="employee_name" name="employee_name">
  </div>

  <div class="form-group">
    <label for="emp_mobile_number">Employee Mobile Number</label>
    <input type="number" class="form-control" id="emp_mobile_number" name="emp_mobile_number">
  </div>
  <div class="form-group">
    <label for="emp_email_id">Employee Email ID</label>
    <input type="email" class="form-control" id="emp_email_id" name="emp_email_id">
  </div>
  <div class="form-group">
    <label for="emp_location">Employee Location:</label>
    <input type="text" class="form-control" id="emp_location" name="emp_location">
  </div> -->
  <input type="hidden" id="clientids_cdb" name="clientid_cdb" value="<?php echo $client_id?>">

</div>
</div>

            <div class="col-lg-6">
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
              <!-- <td><span onclick="toh(this)" data-togmn="<?php echo $i;?>" class="serv_but">+&nbsp;<?php echo strtoupper($chkres['service_name']);?></span><br> #CH Disabled by Anees On Feb 26, 2021-->
              <?php 
              $k=0;
              for($k=0; $k < $subservcnt; $k++){
                  ?>
                  <tr>
                      <td><input type="checkbox" name="services[]" value="<?php echo strtolower($subservexp[$k]);?>" id="<?php echo strtolower($subservexp[$k]);?>">&nbsp;<label for="<?php echo strtolower($subservexp[$k]);?>"><?php echo strtoupper($subservexp[$k]);?></label>
                      <?php
                      if($subservexp[$k]=='post-graduation'){ echo ': ';?>
                        <select id="pg-dropdown" name="pg_stream" onchange="pgUgChange(this.id)"> 
                            <option></option>
                            <option value="MD">MD</option>
                            <option value="Mtech">Mtech</option>
                            <option value="Mcom">Mcom</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="MSC">MSC</option>
                            <option value="MA">MA</option>
                        </select>
                    <?php  }elseif($subservexp[$k]=='graduation'){ echo ': ';?>
                        <select id="ug-dropdown" name="ug_stream" onchange="pgUgChange(this.id)"> 
                            <option></option>
                            <option value="MBBS">MBBS</option>
                            <option value="Btech">Btech</option>
                            <option value="Bcom">Bcom</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="BSC">BSC</option>
                            <option value="BA">BA</option>
                        </select>
                 <?php     }

                      ?></td>
                      <!-- <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td> #CH --Replaced by below code by Anees M A on Feb 26, 2021-->

                      <!--Added by Anees M A on Feb 26, 2021--->
                      <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td>
                  </tr>
                  <?php
              }
              ?>
              <!-- </td> #CH Disabled by Anees On Feb 26, 2021-->
          </tr>
          <?php
                 $i++;
      }
      ?>
      
      
      </table>
  </div>

</div>


            
<!-- </div> -->
<div class="col-lg-4">
</div>
<div class="col-lg-4">
    <button class="btn btn-primary" type="submit" name="submitcdb_btn" id="submitcdb_btn">Submit to send link to candidate</button>
</div>
<div class="col-lg-4">
</div>
</form>
</div>
<?php } 

if($frnme == 'cmsad'){
 ?>
 <div class="form-style">
     <div class="form-title">Add Client</div>
 <form action="addclient.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="cmpnme">Company Name:</label>
    <input type="text" class="form-control" name="cmpnme" id="cmpnme">
  </div>
  <div class="form-group">
    <label for="addrs">Address:</label>
    <input type="text" class="form-control" name="addrs" id="addrs">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="text" class="form-control" name="mobile" id="mobile">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="contper">Contact Person:</label>
    <input type="text" class="form-control" name="contper" id="contper">
  </div>
  <div class="form-group">
    <label for="role">Role:</label>
    <input type="text" class="form-control" name="role" id="role">
  </div>
    <div class="form-group">
    <label for="gst">GST:</label>
    <input type="text" class="form-control" name="gst" id="gst">
  </div>
  <div class="form-group">
      <table>
          <th>Service Name</th>
          <th>Price</th>
      <?php 
      $chk=mysqli_query($con,"select * from serv_list");
      while($chkres=mysqli_fetch_assoc($chk)){
          ?>
          <tr>
              <td><input type="checkbox" name="services[]" value="<?php echo $chkres['service_name'];?>"><?php echo ucwords($chkres['service_name']);?></td>
              <td><?php echo $chkres['service_price'];?></td>
          </tr>
          <?php
      }
      ?>
      </table>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 <?php
}
elseif($frnme == 'cmsmgs'){
    ?>
    <div class="form-title">Client Management System</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>Comapny Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Contact Person</th>
                    <th>Role</th>
                    <th>GST</th>
                    <th>Actions</th>
                    <?php 
                    $clensel=mysqli_query($con,"select * from clent_details order by id DESC");
                    $clenselres=mysqli_fetch_assoc($clensel);
                    ?>
                    <tr>
                        <td><?php echo $clenselres['company_name'];?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['email'];?></td>
                        <td><?php echo $clenselres['contact_person'];?></td>
                        <td><?php echo $clenselres['role'];?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="update" onclick="shpupd(this)" data-shupi="<?php echo $shpres['shop_id'];?>" class="btn btn-warning">Update</button>
                        <button id="delete" onclick="shpdel(this)" data-shdeli="<?php echo $shpres['shop_id'];?>" class="btn btn-danger">Delete</button></td>
                    </tr>
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
    <?php
    $clientsql=mysqli_query($con,"select * from clent_details where client_id='$log_id'");
    $clientres=mysqli_fetch_assoc($clientsql);
    $company_name=$clientres['company_name'];
    $client_id=$clientres['client_id'];
    
    //selection of services st
    
    //service names st
     $servi_name=$clientres['service_name'];
     $servi_nameexp=explode(',',$servi_name);
     $servcnt=count($servi_nameexp)-1;
     
     $servi_price=$clientres['service_price'];
     $servi_priceexp=explode(',',$servi_price);
     //service names ed
     //selection of services ed
    ?>
    <form action="createapp.php" method="post" enctype="multipart/form-data" id="creatappsubf">
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-lg-12">
            <div class="form-title page-title">Create Application</div>
        </div>

            <div class="col-lg-6">
    <div class="form-style">
        <?php 
        if($adclsucc != NULL){
            ?>
        <div class="alert alert-success alert-dismissible">
        <button id="pusurl" type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Application Done Successfully.
        </div>
            <?php
        }
        ?>
     
 
  <div class="form-group">
    <label for="cpmne">Company Name:</label>
    <input type="text" value="<?php echo strtoupper($company_name);?>" class="form-control" id="cpmne" disabled>
  </div>
  <div class="form-group">
    <label for="empnme">Employee Name: (Full Name as per Govt ID Proof) <span style="color:red">*</span></label>
    <input type="text" class="form-control" id="empnme" name="empnme">
  </div>
  <div class="form-group">
    <label>Attach Documents: <span style="color:red">*</span></label>(Note:Please attach only PDF and IMAGE files)<br>
    <input type="file" class="form-control" name="mudcs[]" id="mudcs" multiple><br>
    <!--<div id="pstPHfri" style="width:100%"></div>--> 
  </div>
  <div class="form-group">
    <label>Use only for Insufficiency  Document Attachment:</label><br>
    <input type="file" class="form-control" name="uoida" id="uoida"><br>
    <!--<div id="pstPHfri" style="width:100%"></div>--> 
  </div>
  <div class="form-group">
    <label for="rmrkad">Remarks: (If Any additional Scope of Services please specify)</label>
    <input type="text" class="form-control" id="rmrkad" name="rmrkad">
  </div>
 <!-- <div class="form-group">
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
  </div>-->
  <input type="hidden" id="clientids" name="clientids" value="<?php echo $client_id?>">

<!-- <button class="btn btn-primary" name="submit" id="creapbid">Submit</button> -->
</div>
</div>

            <div class="col-lg-6">
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
              <!-- <td><span onclick="toh(this)" data-togmn="<?php echo $i;?>" class="serv_but">+&nbsp;<?php echo strtoupper($chkres['service_name']);?></span><br> #CH Disabled by Anees On Feb 26, 2021-->
              <?php 
              $k=0;
              for($k=0; $k < $subservcnt; $k++){
                  ?>
                  <tr>
                      <td><input type="checkbox" name="services[]" value="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" id="<?php echo strtolower($subservexp[$k]);?>">&nbsp;<label for="<?php echo strtolower($subservexp[$k]);?>"><?php echo strtoupper($subservexp[$k]);?></label>
                        <?php
                      if($subservexp[$k]=='post-graduation'){ echo ': ';?>
                        <select id="pg-dropdown" name="pg_stream" onchange="pgUgChange(this.id)"> 
                            <option></option>
                            <option value="MD">MD</option>
                            <option value="Mtech">Mtech</option>
                            <option value="Mcom">Mcom</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="MSC">MSC</option>
                            <option value="MA">MA</option>
                        </select>
                    <?php  }elseif($subservexp[$k]=='graduation'){ echo ': ';?>
                        <select id="ug-dropdown" name="ug_stream" onchange="pgUgChange(this.id)"> 
                            <option></option>
                            <option value="MBBS">MBBS</option>
                            <option value="Btech">Btech</option>
                            <option value="Bcom">Bcom</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="BSC">BSC</option>
                            <option value="BA">BA</option>
                        </select>
                 <?php     }

                      ?></td>
                      <!-- <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo $subservid.'#'.strtolower($subservexp[$k]);?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td> #CH --Replaced by below code by Anees M A on Feb 26, 2021-->

                      <!--Added by Anees M A on Feb 26, 2021--->
                      <td><input onkeypress="return /[0-9]/i.test(event.key)" type="text" class="form-control vbhj" onkeyup="clchk(this)" name="<?php echo str_replace("-","_",strtolower($subservexp[$k]));?>" value="" data-chomn="<?php echo strtolower($subservexp[$k]);?>" id="vbs<?php echo strtolower($subservexp[$k]);?>"></td>
                  </tr>
                  <?php
              }
              ?>
              <!-- </td> #CH Disabled by Anees On Feb 26, 2021-->
          </tr>
          <?php
                 $i++;
      }
      ?>
      
      
      </table>
  </div>
<!-- </form> -->

</div>
<div class="col-lg-12">
  <button type="submit" class="btn btn-primary" id="add_client" style="width: 40%; margin-left: 30%; margin-right: 30%">Submit</button>
  </div>      
</div>
</div>
</form>
<!--drop box applications few st-->
    <!--<div class="form-title">Application Management System</div>-->
    <div  class="task_tabl">
                <table class="tbl_data" id="appl-entry">
                    <th>Sl No.</th>
                    <th>Application ID</th>
                    <th>GQG Reference ID</th>
                    <th>Employee Name</th>
                    <th>Date/Time</th>
                    <th>Documents</th>
                    <th>Remarks</th>
                    <th>Action</th>
                    <?php 
                    $a=1;
                    $comple='completed';
                    $aplsel=mysqli_query($con,"select * from applications where client_id='$log_id' && status !='$comple' order by id DESC");
                    $slNo = 1;
                    while($aplselres=mysqli_fetch_assoc($aplsel)){
                        $ampmtim=$aplselres['time'];
                        $ampmtim2=date("g:i a", strtotime($ampmtim));
                        $cabv=$aplselres['ref_id'];
                        //selection of applic
                        $candref=mysqli_query($con,"select * from applic_entry where appl_id='$cabv'");
                        $candrefres=mysqli_fetch_assoc($candref);
                        ?>
                        <tr>
                            <td><?php echo $slNo; ?></td>
                            <td><?php echo $aplselres['ref_id'];?></td>
                            <td><?php echo $candrefres['cand_ref_id'];?></td>
                            <td><?php echo strtoupper($aplselres['emp_name']);?></td>
                            <td><?php echo $aplselres['date'].' '.$ampmtim2;?></td>
                            <td>
                                <?php 
                                $docs=$aplselres['docs'];
                                $docsexp=explode(',',$docs);
                                $docnt=count($docsexp)-1;
                                
                                $y=0;
                                $h=1;
                                for($y=0; $y < $docnt; $y++){
                                    ?>
                                    <a href="http://www.goldquestglobal.in/<?php echo $docsexp[$y];?>" class="docstyl" target="_blank">Doc&nbsp;<?php echo $h;?></a>&nbsp;
                                    <?php
                                    $h++;
                                }
                                ?>
                            </td>
                            <td><?php echo $aplselres['apl_rmrk'];?></td>
                            <td>
                                <button class="btn btn-warning" onclick="editdrop(this)" data-drlogid="<?php echo $log_id;?>" data-edaplid="<?php echo $aplselres['ref_id'];?>">Edit</button>
                                <button class="btn btn-danger delete-entry" value="<?php echo $aplselres['ref_id'];?>" data-appl_id="<?php echo $aplselres['ref_id'];?>">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $a++;$slNo++;
                    }
                    ?>
                </table>
            </div>
<!--drop box applications few ed-->
    <?php
}
elseif($frnme == 'apmng'){
    ?>
    <div class="form-title page-title">Application Management System</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <!--<th>SL No</th>-->
                    <th>Application ID</th>
                    <th>Client Code</th>
                    <th>GQG Reference ID</th>
                    <th>Date/Time</th>
                    <th>Employee Name</th>
                    <!--<th>Date/Time</th>-->
                    <?php 
                    $seserv=mysqli_query($con,"select * from clent_details where client_id='$log_id' order by id DESC");
                    $seservres=mysqli_fetch_assoc($seserv);
                    $serffnme=$seservres['service_name'];
                    $seservexp=explode(',',$serffnme);
                    $servtcnt=count($seservexp)-1;
                    $d=0;
                    for($d=0; $d < $servtcnt; $d++){
                        $servhas=explode('#',$seservexp[$d]);
                        $serfnnme=$servhas[1];
                        ?>
                        <th class="servclr"><?php echo strtoupper($serfnnme);?></th>
                        <?php
                    }
                    ?>
                    <th>Overall Status</th>
                    <th>Download Report</th>
                    
                    <?php 
                    $a=1;
                    $aplsel=mysqli_query($con,"select * from applications where client_id='$log_id' && status='completed' order by id DESC");
                    while($aplselres=mysqli_fetch_assoc($aplsel)){
                        $appic_id=$aplselres['ref_id'];
                        $ampmsd=$aplselres['date'];
                        $ampmsdtim=$aplselres['time'];
                        $ampmsd2=date("g:i a",strtotime($ampmsdtim));
                        $appicqry=mysqli_query($con,"select * from applic_entry where appl_id='$appic_id'");
                        $appicqryres=mysqli_fetch_assoc($appicqry);
                        $over_all_sta=$appicqryres['over_status'];
                        ?>
                        <tr>
                            <!--<td class="seppad"><?php echo $a;?></td>-->
                            <td class="seppad"><?php echo $aplselres['ref_id'];?></td>
                            <td class="seppad"><?php echo $aplselres['client_uid'];?></td>
                            <td><?php echo $appicqryres['cand_ref_id'];?></td>
                            <td><?php echo $ampmsd.' '.$ampmsd2;?></td>
                            <td class="seppad"><?php echo strtoupper($aplselres['emp_name']);?></td>
                            <!--<td class="seppad"><?php echo $aplselres['date'].' '.$aplselres['time'];?></td>-->
                            <?php 
                            $d=0;
                            for($d=0; $d < $servtcnt; $d++){
                            $servhas=explode('#',$seservexp[$d]);
                            $serfnnme=$servhas[1];
                            $serund=explode('-',$serfnnme);
                            $serfnnme=implode('_',$serund);
                            ?>
                            <td class="seppad"><?php echo strtoupper($aplselres[$serfnnme]);?></td>
                            <?php
                            }
                            ?>
                            <td class="seppad">
                                <?php 
                                echo strtoupper($over_all_sta);
                                ?>
                            </td>
                            <td class="seppad">
                                <?php 
                                if($over_all_sta == 'completed'){
                                  ?>
                                  <a href="http://www.goldquestglobal.in/pdf/rpt.php?reff_id=<?php echo $appic_id;?>" class="docstyl" target="_blank">FINAL REPORT</a>
                                  <?php
                                }
                                else{
                                    echo 'NOT READY';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $a++;
                    }
                    ?>
                </table>
            </div>
    <?php
}
elseif($frnme == 'support'){
    ?>
    <div class="form-title page-title">Support</div>
    <div class="task_tabl">
        <div> Dear Client, <br>We assure you committed & professional ISO Certified BGV Services at all times. Feel Free to contact below all your queries & questions
        that cross your mind & i'll be glad to assist.
        <ul>
            <li>Indian Scope of Services</li>
            <li>Change in Scope of Service / Additional Services</li>
            <li>Esclation Matrix</li>
            <li>24/7 Support</li>
            <li>Any Insufficiency</li>
            <li>Single Point of Contacts</li>
            <li>International Scope of Services</li>
        </ul>
        We request you to call <strong>Key Accounts Manager Mrs. Aarti Mohan (7904847400)</strong> from Monday to Saturday 9.30 AM to 6.30 PM, or <strong>Manjunath (9738812694)</strong> Head Business Excellence 24/7.
        </div><br>
                <table class="tbl_data">
                    <!--<th>SL No</th>-->
                    <th>Level</th>
                    <th>Relations</th>
                        <tr>
                            <td>1st Level</td>
                            <td class="sprsty"><span style="color:#3d75a4">Mrs. Aarti Mohan</span></td>
                        </tr>
                        <tr>
                            <td>SPOC</td>
                            <td class="sprsty">Key Accounts Manager
                            <br>Landline No : 080 48663693 / Mobile No : 7904847400
                            <br>Email ID – bgvcst@goldquestglobal.in / aarti@goldquestglobal.in
                            </td>
                        </tr>
                        <tr>
                            <td>2nd Level</td>
                            <td  class="sprsty"><span style="color:#3d75a4">Mr. Manjunath H S</span>
                            <br>Head Business Excellence
                            <br>Mobile No :  9738812694
                            <br>Email ID -  manjunath@goldquestglobal.in
                            </td>
                        </tr>
                        <tr>
                            <td>3rd Level</td>
                            <td  class="sprsty"><span style="color:#3d75a4">Mr. Jaykumar</span>
                            <br>Chairman
                            <br>Email ID - hr@goldquestglobal.com / chairman@goldquestglobal.com
                            </td>
                        </tr>
                     
                </table>
            </div>
    <?php
}
elseif($frnme == 'profiledata'){
    ?>
    <div class="form-style">
     <div class="form-title">My Profile</div>
     <?php
     $prosel=mysqli_query($con,"select * from clent_details where client_id='$log_id'");
     $profres=mysqli_fetch_assoc($prosel);
     $client_id=$profres['client_id'];
     $company_name=$profres['company_name'];
     $address=$profres['address'];
     $mobile=$profres['mobile'];
     $email=$profres['email'];
     $contact_person=$profres['contact_person'];
     $role=$profres['role'];
     $gst=$profres['gst'];
     
     //service names st
     $servi_name=$profres['service_name'];
     $servi_nameexp=explode(',',$servi_name);
     $servcnt=count($servi_nameexp)-1;
     
     $servi_price=$profres['service_price'];
     $servi_priceexp=explode(',',$servi_price);
     //service names ed
     
     echo $clientid;
     ?>
 <form action="profileupdate.php" method="post">
  <div class="form-group">
    <label for="cmpnme">Company Name:</label>
    <input type="text" name="company_name" placeholder="<?php echo $company_name ;?>" value="<?php echo $company_name ;?>" class="form-control" id="cmpnme" disabled>
  </div>
  <div class="form-group">
    <label for="cliaddr">Address:</label>
    <input type="text" name="address" placeholder="<?php echo $address ;?>" value="<?php echo $address ;?>"  class="form-control" id="cliaddr">
  </div>
  <div class="form-group">
    <label for="climob">Mobile:</label>
    <input type="text" name="mobile" placeholder="<?php echo $mobile ;?>" value="<?php echo $mobile ;?>" class="form-control" id="climob">
  </div>
   <div class="form-group">
    <label for="cliemail">Email:</label>
    <input type="text" name="email" placeholder="<?php echo $email ;?>" value="<?php echo $email ;?>" class="form-control" id="cliemail">
  </div>
   <div class="form-group">
    <label for="clicontact">Contact Person:</label>
    <input type="text" name="contact_person" placeholder="<?php echo $contact_person ;?>" value="<?php echo $contact_person ;?>" class="form-control" id="clicontact">
  </div>
   <div class="form-group">
    <label for="clirole">Role:</label>
    <input type="text" name="role" placeholder="<?php echo $role ;?>" value="<?php echo $role ;?>" class="form-control" id="clirole">
  </div>
    <div class="form-group">
    <label for="cligst">GST:</label>
    <input type="text" name="gst" placeholder="<?php echo $gst ;?>" value="<?php echo $gst ;?>" class="form-control" id="cligst">
  </div>
  
  <div class="form-group">
    <lable>Selected Services:</lable><br>
    <?php 
    $i=0;
    for($i=0; $i<$servcnt; $i++){
        ?>
        <input type="text" name="servck" id="servck" value="<?php echo strtoupper($servi_nameexp[$i]);?>" disabled>&nbsp;&nbsp;
        <input type="text" name="servval" id="servval" value="<?php echo $servi_priceexp[$i];?>" disabled><br>
        <?php
    }
    ?>
  </div>
  <input type="hidden" name="client_id" value="<?php echo $client_id ;?>" >
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <?php
}
elseif($frnme == 'sermngmt'){
    ?>
    <div class="form-title">Service Management</div>
    <div class="task_tabl">
                <table class="tbl_data">
                    <th>Service ID</th>
                    <th>Service Name</th>
                    <th>Actual Amount</th>
                    <th>Offer Amount</th>
                    <th>Action</th>
                    <tr>
                        <td>5899665</td>
                        <td>Education Check</td>
                        <td>10000</td>
                        <td>7000</td>
                        <td><button id="update" onclick="shpupd(this)" data-shupi="<?php echo $shpres['shop_id'];?>" class="btn btn-warning">Update</button>
                        <button id="delete" onclick="shpdel(this)" data-shdeli="<?php echo $shpres['shop_id'];?>" class="btn btn-danger">Delete</button></td>
                    </tr>
                </table>
            </div>
    <?php
}
?>

<!--add client confirmation popup for delete application entry-->
                <div class="modal fade" id="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div id="timescl" class="close" data-dismiss="modal" style="cursor:pointer">&times;</div>
                            </div>
                            <div class="modal-body">
                                <div class="bx_title" style="text-align:center">Are you Sure Want to Submit?</div>
                                <div class="bx_butn" style="text-align:center"><button id="yes_sub" class="btn btn-success">Yes</button>&nbsp;&nbsp;<button id="no_sub" class="btn btn-danger">No</button></div>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!--add client confirmation popup for delete application entry-->

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

<!--edit drop application st-->
<script>
      function editdrop(eddrpp){
                var dropid=$(eddrpp).data('edaplid');
                var droplogid=$(eddrpp).data('drlogid');
                $.ajax({
                    url: 'editdropapl.php',
                    type: 'post',
                    data: {dropid:dropid,droplogid:droplogid},
                    beforeSend: function(){
                        $('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
                    },
                    success: function(resp){
                        $('.right .right_con').html(resp);
                    }
                })
            }
</script>
<!--edit drop application ed-->


<!--attach documents st-->
<script>        
/*$("#agrbrw").on('change', function () {

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
    /*$(document).ready(function(){
        $('#agrupl').click(function(){
            $('#agrbrw').trigger('click');
            
        })
    })*/
</script>
<!--attach documents ed-->

<script>
    $(document).ready(function(){
        $('#creapbid').click(function(){
            var empl_name=$('#empnme').val();
            var file_len=$('#mudcs').val();
            if(file_len != '' && empl_name != ''){
                $('#chkclk').trigger('click');
            }
            else{
                alert('Please fill all required fields');
            }
        })
        $('#yes_sub').click(function(){
            $('#yes_sub').attr("disabled", true);
            $('#creatappsubf').submit();
        })
        
        $('#no_sub').click(function(){
            /*$('.bx_1').hide(1000);*/
            $('#timescl').trigger('click');
        })
    })
</script>
<script>
    $(document).ready(function(){
        $('#pusurl').click(function(){
            window.history.pushState("object or string", "Title", "/#");
        })
    })

    $('.delete-entry').click(function(){
        if(confirm("Are you sure, you want to delete?")){
        let ref_id=$(this).val();

       var row = $(this).parents().eq(1);

        $.ajax({
          url: 'delete-application-entry.php',
          type: 'post',
          data: {ref_id:ref_id},
          beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
          },
          success: function(resp){
            //console.log(resp);
            if(resp=='false'){
               alert('Deleting failed');
            }else{
                $(row).remove();
                alert('Deleted successfully');
                }
            }
        })
      }
    })

  function clchk(gtum){
    
    var ghk=$(gtum).data('chomn');
    var isChecked = $('#'+ghk).is(":checked");
    if (isChecked) {
        /*alert("CheckBox checked.");*/
    } else {
        $('#vbs'+ghk).val('');
        $(gtum).val('');
        alert('Please check required service first!');
    }
  }

  function pgUgChange(id){
    if(id=='pg-dropdown'){
      if($('#post-graduation').prop('checked') == false){
        $("#pg-dropdown option:selected").prop("selected", false);
        alert('Check Post Graduation!');
      }
    }else if(id=='ug-dropdown'){
      if($('#graduation').prop('checked') == false){
        $("#ug-dropdown option:selected").prop("selected", false);
        alert('Check Graduation!');
      }
    }
  }

  $('#post-graduation:checkbox').on('change',function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked)
    $("#pg-dropdown option:selected").prop("selected", false);
  });
  $('#graduation:checkbox').on('change',function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked)
    $("#ug-dropdown option:selected").prop("selected", false);
  }); 

  $(document).on('click','#submitcdb_btn',function(e){
    e.preventDefault();
    let mobNo  = $('#mobile_number').val();
    let email = $('#email_id').val();
    $.ajax({
            url: 'checkduplicate.php',
            type: 'post',
            dataType: 'json',
            data: {mob_no:mobNo,email:email,type:'client dropbox'},
            beforeSend: function(){
                //$('.right .right_con').html('<img src="images/ezgif-2-6d0b072c3d3f.gif" style="width:350px">');
            },
            success: function(res){
                //$('.right .right_con').html(resp);
                console.log(res);
                if(res.status==0){
                  let element = document.getElementById("submitcdb");
                  element.scrollIntoView();
                  if(res.mob==0){
                    $('#dp-mobile').show();
                  }else{
                    $('#dp-mobile').hide();
                  }
                  if(res.email==0){
                    $('#dp-email').show();
                  }else{
                    $('#dp-email').hide();
                  }

                }else if(res.status==1){
                  $("#submitcdb").submit();
                  $('#dp-mobile').hide();
                  $('#dp-email').hide();
                }
            },
            error: function(xhr,textStatus,errorThrown){
               console.log("ERROR : ", errorThrown);
               console.log("ERROR : ", xhr);
            }
        })
  })

</script>