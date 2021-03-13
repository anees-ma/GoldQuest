<?php 
include 'config.php';
include 'autoblock.php';
include 'timelnoti.php';

include 'header.php';

if(isset($_GET['client_id'])){
  $client_id = $_GET['client_id'];
  $candidate_id = $_GET['cid'];
  $clientsql=mysqli_query($con,"select company_name from clent_details where client_id='$client_id'");
  $clientres=mysqli_fetch_assoc($clientsql);
  $company_name=$clientres['company_name'];

  $candidate_email_qry=mysqli_query($con,'select email_id from candidate_application where id='.$_GET["cid"]);
  $candidate_email=mysqli_fetch_assoc($candidate_email_qry)['email_id'];
}else{
  header('http://www.goldquestglobal.in/');
}
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>GoldQuest Verification Tracking System-VTS</title>
    </head>
    <body>
        <header class="head">
            <a href="http://www.goldquestglobal.in"><p style="text-align: center">GoldQuest Verification Tracking System-VTS</p></a><span class="log">&nbsp;<a href="http://www.goldquestglobal.in"></a></span>
        </header>

        <form action="candidate_application.php" method="post" enctype="multipart/form-data" id="candidate-application-form">
          <input type="hidden" name="client_id" value="<?php echo $_GET['client_id']?>">
          <input type="hidden" name="candidate_id" value="<?php echo $_GET['cid']?>">
          <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
          <input type="hidden" name="candidate_email" value="<?php echo $candidate_email; ?>">
           <div class="container" style="margin-top: 25px;">
              <div class="">
                     <div class="col-lg-12">
                        <h4 class="form-title" style="color: #3e76a5;font-size: 27PX;">Create Application</h4>
                     </div>
                  <div class="row gen-section">
                    <div class="col-lg-12">
                      <h5>Company name: <span style="font-size: 16px;"><?php echo $company_name; ?></span></h5>
                   </div>
                 </div>
                   
                   <div class="row gen-section">
                     <div class="col-lg-6 form-group">
                        <label for="applied_position">Position Applied For:</label>
                        <input type="text" value="" class="form-control" id="applied_position" name="applied_position">
                     </div>

                     <div class="col-lg-6 form-group">
                        <label for="job_location">Job Location:</label>
                        <input type="text" value="" class="form-control" id="job_location" name="job_location">
                     </div>

                     <div class="col-lg-12 form-group">
                        <label>Attach Govt. ID Proof: <span style="color:red">*</span></label>
                        <input type="file" class="form-control" name="govt_id">
                     </div>
                   </div>

                   <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px">
                      <h4 class="text-center">Personal Information</h4>
                   </div>
                   <div class="row gen-section">

                     <div class="col-lg-6 form-group">
                        <label for="full_name">Full Name as per Govt ID Proof(first, middle, last):</label>
                        <input type="text" value="" class="form-control" id="full_name" name="personal_information[full_name]">
                     </div>

                     <div class="col-lg-6 form-group">
                        <label for="full_name">Former Name/ Maiden Name(if applicable):</label>
                        <input type="text" value="" class="form-control" id="full_name" name="personal_information[former_name]">
                     </div>

                     <div class="col-lg-6 form-group">
                        <label for="father_name">Father's Name:</label>
                        <input type="text" value="" class="form-control" id="father_name" name="personal_information[father_name]">
                     </div>

                     <div class="col-lg-6 form-group">
                        <label for="dob">DOB:</label>
                        <input type="date" class="date-general form-control" name="personal_information[dob]" id="dob" value="" max="">
                     </div>

                     <div class="col-lg-4">
                          <p>Gender:</p>
                         <div class="form-check-inline">
                            <label class="form-check-label" for="male">
                              <input type="radio" class="form-check-input" id="male" name="personal_information[gender]" value="male">Male
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label" for="female">
                              <input type="radio" class="form-check-input" id="female" name="personal_information[gender]" value="female">Female
                            </label>
                          </div>
                      </div>

                      <div class="col-lg-8 form-group">
                        <label for="ssn">Social Security Number(if applicable):</label>
                        <input type="text" class="form-control" name="personal_information[ssn]" id="ssn" value="">
                     </div>

                     <div class="col-lg-4 form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" class="form-control" name="personal_information[nationality]" id="nationality" value="">
                     </div>

                     <div class="col-lg-4 form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" name="personal_information[marital_status]" id="marital_status">
                          <option></option>
                          <option value="Married">Married</option>
                          <option value="Single">Single</option>
                        </select>
                      </div>

                      <div class="col-lg-4 form-group">
                          <label for="current_address">Current Address</label>
                          <textarea class="form-control" id="current_address" name="personal_information[current_address]" rows="1"></textarea>
                      </div>

                      <div class="col-lg-12 form-group">
                          <p>Period Of Stay:</p>
                          <div class="col-lg-6" style="float: left">
                            <label for="ps_from_date">From Date:</label>
                            <input type="date" class="date-general form-control" name="personal_information[ps_from_date]" id="ps_from_date" value="" max="">
                          </div>
                          <div class="col-lg-6" style="float: left">
                            <label for="ps_to_date">To Date:</label>
                            <input type="date" class="date-general form-control" name="personal_information[ps_to_date]" id="ps_to_date" value="" max="">
                          </div>
                      </div>

                      <div class="col-lg-12 form-group">
                          <p>Contact Details For Verification:</p>
                          <div class="col-lg-6" style="float: left">
                            <label for="residence_landline_number">Residence Number:</label>
                            <input type="number" class="form-control" name="personal_information[residence_landline_number]" id="residence_landline_number" value="" max="">
                          </div>
                          <div class="col-lg-6" style="float: left">
                            <label for="mb_no">Mobile Number:</label>
                            <input type="number" class="form-control" name="personal_information[mb_no]" id="mb_no" value="" max="">
                            <p style="color: red; display: none" id="dp-mobile">Duplicate mobile number</p>
                          </div>
                      </div>

                      <div class="col-lg-6 form-group">
                          <label for="permanent_address">Permanent Address</label>
                          <textarea class="form-control" id="permanent_address" name="personal_information[permanent_address]" rows="3"></textarea>
                      </div>

                      <div class="col-lg-6 form-group">
                          <p>Period Of Stay:</p>
                          <div class="col-lg-6" style="float: left">
                            <label for="pa_ps_from_date">From Date:</label>
                            <input type="date" class="date-general form-control" name="personal_information[pa_ps_from_date]" id="pa_ps_from_date" value="" max="">
                          </div>
                          <div class="col-lg-6" style="float: left">
                            <label for="pa_ps_to_date">To Date:</label>
                            <input type="date" class="date-general form-control" name="personal_information[pa_ps_to_date]" id="pa_ps_to_date" value="" max="">
                          </div>
                      </div>

                      <div class="col-lg-12 form-group">
                          <p>Contact Details For Verification:</p>
                          <div class="col-lg-6" style="float: left">
                            <label for="pa_residence_landline_number">Residence Number:</label>
                            <input type="number" class="form-control" name="personal_information[pa_residence_landline_number]" id="pa_residence_landline_number" value="" max="">
                          </div>
                          <div class="col-lg-6" style="float: left">
                            <label for="pa_mb_no">Mobile Number:</label>
                            <input type="number" class="form-control" name="personal_information[pa_mb_no]" id="pa_mb_no" value="" max="">
                          </div>
                      </div>
                   </div>
                   <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px">
                        <h4 class="text-center">Educational Qualification</h4>
                     </div>
                   
                    <div class="edu-sec-outer">
                      <div class="row gen-section edu-section">
                          <div class="col-lg-4 form-group cl">
                            <label>College Name:</label>
                            <input type="text" class="form-control" name="education_details[college_name][]" value="">
                          </div>

                          <div class="col-lg-4 form-group">
                              <label>College Address:</label>
                              <textarea class="form-control" name="education_details[college_address][]" rows="1"></textarea>
                          </div>

                          <div class="col-lg-4 form-group">
                            <label>Qualification Gained:</label>
                            <input type="text" class="form-control" name="education_details[qualification_gained][]" value="">
                          </div>

                          <div class="col-lg-6 form-group">
                            <label for="part_full_time">Part Time/ Full Time:</label>
                            <select class="form-control" name="education_details[part_full_time][]">
                              <option></option>
                              <option value="Full time">Full Time</option>
                              <option value="Part time">Part Time</option>
                            </select>
                          </div>

                          <div class="col-lg-6 form-group">
                            <label>ID/ ROll No:</label>
                            <input type="text" class="form-control" name="education_details[roll_no][]" value="">
                          </div>

                          <div class="col-lg-12 form-group">
                              <p>Dates Attended:</p>
                              <div class="col-lg-6" style="float: left">
                                <label>From Date:</label>
                                <input type="date" class="date-general form-control" name="education_details[dates_attended_from_date][]" value="" max="">
                              </div>
                              <div class="col-lg-6" style="float: left">
                                <label>To Date:</label>
                                <input type="date" class="date-general form-control" name="education_details[dates_attended_to_date][]" value="" max="">
                              </div>
                          </div>

                          <div class="col-lg-12 form-group">
                            <label>Attach Certificate(s): <span style="color:red">*</span></label>
                            <input type="file" class="form-control" name="education_details[edu_docs][]"  multiple>
                         </div>

                         <div class="col-lg-12 mt-5">
                          <p>Mark the documents submitted for this qualification along with this form:</p>
                           <div class="form-check-inline mr-5">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="education_details[edu_marksheet][]">Marksheet
                              </label>
                            </div>
                            <div class="form-check-inline mr-5 ml-5">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="education_details[edu_provosional_certificate][]">Provisional Certificate
                              </label>
                            </div>
                            <div class="form-check-inline mr-5 ml-5">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="education_details[edu_degree_certificate][]">Degree Certificate
                              </label>
                            </div>
                            <div class="form-check-inline ml-5">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="1" name="education_details[edu_none][]">None
                              </label>
                            </div>
                         </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-12">
                       <span class="add-edu-sec" style="float:right">+ADD</span>
                     </div>
                   </div>

                   <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px">
                        <h4 class="text-center">Employment History</h4>
                     </div>

                     <div class="emp-sec-outer">
                      <div class="row gen-section emp-section">
                        <div class="col-lg-4 form-group cl">
                            <label>Current Employer Name:</label>
                            <input type="text" class="form-control" name="employment_details[current_employer_name][]" value="">
                          </div>

                          <div class="col-lg-4 form-group">
                              <label>Current Employer Address:</label>
                              <textarea class="form-control" name="employment_details[current_employer_address][]" rows="1"></textarea>
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Telephone No:</label>
                            <input type="number" class="form-control" name="employment_details[employee_tel][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Candidate Employee ID/ No:</label>
                            <input type="text" class="form-control" name="employment_details[employee_code][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Designation:</label>
                            <input type="text" class="form-control" name="employment_details[employee_designation][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Department:</label>
                            <input type="text" class="form-control" name="employment_details[employee_department][]" value="">
                          </div>

                          <div class="col-lg-12 form-group">
                              <p>Employment Period:</p>
                              <div class="col-lg-6" style="float: left">
                                <label>From Date:</label>
                                <input type="date" class="date-general form-control" name="employment_details[employment_period_from_date][]" value="" max="">
                              </div>
                              <div class="col-lg-6" style="float: left">
                                <label>To Date:</label>
                                <input type="date" class="date-general form-control" name="employment_details[employment_period_to_date][]" value="" max="">
                              </div>
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Manager's Name:</label>
                              <input type="text" class="form-control" name="employment_details[manager_name][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Manager's Contact No:</label>
                              <input type="number" class="form-control" name="employment_details[manager_contact_no][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Manager's Contact Email:</label>
                            <input type="email" class="form-control" name="employment_details[manager_email][]" value="">
                          </div>

                          <div class="col-lg-4 form-group">
                              <label>Duties & Responsibilities:</label>
                              <textarea class="form-control" name="employment_details[duties_responsibilities][]" rows="1"></textarea>
                          </div>

                          <div class="col-lg-4 form-group">
                              <label>Reasons for leaving:</label>
                              <textarea class="form-control" name="employment_details[reason_leaving][]" rows="1"></textarea>
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>First Salary Drawn:</label>
                            <input type="text" class="form-control" name="employment_details[first_salary][]" value="">
                          </div>

                          <div class="col-lg-4 form-group cl">
                            <label>Second Salary Drawn:</label>
                            <input type="text" class="form-control" name="employment_details[second_salary][]" value="">
                          </div>

                          <div class="col-lg-4 form-group">
                            <label>Position Type:</label>
                            <select class="form-control" name="employment_details[position_type][]">
                              <option></option>
                              <option value="Permanent">Permanent</option>
                              <option value="Temporary">Temporary</option>
                              <option value="Contractual">Contractual</option>
                            </select>
                          </div>

                          <div class="col-lg-4 form-group">
                              <label>Agency Details:</label>
                              <textarea class="form-control" name="employment_details[agency_details][]" rows="1" placeholder="If temporary or contractual"></textarea>
                          </div>

                          <div class="col-lg-12 form-group">
                            <label>Attach Certificate(s): <span style="color:red">*</span></label>
                            <input type="file" class="form-control" name="employment_details[emp_docs][]"  multiple>
                         </div>

                          <div class="col-lg-12 mt-5">
                            <p>Mark the documents submitted for this employment:</p>
                             <div class="form-check-inline mr-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="1" name="employment_details[emp_service_certificate][]">Service Certificate
                                </label>
                              </div>
                              <div class="form-check-inline mr-5 ml-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="1" name="employment_details[emp_relieving_letter][]">Relieving Letter
                                </label>
                              </div>
                              <div class="form-check-inline mr-5 ml-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" name="employment_details[emp_offer_letter][]">Offer Letter
                                </label>
                              </div>
                              <div class="form-check-inline mr-5 ml-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" name="employment_details[emp_other_doc][]">Any Other
                                </label>
                              </div>
                              <div class="form-check-inline ml-5">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" name="employment_details[emp_none][]">None
                                </label>
                              </div>
                           </div>
                       </div>
                     </div>

                     <div class="row">
                       <div class="col-lg-12">
                         <span class="add-emp-sec" style="float:right">+ADD</span>
                       </div>
                     </div>

                     <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px">
                        <h4 class="text-center">Declaration and Authorization</h4>
                     </div>

                     <div class="row gen-section">
                        <div class="col-lg-12 mb-5">
                          <p class="mb-5">
                            I hereby authorize GoldQuest Global HR Services Private Limited and its representative to verify information provided in my application for employment and this
