<?php 
include 'config.php';

$post = $_POST;
if(isset($_POST['services'])){
  foreach ($_POST['services'] as $key => $value) {
    $services[$value] = $_POST[$value];
  }
  $servicesJson = json_encode($services);
}else{
  $servicesJson = NULL;
}

extract($_POST);
$fullName = $personal_information['full_name'];
$MobNo = $personal_information['pa_mb_no'];
$candidate_location = $personal_information['current_address'];
$pi = $personal_information;
$ed = $education_details;
$emp = $employment_details;
$personal_information = json_encode($personal_information);
$education_details = json_encode($education_details);
$employment_details = json_encode($employment_details);
$updatedDateTime = date("Y-m-d h:i:s");
$declaration_date = date('Y-m-d',strtotime($declaration_date));

//time st//
$fileIncr = 0;
$attachmentArray = [];
$eduDocs = $empDocs = array();
if(isset($_FILES)){
  foreach ($_FILES as $key => $file) {
    if($key == 'govt_id'){
      $idDocName = $_FILES['govt_id']['name'];
      $source = $_FILES['govt_id']['tmp_name'];
      $ext = pathinfo($idDocName, PATHINFO_EXTENSION);
      $random=rand(99999,10000);
      $docRANDM=$client_id.$candidate_id.$random.time();
      $docDir = APP_FILE_PATH.'assets/candidate/'.$client_id.'/'.$candidate_id.'/govt_id/';
      if(!is_dir($docDir)){
        mkdir($docDir,0777,true);
      }
      $docRANDFS=$docRANDM.'.'.$ext;
      $target = "$docDir".$docRANDFS;
      move_uploaded_file($source, $target);
      $idDocpath='assets/candidate/'.$client_id.'/'.$candidate_id.'/govt_id/'.$docRANDFS;//Set for db update
      $attachmentArray[$fileIncr]['path'] = $idDocpath;
      $attachmentArray[$fileIncr]['name'] = $docRANDFS;
      $fileIncr++;
    }elseif($key == 'education_details'){
      $flag = 1;
      foreach($_FILES["education_details"]["tmp_name"]["edu_docs"] as $key=>$file) {
        $docName = $_FILES["education_details"]["name"]["edu_docs"][$key];
        $source = $_FILES["education_details"]["tmp_name"]["edu_docs"][$key];
        
        $ext = pathinfo($docName, PATHINFO_EXTENSION);
                    
        $docRANDMR=rand(99999,10000);
        $docRANDM=$client_id.$candidate_id.$docRANDMR.time().'-'.$flag;
        $docDir = APP_FILE_PATH.'assets/candidate/'.$client_id.'/'.$candidate_id.'/education/';
        if(!is_dir($docDir)){
            mkdir($docDir,0777,true);
        }
        $docRANDFS=$docRANDM.'.'.$ext;
        $target = "$docDir".$docRANDFS;
        move_uploaded_file($source, $target);
                    

        $docpath = $docRANDFS;
        $docN='assets/candidate/'.$client_id.'/'.$candidate_id.'/education/'.$docpath;
        array_push($eduDocs,$docN);
        $flag++;

        $attachmentArray[$fileIncr]['path'] = $docN;
        $attachmentArray[$fileIncr]['name'] = $docRANDFS;
        $fileIncr++;
        
      }
      $eduDocs = json_encode($eduDocs);//Set for db update
    }elseif($key == 'employment_details'){
      $flag = 1;
      foreach($_FILES["employment_details"]["tmp_name"]["emp_docs"] as $key=>$file) {
        $docName = $_FILES["employment_details"]["name"]["emp_docs"][$key];
        $source = $_FILES["employment_details"]["tmp_name"]["emp_docs"][$key];
        
        $ext = pathinfo($docName, PATHINFO_EXTENSION);
                    
        $docRANDMR=rand(99999,10000);
        $docRANDM=$client_id.$candidate_id.$docRANDMR.time().'-'.$flag;

        $docDir = APP_FILE_PATH.'assets/candidate/'.$client_id.'/'.$candidate_id.'/employment/';
        if(!is_dir($docDir)){
            mkdir($docDir,0777,true);
        }
        $docRANDFS=$docRANDM.'.'.$ext;
        $target = "$docDir".$docRANDFS;
        move_uploaded_file($source, $target);
                    

        $docpath = $docRANDFS;
        $docN='assets/candidate/'.$client_id.'/'.$candidate_id.'/employment/'.$docpath;
        
        array_push($empDocs,$docN);
        $attachmentArray[$fileIncr]['path'] = $docN;
        $attachmentArray[$fileIncr]['name'] = $docRANDFS;
        $flag++;$fileIncr++;
        
      }
      $empDocs = json_encode($empDocs);//Set for db update
    }elseif($key == 'signature'){
      $docName = $_FILES['signature']['name'];
      $source = $_FILES['signature']['tmp_name'];
      $ext = pathinfo($docName, PATHINFO_EXTENSION);
      $random=rand(99999,10000);
      $docRANDM=$client_id.$candidate_id.$random.time();
      $docDir = APP_FILE_PATH.'assets/candidate/'.$client_id.'/'.$candidate_id.'/signature/';
      if(!is_dir($docDir)){
        mkdir($docDir,0777,true);
      }
      $docRANDFS=$docRANDM.'.'.$ext;
      $target = "$docDir".$docRANDFS;
      move_uploaded_file($source, $target);
      $signaturePath='assets/candidate/'.$client_id.'/'.$candidate_id.'/signature/'.$docRANDFS;//Set for db update
      $attachmentArray[$fileIncr]['path'] = $signaturePath;
      $attachmentArray[$fileIncr]['name'] = $docRANDFS;
      $fileIncr++;
    }
  }
}

$qry=mysqli_query($con,"UPDATE candidate_application SET position_applied='$applied_position',job_location='$job_location',govt_id='$idDocpath',candidate_name='$fullName',mobile_number='$MobNo',candidate_location='$candidate_location',personal_info='$personal_information',edu_qualification_details='$education_details',employment_details='$employment_details',edu_docs='$eduDocs',emp_docs='$empDocs',signature='$signaturePath',declaration_name='$name_declaration',declaration_date='$declaration_date',updated_date='$updatedDateTime' WHERE client_id = '$client_id'");

if($qry){
  include 'candidate_form_pdf.php';
  header("Location: ".APP_PATH."/candidate-portal.php?client_id=".$client_id."&cid=".$candidate_id."&application=".true);
}else{
  header("Location: ".APP_PATH."/candidate-portal.php?client_id=".$client_id."&cid=".$candidate_id."&application=".false);
}
exit;
?>