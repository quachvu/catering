<?php
session_start();
require_once("setting.php");	
$selectData = mysqli_select_db($conn,"hdrccoma_catering_db") or die("");		//select database use
	
	$sql = "SELECT * FROM hdrccoma_catering_db.customer";											//select table friends
	$result = mysqli_query($conn, $sql);
	if(!$result)											//if not exsit create table friend with requirement
	{
		//create table customer
	$query_create = "CREATE TABLE hdrccoma_catering_db.customer (
			cus_id INT NOT NULL AUTO_INCREMENT UNIQUE,
			cus_email VARCHAR(50) NOT NULL,
			cus_phone VARCHAR(20) NOT NULL,
			message VARCHAR(150) NOT NULL,
			date_contact DATE NOT NULL,
			
			PRIMARY KEY(cus_id))";
	$create_CusTable = mysqli_query($conn, $query_create);
			
			if(!$create_CusTable)			//if not create show error
				die("Error CREATE TABLE data customer");
	}
	//define variable
		$name = $email = $phone = $message = $date  ="";
		$nameEr = $emailEr = $phoneEr = $messageEr = $dateEr ="";
		
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		

 //if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) )
 
 //{
	//obtain form item data
		$name = $_POST["name"];
		$email = $_POST["email"];	
		$phone = $_POST["phone"];
		$message = $_POST["message"];
		$date = date("d/m/y");
		$check = true;						//declare check value
		
		//check empty
		if (empty($_POST["name"]))
		{
			$nameEr = "Name is required";
		}else
		{
			$name = $_POST["name"];
		}
		if (empty($_POST["email"]))			//check email empty
		{
			$emailEr = "Email is required";
		}else
		{
			$email = $_POST["email"];
		}
		if (empty($_POST["phone"]))			//check phone empty
		{
			$phoneEr = "Phone is required";
		}else
		{
			$phone = $_POST["phone"];
		}
		if (empty($_POST["message"]))		//check message empty
		{
			$messageEr = "Message is required";
		}else
		{
			$message = $_POST["message"];
		}
													//check security code empty
		if(empty($_POST['security_code'] ) )
 		{
			$sec_CodeE = "Security code is required";
		}else
			{
				$sec_Code=$_POST['security_code'] ;
			}
		// finish check null
		
		//begin with function
		if(!empty($name) && !empty($email) && !empty($phone)&& !empty($message))
		{

		//begin validate all value input
		$formatEmail = "/^.+@.+\..{2,3}$/";				//format of email
		if(!preg_match($formatEmail, $email))			//check valid email
		{	
			echo "<p style='color:red'>Please enter the valid email</p>";	//show error message			
			$check = false;								//asign value false for $check
		}
		$formatPhone = "/^.+[0-9]+$/";				//format of phone
		if(!preg_match($formatPhone, $phone))				//check valid of pass
		{	
			echo "<p style='color:red'>Please enter the valid phone</p>";			
			$check = false;
		}
		
	
		
		
		
		//anything not false
		if($check == true)
		{

		$selectData = mysqli_select_db($conn,"hdrccoma_catering_db")	or die("Database not exist");		//check database hdrccoma_catering_db exit
		$sqlSelectTable = "SELECT * FROM hdrccoma_catering_db.customer";	
		$selectTableCustomer = mysqli_query($conn, $sqlSelectTable) or die ("Can not select table data customer");
		
		//query insert to table customer
		$insert = "INSERT INTO hdrccoma_catering_db.customer (cus_id, cus_email, cus_phone, message, date_contact) 
										VALUES (NULL, '$name', '$email', '$phone', '$date')";
		if( mysqli_query($conn, $insert))
		{
			
			echo "<h3 style='color:Blue'>Contact form submitted!</h3>";
			echo "<br class='clear'>";
			echo "<span style='color:Blue'>We will be in touch soon.</span>";
			
			echo '<META HTTP-EQUIV="Refresh" Content="1; URL=contact.html">'; 
			exit;
			
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
			
				
		}	
		}
		}//else {
		// Insert your code for showing an error message here
	//	echo 'Sorry, you have provided an invalid security code';
  // }
	echo "$nameEr";
	echo "$emailEr";
	echo "$phoneEr";
	echo "$messageEr";
	echo "<p style='color:red'>$nameEr</p>";
	 
?>
<html>
				
				<a class="button-2" href="contact.html">Back</a> </div>
</html>