employee background verification form, and to conduct enquiries as may be necessary, at the company’s discretion. I authorize all persons who may have
information relevant to this enquiry to disclose it to GoldQuest Global HR Services Pvt Ltd or its representative. I release all persons from liability on account of
such disclosure.<br><br>I confirm that the above information is correct to the best of my knowledge. I agree that in the event of my obtaining employment, my probationary appointment,
confirmation as well as continued employment in the services of the company are subject to clearance of medical test and background verification check done
by the company . </p>
                        </div>

                        <div class="col-lg-4 form-group">
                          <label>Attach Signature: <span style="color:red">*</span></label>
                          <input type="file" class="form-control" name="signature" id="signature"><br>
                          <!--<div id="pstPHfri" style="width:100%"></div>--> 
                       </div>

                       <div class="col-lg-4 form-group cl">
                          <label>Name:</label>
                          <input type="text" class="form-control" name="name_declaration" value="">
                        </div>

                        <div class="col-lg-4 form-group">
                          <label for="dob">Date:</label>
                          <input type="date" class="date-general form-control" name="declaration_date" value="" max="">
                       </div>
                     </div>

                     <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px">
                        <h5 class="text-center">Documents Required(Mandatory)</h5>
                     </div>

                     <div class="row gen-section pt-4">
                        <div class="col-lg-4">
                          <h6><i class="fa fa-graduation-cap mr-3"></i>Education</h6>
                          <p>Photocopy of degree certificate and final mark sheet of all examinations.</p>
                        </div>

                        <div class="col-lg-4">
                          <h6><i class="fa fa-briefcase mr-3"></i>Employment</h6>
                          <p>Photocopy of relieving / experience letter for each employer metioned in the form.</p>
                        </div>

                        <div class="col-lg-4">
                          <h6><i class="fa fa-id-card mr-3"></i>Government ID/ Address Proof</h6>
                          <p>Aadhaar Card / Bank Passbook /Passport Copy / Driving License / Voter ID.</p>
                        </div>
                   </div>

                   <div class="col-lg-12 pl-0 pr-0 mt-5 mb-5" style="margin-top: 20px; margin-bottom: 20px">
                        <button class="btn btn-primary mb-5" id="candidate-application-btn" type="submit" style="width: 100%;">Submit</button>
                     </div>
                     
                  </div>
               </div>
           </div>
        </form>
           
    </body>
