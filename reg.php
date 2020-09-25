   
<?php

/*
   Plugin Name: Registration Form
   Plugin URI: http://loginsample.php
   description: >- Allows registration of users
   Version: 1.0
   Author: Dorothy Nalwadda
  Author URI: 
License: GPLv2 or later
Text Domain: akismet
   */
ob_start();
get_header();
$user_id = get_current_user_id();  
$entered_name = (get_user_meta($user_id, 'f_name', true)) ? get_user_meta($user_id,'f_name',true): '';
$entered_lname = (get_user_meta($user_id, 'l_name', true)) ? get_user_meta($user_id,'l_name',true): '';
$entered_gender = (get_user_meta($user_id, 'gender', true)) ? get_user_meta($user_id,'gender',true): '';
$entered_dob = (get_user_meta($user_id, 'dob', true)) ? get_user_meta($user_id,'dob',true): '';
$entered_pob = (get_user_meta($user_id, 'pob', true)) ? get_user_meta($user_id,'pob',true): '';
$entered_bio = (get_user_meta($user_id, 'bio', true)) ? get_user_meta($user_id,'bio',true): '';
$entered_username = (get_user_meta($user_id, 'username', true)) ? get_user_meta($user_id,'username',true): '';
$entered_password = (get_user_meta($user_id, 'password', true)) ? get_user_meta($user_id,'password',true): '';



?>


<script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true, // Create a dropdown to control month
    selectYears: 10, // Create a dropdown of 10 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>
<html>
<style>
input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 3px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
textarea {
  width: 70%;
  height: 130px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}

input[type=button] {
  width: 70%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 5px 0;
  border: none;
  border-radius: 2px;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #45a049;
}


.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
</style>
<!DOCTYPE html>
<html>
<body>



  <div class = "center"> <form action="" method="post" >

 <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $entered_name;?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"  value="<?php echo $entered_lname;?>">
 <label for="gender">Gender:
<input type="radio" name="gender" value="<?php echo $entered_gender;?>">
<?php if (isset($gender) && $gender=="female") echo "checked";?>Female
<input type="radio" name="gender">
<?php if (isset($gender) && $gender=="male") echo "checked";?>Male
<input type="radio" name="gender">
<?php if (isset($gender) && $gender=="other") echo "checked";?> Other<br>
  <label for="dob">Date of Birth:</label><br>
  <input type="text" id="dob" name="dob" class="datepicker" value="<?php echo $entered_dob;?>">
  <label for="pob">Place Of Birth:</label> <select name="pob" id="pob" value="<?php echo $entered_pob;?>">
  <option value="Rakai">RAKAI</option>
  <option value="Masaka">MASAKA</option>
  <option value="Kampala">KAMPALA</option>
  <option value="Kitgum">KITGUM</option>
</select><br>
   <label for="bio" name="bio" value="<?php echo $entered_bio;?>">Bio Data:</label> <textarea> Enter bio....</textarea><br>

  <label for="bio">Username:</label><br>
  <input type="text" id="user_name" name="username" value="<?php echo $entered_username;?>">
  <label for="bio">Password:</label><br>
  <input type="text" id="pass_word" name="password" value="<?php echo $entered_password;?>"><br>
<input type="button" id="button" Value="save" name="save">
</form>
</div>
</body>
</html>


<?php



 if (!function_exists('wf_insert_update_user_meta')){
 	function wf_insert_update_user_meta($user_id,$meta_key,$meta_value){
//Add other meta data
 	$meta_key_not_exists = add_user_meta( $user_id,$meta_key,$meta_value,true);

//if meta key already exists then just update the meta value for and return true
 	if (!meta_key_not_exists){
upddate_user_meta($user_id,$meta_key,$meta_value);
return true ;

 	}
 }
 register_activation_hook( __FILE__, 'wf_insert_update_user_meta' );
}



if(isset($_POST['save'])){


         $first_name = (!empty($_POST['fname']))? sanitize_text_field($_POST['fname']): '';
		 $last_name =(!empty($_POST['lname']))? sanitize_text_field($_POST['lname']): '';
		 $sex =(!empty($_POST['gender']))? sanitize_text_field($_POST['gender']): '';
		 $dob =(!empty($_POST['dob']))? sanitize_text_field($_POST['dob']): '';
		 $pob =(!empty($_POST['pob']))? sanitize_text_field($_POST['pob']): '';
		 $biodata =(!empty($_POST['bio']))? sanitize_text_field($_POST['bio']): '';
		$bio ='biodata';
		$user_name =(!empty($_POST['username']))? sanitize_text_field($_POST['username']): '';
		$pass =(!empty($_POST['password']))? sanitize_text_field($_POST['password']): '';
		wf_insert_update_user_meta($user_id,$fname,$first_name);
		wf_insert_update_user_meta($user_id,$lname,$last_name);
		wf_insert_update_user_meta($user_id,$gender,$sex);
		wf_insert_update_user_meta($user_id,$dob,$dob);
		wf_insert_update_user_meta($user_id,$pob,$pob);
		wf_insert_update_user_meta($user_id,$bio,$biodata);
		wf_insert_update_user_meta($user_id,$username,$user_name);
		wf_insert_update_user_meta($user_id,$password,$pass);
$loc = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
wp_safe_redirect($loc);
exit;

	$table_name = 'wp_usermeta'; 
 
  $data = array(
); 


	
	$result = $dbconn->insert($table_name,$data,$format=NULL);
		 
if ($result ==1){
 echo "<script>alert('Record saved successfully');</script>";
}else{
echo "<script>alert('Unable to save');</script>";
}

}

?>