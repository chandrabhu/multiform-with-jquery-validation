<?php 
/***
Page name : Individual Investor Form
Previous Page: Admin Log-In
Description : 
Database Table: 
*/


      $message = '';

      if(isset($_POST['email'])){

        //Personal Details
        $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
        $middle_name = mysqli_real_escape_string($conn,$_POST['middle_name']);
        $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $mobile_number = mysqli_real_escape_string($conn,$_POST['mobile_number']);
        $alt_mobile_number = mysqli_real_escape_string($conn,$_POST['alt_mobile_number']);
        $pan_card_number = mysqli_real_escape_string($conn,$_POST['pan_card_number']);
        $aadhar_card_number = mysqli_real_escape_string($conn,$_POST['aadhar_card_number']);

        //Address Details
        $address_1 = mysqli_real_escape_string($conn,$_POST['address_1']);
        $address_2 = mysqli_real_escape_string($conn,$_POST['address_2']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $district = mysqli_real_escape_string($conn,$_POST['district']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $pincode = mysqli_real_escape_string($conn,$_POST['pincode']);

        //Bank Details
        $bank_name = mysqli_real_escape_string($conn,$_POST['bank_name']);
        $branch_name = mysqli_real_escape_string($conn,$_POST['branch_name']);
        $account_number = mysqli_real_escape_string($conn,$_POST['account_number']);
        $account_type = mysqli_real_escape_string($conn,$_POST['account_type']);
        $ifsc_code = mysqli_real_escape_string($conn,$_POST['ifsc_code']);

        $investor_ref_id = '1';
        $sales_rep_id ='1';
        $created_by = "admin";
        $investor_type = "II";
        $i_created_at =date("Y-m-d");
        $status = "active";
        $approval_status = "pending";


        $q1 = "INSERT INTO individual_investor_details (i_first_name,i_middle_name,i_last_name,i_gender,i_dob,i_email,i_mobile_number,alt_mobile_number,i_pan_card,i_aadhar_card,i_address_1,i_address_2,i_city,i_district,i_state,i_country,i_pin_code,i_bank_name,i_branch_name,i_account_number,i_account_type,i_ifsc_code,investor_ref_id,sales_rep_id,i_created_at,created_by,investor_type,status,approval_status)
        VALUES('$first_name','$middle_name','$last_name','$gender','$dob','$email','$mobile_number','$alt_mobile_number','$pan_card_number','$aadhar_card_number','$address_1','$address_2','$city','$district','$state','$country','$pincode','$bank_name','$branch_name','$account_number','$account_type','$ifsc_code','$investor_ref_id','$sales_rep_id','$i_created_at','$created_by','$investor_type','$status','$approval_status')";

        $insert = mysqli_query($conn, $q1);
        if($insert){
         $message = "Individual Investor registered successfully !!!" ;

       } else {
        echo "Error:" . mysqli_error($conn);
      }
    }

    ?>
    <script src="./js/ajax_jquery.min.js"></script>
    <style>
      .active_tab1
      {
       background-color:#fff;
       color:#333;
       font-weight: 600;
     }
     .inactive_tab1
     {
       background-color: #f5f5f5;
       color: #333;
       cursor: not-allowed;
     }
     .has-error
     {
       border-color:#cc0000;
       background-color:#ffff99;
     }
     .check-success{
      color:green;
    }

    body,h2,h3,h4,h5,h6,p,b,small,i,a,label,div{
     font-family:sans-serif;
   }
   .mt-40{
    margin-top: 40px;
  }

  .ii_head{
    background-color:#1985e2; color:white; border-top-left-radius: 6px;border-top-right-radius:6px; padding:16px;
  }
  .p-0{
    padding:0px;
  }
  .mt-10{
    margin-top:10px;
  }
</style>

<!--  Main page Content -->
<div class="right_col" role="main">
 <!-- top tiles -->
 <div class="row">
   <a href="all_investors.php" class="pull-left btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
   <div class="col-md-8 col-lg-6 mt-40" >

    <?php     if(!empty($message)){ 
      echo '<div class="alert alert-success alert-dismissible" role="alert" style="padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #efefef00;
      border-radius: 8px;">
      <strong>'.$message.'</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: relative;
      top: -2px;
      right: -2px;
      color: black;">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }?>


    <div class="col-md-12 ii_head">
     <h2 align="center"><b>INDIVIDUAL REGISTRATION FORM</b></h2>
   </div>


   <form action="add_individual_investor.php" method="post" id="register_form">
     <div class="col-md-12 p-0">
      <ul class="nav nav-tabs">
        <li class="nav-item col-md-4 p-0">
          <a class="nav-link active_tab1"  id="list_login_details" style="border:1px solid #ccc; margin-right: 0px;border-radius:0px;"> Personal Details</a>
        </li>
        <li class="nav-item col-md-4 p-0">
          <a class="nav-link inactive_tab1" id="list_personal_details" style="margin-right: 0px; border:1px solid #ccc; border-radius:0px;"> Address Details</a>
        </li>
        <li class="nav-item col-md-4" style="padding:0px;">
          <a class="nav-link inactive_tab1" id="list_contact_details" style=" margin-right: 0px;border:1px solid #ccc;border-radius:0px;"> Bank Details</a>
        </li>
      </ul>
    </div>


    <div class="col-md-12 p-0">
      <div class="tab-content">
       <!-- Personal Details -->
       <div class="tab-pane active" id="login_details">
        <div class="panel panel-default">
         <!--   <div class="panel-heading">ADD INDIVIDUAL INVESTOR</div> -->
         <div class="panel-body">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">First Name</label>
              <input input type="text" name="first_name" id="first_name" class="form-control" maxlength="20" placeholder="First Name">
            </div>

            <div class="form-group col-md-4">
              <label for="inputPassword4">Middle Name</label>
              <input type="text" name="middle_name" id="middle_name" class="form-control" maxlength="20" placeholder="Middle Name">
            </div>

            <div class="form-group col-md-4">
              <label for="inputPassword4">Last Name</label>
              <input type="text" name="last_name" id="last_name" class="form-control" maxlength="20" placeholder="Last Name">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Email</label>
              <input type="text" name="email" id="email" class="form-control" maxlength="40"  placeholder="xyz@gmail.com"/>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4" >Mobile Number</label>
              <input  type="text" name="mobile_number" id="mobile_number" class="form-control" maxlength="10" placeholder="8799845462">
            </div>

            <div class="form-group col-md-6">
              <label for="inputPassword4">Alternate Number</label>
              <input type="text" name="alt_mobile_number" id="alt_mobile_number" class="form-control" maxlength="10" placeholder="8799845462">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>PAN Card Number</label>
              <input type="text" name="pan_card_number" id="pan_card_number" class="form-control" maxlength="10"  placeholder="ASDRD1234J"/>
            </div>

            <div class="form-group col-md-6">
             <label>Aadhar Card Number</label>
             <input type="text" name="aadhar_card_number" id="aadhar_card_number" class="form-control" maxlength="12" placeholder= "123412341234"/>
           </div>
         </div>

         <div class="form-group col-md-12">
           <label>Date of Birth</label>
           <input type="date" name="dob" id="dob" class="form-control datepicker"/>
           <!--  <span id="error_dob" class="text-danger"></span> -->
         </div>

         <div class="form-group col-md-12 mt-10" >
           <label>Gender</label>
           <label class="radio-inline">
            <input type="radio" name="gender" value="male" checked> Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" value="female"> Female
          </label>
        </div>

        <br><br>
        <div class="form-row" align="right">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-primary btn-md"> Next  <i class="fa fa-angle-right"></i></button>
       </div>
     </div>
   </div>
 </div>
 <!-- Ending of Login Details -->
 <div class="tab-pane fade" id="personal_details">
  <div class="panel panel-default">
    <!--    <div class="panel-heading">INVESTOR PERSONAL DETAILS</div> -->
    <div class="panel-body">

     <fieldset>
      <div class="form-group">
       <label>Address 1</label>
       <input type="text" name="address_1" id="address_1" class="form-control" placeholder= "Address 1" maxlength="50"/>
       <!-- <span id="error_address_1" class="text-danger"></span> -->
     </div>

     <div class="form-group">
       <label>Address 2</label>
       <input type="text" name="address_2" id="address_2" class="form-control" placeholder= "Address 2"maxlength="50"/>
       <!-- <span id="error_address_2" class="text-danger"></span> -->
     </div>

     <div class="form-group">
       <label>City</label>
       <input type="text" name="city" id="city" class="form-control" maxlength="20" placeholder= "City"/>
       <!-- <span id="error_city" class="text-danger"></span> -->
     </div>

     <div class="form-group">
       <label>District</label>
       <input type="text" name="district" id="district" class="form-control" maxlength="20" placeholder= "District"/>
       <!-- <span id="error_district" class="text-danger"></span> -->
     </div>

     <div class="form-group">
       <label>State</label>
       <input type="text" name="state" id="state" class="form-control" maxlength="20" placeholder= "State"/>
       <!-- <span id="error_state" class="text-danger"></span> -->
     </div>

     <div class="form-group">
       <label>Country</label>
       <input type="text" name="country" id="country" class="form-control" maxlength="20" placeholder= "Country"/>
       <!-- <span id="error_country" class="text-danger"></span> -->
     </div>


     <div class="form-group">
       <label>Pin Code</label>
       <input type="text" name="pincode" id="pincode" class="form-control" maxlength="6" placeholder= "123456"/>
       <!-- <span id="error_pincode" class="text-danger"></span> -->
     </div>
   </fieldset>
   <br />
   <div class="form-row" align="right">
     <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-md"><i class="fa fa-angle-left"></i> Previous</button>

     <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-primary btn-md">Next
      <i class="fa fa-angle-right"></i></button>
    </div>
    <br />
  </div>
</div>
</div>

<div class="tab-pane fade" id="contact_details">
  <div class="panel panel-default">
   <!-- <div class="panel-heading">INVESTOR BANK DETAILS</div> -->
   <div class="panel-body">

    <div class="form-group">
     <label>Bank Name</label>
     <input type="text" name="bank_name" id="bank_name" class="form-control" maxlength="50" placeholder= "SBI"/>
     <!--      <span id="error_bank_name" class="text-danger" placeholder= "SBI"></span> -->
   </div>



   <div class="form-group">
     <label>Account Number</label>
     <input type="text" name="account_number" id="account_number" class="form-control" maxlength="20" placeholder= "1111111222222"/>
     <!-- <span id="error_account_number" class="text-danger"></span> -->
   </div>

   <div class="form-group">
     <label>IFSC Code</label>
     <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" maxlength="11" placeholder= "SBIN0000234"/>
     <!--  <span id="error_ifsc_code" class="text-danger"></span> -->
   </div>

   <div class="form-group">
     <label>Account Type</label>
     <div>
      <select class="form-control" name="account_type" id="account_type">
        <option value="">Choose option</option>
        <option value="Saving Account">Saving Account</option>
        <option value="Current Account">Current Account</option>
      </select>
    </div>
  </div>

  <div class="form-group">
   <label>Branch Name</label>
   <input type="text" name="branch_name" id="branch_name" class="form-control" maxlength="20" placeholder= "Bangalore"/>
   <!--  <span id="error_branch_name" class="text-danger"></span> -->
 </div>
 <br />
 <div class="form-row" align="right">
  <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-md"><i class="fa fa-angle-left"></i> Previous</button>

  <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-primary btn-md">Register <i class="fa fa-angle-right"></i></button>
</div>
<br />
</div>
</div>
</div>
</div>
</div>
</form>
</div>






<script>
  $(document).ready(function(){

//First Next button click Event-
$('#btn_login_details').click(function(){

  var error_user_id = '';
  var error_email = '';
  var error_password = '';
  var error_first_name = '';
  var error_middle_name= '';
  var error_last_name = '';
  var error_mobile_number = '';
  var error_dob = '';
  var error_pan_card_number= '';
  var error_aadhar_card_number = '';
  var error_alt_mobile_number ="";

//User ID Validation
var u_filter = /^[0-9a-zA-Z]+$/;
if($.trim($('#user_id').val()).length == 0)
{
 error_user_id = 'User ID is required';
 $('#error_user_id').text(error_user_id);
 $('#user_id').addClass('has-error');
}
else
{
 if (!u_filter.test($('#user_id').val())){
  error_user_id = 'Invalid User ID';
  $('#error_user_id').text(error_user_id);
  $('#user_id').addClass('has-error');
} 
else{  
 error_user_id = '';
 $('#error_user_id').text(error_user_id);
 $('#user_id').removeClass('has-error');
}

}

//Email Validation
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if($.trim($('#email').val()).length == 0)
{
 error_email = 'Email is required';
 $('#error_email').text(error_email);
 $('#email').addClass('has-error');
}
else
{
 if (!filter.test($('#email').val()))
 {
  error_email = 'Invalid Email';
  $('#error_email').text(error_email);
  $('#email').addClass('has-error');
}
else
{
  error_email = '';
  $('#error_email').text(error_email);
  $('#email').removeClass('has-error');
}
}

//Password Validation
if($.trim($('#password').val()).length == 0)
{
 error_password = 'Password is required';
 $('#error_password').text(error_password);
 $('#password').addClass('has-error');
}
else
{
 error_password = '';
 $('#error_password').text(error_password);
 $('#password').removeClass('has-error');
}

//First Name Validation
var f_filter =  /^[a-zA-Z]+$/;

if($.trim($('#first_name').val()).length == 0)
{
 error_first_name = 'First Name is required';
 $('#error_first_name').text(error_first_name);
 $('#first_name').addClass('has-error');
}
else
{
 if (!f_filter.test($('#first_name').val())){
  error_first_name = 'Invalid First Name';
  $('#error_first_name').text(error_first_name);
  $('#first_name').addClass('has-error');
} 
else{  
 error_first_name = '';
 $('#error_first_name').text(error_first_name);
 $('#first_name').removeClass('has-error');
}

}

//Middle name Validation

if($.trim($('#middle_name').val()).length != 0)
{
 if (!f_filter.test($('#middle_name').val())){
  error_middle_name = 'Invalid Middle Name';
  $('#error_middle_name').text(error_middle_name);
  $('#middle_name').addClass('has-error');
} 
else{  
 error_middle_name = '';
 $('#error_middle_name').text(error_middle_name);
 $('#middle_name').removeClass('has-error');
}
}
//Last name Validation
if($.trim($('#last_name').val()).length == 0)
{
 error_last_name = 'Last Name is required';
 $('#error_last_name').text(error_last_name);
 $('#last_name').addClass('has-error');
}
else
{
 if (!f_filter.test($('#last_name').val())){
  error_last_name = 'Invalid Last Name';
  $('#error_last_name').text(error_last_name);
  $('#last_name').addClass('has-error');
} 
else{  
 error_last_name = '';
 $('#error_last_name').text(error_last_name);
 $('#last_name').removeClass('has-error');
}
}


//Mobile Number Validation
var m_filter = /^\d{10}$/;
if($.trim($('#mobile_number').val()).length == 0)
{
 error_mobile_number = 'Mobile Number is required';
 $('#error_mobile_number').text(error_mobile_number);
 $('#mobile_number').addClass('has-error');
}
else
{
 if (!m_filter.test($('#mobile_number').val())){
  error_mobile_number = 'Invalid Mobile Number';
  $('#error_mobile_number').text(error_mobile_number);
  $('#mobile_number').addClass('has-error');
} 
else{  
 error_mobile_number = '';
 $('#error_mobile_number').text(error_mobile_number);
 $('#mobile_number').removeClass('has-error');
}  
}

//Alternate Mobile Number

if($.trim($('#alt_mobile_number').val()).length != 0)
{
 if (!m_filter.test($('#alt_mobile_number').val())){
  error_alt_mobile_number = 'Invalid Mobile Number';
  $('#error_alt_mobile_number').text(error_alt_mobile_number);
  $('#alt_mobile_number').addClass('has-error');
} 
else{  
 error_alt_mobile_number = '';
 $('#error_alt_mobile_number').text(error_alt_mobile_number);
 $('#alt_mobile_number').removeClass('has-error');
}
}
//Date of birth Validation
if($.trim($('#dob').val()).length == 0)
{
 error_dob = 'Date of Birth is required';
 $('#error_dob').text(error_dob);
 $('#dob').addClass('has-error');
} 
else{  
 error_dob = '';
 $('#error_dob').text(error_dob);
 $('#dob').removeClass('has-error');
}

//Pan Card Number 
var p_filter =  /^([A-Z]{5})(\d{4})([A-Z]{1})$/;

if($.trim($('#pan_card_number').val()).length == 0)
{
 error_pan_card_number = 'PAN Card is required';
 $('#error_pan_card_number').text(error_pan_card_number);
 $('#pan_card_number').addClass('has-error');
}
else
{
 if (!p_filter.test($('#pan_card_number').val())){
  error_pan_card_number = 'Invalid PAN Card';
  $('#error_pan_card_number').text(error_pan_card_number);
  $('#pan_card_number').addClass('has-error');
} 
else{  
 error_pan_card_number = '';
 $('#error_pan_card_number').text(error_pan_card_number);
 $('#pan_card_number').removeClass('has-error');
}  
}

//Aadhar card validation 
var aa_filter =  /^\d{12}$/g;
if($.trim($('#aadhar_card_number').val()).length == 0)
{
 error_aadhar_card_number = 'Aadhar Card is required';
 $('#error_aadhar_card_number').text(error_aadhar_card_number);
 $('#aadhar_card_number').addClass('has-error');
}
else
{
 if (!aa_filter.test($('#aadhar_card_number').val())){
  error_aadhar_card_number = 'Invalid Aadhar Card';
  $('#error_aadhar_card_number').text(error_aadhar_card_number);
  $('#aadhar_card_number').addClass('has-error');
} 
else
{  
 error_aadhar_card_number = '';
 $('#error_aadhar_card_number').text(error_aadhar_card_number);
 $('#aadhar_card_number').removeClass('has-error');
}  
}

if(error_mobile_number != ''|| error_dob != ''||error_pan_card_number!= ''|| error_aadhar_card_number != ''|| error_email != '' || error_first_name != '' || error_middle_name != '' || error_last_name != '')
{
 return false;
}
else
{
 $('#list_login_details').removeClass('active active_tab1');
 $('#list_login_details').removeAttr('href data-toggle');
 $('#login_details').removeClass('active');
 $('#list_login_details').addClass('inactive_tab1');
 $('#list_personal_details').removeClass('inactive_tab1');
 $('#list_personal_details').addClass('active_tab1 active');
 $('#list_personal_details').attr('href', '#personal_details');
 $('#list_personal_details').attr('data-toggle', 'tab');
 $('#personal_details').addClass('active in');
 $("#check_mark").addClass('check-success');
}
});
// End of First Next Event 

// Previous button for Login details
$('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
});



 //Second Tab Event Fields 

 $('#btn_personal_details').click(function(){


  var error_address_1 = '';
  var error_address_2 = '';
  var error_city = '';
  var error_district = '';
  var error_state = '';
  var error_country = '';
  var error_pincode = '';

//Address 1 
var ad_filter =  /^[-#,/0-9a-zA-Z ]+$/;

if($.trim($('#address_1').val()).length == 0)
{
 error_address_1 = 'This Field is Mandatory';
 $('#error_address_1').text(error_address_1);
 $('#address_1').addClass('has-error');
}
else
{
 if (!ad_filter.test($('#address_1').val())){
  error_address_1 = 'Invalid Address';
  $('#error_address_1').text(error_address_1);
  $('#address_1').addClass('has-error');
} 
else{  
 error_address_1 = '';
 $('#error_address_1').text(error_address_1);
 $('#address_1').removeClass('has-error');
}  
}

//Address 2
if (!ad_filter.test($('#address_2').val())){
  error_address_2 = 'Invalid Address';
  $('#error_address_2').text(error_address_2);
  $('#address_2').addClass('has-error');
} 
else{  
 error_address_2 = '';
 $('#error_address_2').text(error_address_2);
 $('#address_2').removeClass('has-error');
}  

//City
var al_filter =  /^[a-zA-Z ]+$/;
if($.trim($('#city').val()).length == 0)
{
 error_city = 'This Field is Mandatory';
 $('#error_city').text(error_city);
 $('#city').addClass('has-error');
}
else
{
 if (!al_filter.test($('#city').val())){
  error_city = 'Invalid City Name';
  $('#error_city').text(error_city);
  $('#city').addClass('has-error');
} 
else{  
 error_city = '';
 $('#error_city').text(error_city);
 $('#city').removeClass('has-error');
}  
}

//District
if($.trim($('#district').val()).length == 0)
{
 error_district = 'This Field is Mandatory';
 $('#error_district').text(error_district);
 $('#district').addClass('has-error');
}
else
{
 if (!al_filter.test($('#district').val())){
  error_district = 'Invalid District Name';
  $('#error_district').text(error_district);
  $('#district').addClass('has-error');
} 
else{  
 error_district = '';
 $('#error_district').text(error_district);
 $('#district').removeClass('has-error');
}  
}

//State
if($.trim($('#state').val()).length == 0)
{
 error_state = 'This Field is Mandatory';
 $('#error_state').text(error_state);
 $('#state').addClass('has-error');
}
else
{
 if (!al_filter.test($('#state').val())){
  error_state = 'Invalid State Name';
  $('#error_state').text(error_state);
  $('#state').addClass('has-error');
} 
else{  
 error_state = '';
 $('#error_state').text(error_state);
 $('#state').removeClass('has-error');
}  
}

//Country
if($.trim($('#country').val()).length == 0)
{
 error_country = 'This Field is Mandatory';
 $('#error_country').text(error_country);
 $('#country').addClass('has-error');
}
else
{
 if (!al_filter.test($('#country').val())){
  error_country = 'Invalid country Name';
  $('#error_country').text(error_country);
  $('#country').addClass('has-error');
} 
else{  
 error_country = '';
 $('#error_country').text(error_country);
 $('#country').removeClass('has-error');
}  
}

//Pincode
var zip_filter = /^\d{6}$/;
if($.trim($('#pincode').val()).length == 0)
{
 error_pincode = 'Pin Code is Not Valid';
 $('#error_pincode').text(error_pincode);
 $('#pincode').addClass('has-error');
}
else
{
 if (!zip_filter.test($('#pincode').val())){
  error_pincode = 'Invalid Pincode Name';
  $('#error_pincode').text(error_pincode);
  $('#pincode').addClass('has-error');
} 
else{  
 error_pincode = '';
 $('#error_pincode').text(error_pincode);
 $('#pincode').removeClass('has-error');
}  
}

if(error_address_1 != ''|| error_address_2 != ''|| error_city != ''|| error_district != ''|| error_state != ''|| error_country != ''||error_pincode !='')
{
 return false;
}
else
{
 $('#list_personal_details').removeClass('active active_tab1');
 $('#list_personal_details').removeAttr('href data-toggle');
 $('#personal_details').removeClass('active');
 $('#list_personal_details').addClass('inactive_tab1');
 $('#list_contact_details').removeClass('inactive_tab1');
 $('#list_contact_details').addClass('active_tab1 active');
 $('#list_contact_details').attr('href', '#contact_details');
 $('#list_contact_details').attr('data-toggle', 'tab');
 $('#contact_details').addClass('active in');
 $("#check_mark").addClass('check-success');
}
});


 //Previous to Login Details
 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
});
 


 //Last Tab Bank Account 
 $('#btn_contact_details').click(function(){

  var error_bank_name = '';
  var error_branch_name = '';
  var error_account_number = '';
  var error_account_type = '';
  var error_ifsc_code = '';


//Bank Name
var bn_filter = /^[a-zA-Z ]+$/;

if($.trim($('#bank_name').val()).length == 0)
{
 error_bank_name = 'Bank Name is required';
 $('#error_bank_name').text(error_bank_name);
 $('#bank_name').addClass('has-error');
}
else
{
 if(!bn_filter.test($('#bank_name').val())){
  error_bank_name = 'Invalid Bank Name';
  $('#error_bank_name').text(error_bank_name);
  $('#bank_name').addClass('has-error');
} 
else{  
 error_bank_name = '';
 $('#error_bank_name').text(error_bank_name);
 $('#bank_name').removeClass('has-error');
}  
}

//Branch Name
if($.trim($('#branch_name').val()).length == 0)
{
 error_branch_name = 'Branch Name is required';
 $('#error_branch_name').text(error_branch_name);
 $('#branch_name').addClass('has-error');
}
else
{
 if(!bn_filter.test($('#branch_name').val())){
  error_branch_name = 'Invalid Branch Name';
  $('#error_branch_name').text(error_branch_name);
  $('#branch_name').addClass('has-error');
} 
else{  
 error_branch_name = '';
 $('#error_branch_name').text(error_branch_name);
 $('#branch_name').removeClass('has-error');
}  
}

//Account Number
var ac_filter = /^[0-9]+$/;
if($.trim($('#account_number').val()).length == 0)
{
 error_account_number = 'Account Number is required';
 $('#error_account_number').text(error_account_number);
 $('#account_number').addClass('has-error');
}
else
{
 if(!ac_filter.test($('#account_number').val())){
  error_account_number = 'Invalid Bank Account Number';
  $('#error_account_number').text(error_account_number);
  $('#account_number').addClass('has-error');
} 
else{  
 error_account_number = '';
 $('#error_account_number').text(error_account_number);
 $('#account_number').removeClass('has-error');
}  
}

//IFSC Number
var ifsc_filter =  /^([A-Z]{4})(\d{7})$/;
if($.trim($('#ifsc_code').val()).length == 0)
{
 error_ifsc_code = 'IFSC Code is required';
 $('#error_ifsc_code').text(error_ifsc_code);
 $('#ifsc_code').addClass('has-error');
}
else
{
 if(!ifsc_filter.test($('#ifsc_code').val())){
  error_ifsc_code = 'Invalid IFSC Code';
  $('#error_ifsc_code').text(error_ifsc_code);
  $('#ifsc_code').addClass('has-error');
} 
else{  
 error_ifsc_code = '';
 $('#error_ifsc_code').text(error_ifsc_code);
 $('#ifsc_code').removeClass('has-error');
}  
}

var a = $('#account_type').val();
if(a == ""){
  $('#account_type').addClass('has-error');
  error_account_type = "sdf";
}else{
 $('#account_type').removeClass('has-error');
 error_account_type = "";
}



if(error_bank_name != ''|| error_branch_name != ''|| error_account_number != ''|| error_account_type != ''|| error_ifsc_code != '')
{
 return false;
}
else
{
 $("#check_mark").addClass('check-success');
 $(document).css('cursor', 'prgress');
 $("#register_form").submit();
}
});

 $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

});
</script>

</div>
</div>
<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php 
include("admin_footer.php");
}
}
}
?>