<!--menu bar script st-->

<!--redirections st-->
<script src="http://www.goldquestglobal.in/js/app.js"></script>
<script type="text/javascript">
  var candidateId = '<?php echo $candidate_id; ?>';
  var isValidMobileNo = 1;
  $(document).on('blur','#mb_no',function(e){
    let mobNo  = $('#mb_no').val();
    $.ajax({
            url: 'checkduplicate.php',
            type: 'post',
            dataType: 'json',
            data: {mob_no: mobNo, cid:candidateId, type:'candidate portal'},
            beforeSend: function(){
                
            },
            success: function(res){
                console.log(res);
                if(res.status==0){
                  isValidMobileNo = 0;
                  let element = document.getElementById("mb_no");
                  element.scrollIntoView();
                  if(res.mob==0){
                    $('#dp-mobile').show();
                  }else{
                    $('#dp-mobile').hide();
                  }
                }else if(res.status==1){
                  isValidMobileNo = 1;
                  $('#dp-mobile').hide();
                }
            },
            error: function(xhr,textStatus,errorThrown){
               console.log("ERROR : ", errorThrown);
               console.log("ERROR : ", xhr);
            }
        })
  })
  $(document).on('click','#candidate-application-btn',function(e){
    if(isValidMobileNo==0){
      e.preventDefault();
      let element = document.getElementById("mb_no");
      element.scrollIntoView();
    }

  })
</script>
</html>
