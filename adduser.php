<?php 
@ob_start();
session_start();

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['name']) || isset($_POST['email'])){ 
    // Get the submitted form data 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $mobile = $_POST['mobile'];
    $department = $_POST['department']; 
    $password = $_POST['password']; 
     
    // Check whether submitted data is not empty 
    if(!empty($name) && !empty($email)){ 

        if (strlen($name) < 4) {
            $response['message'] = 'Full name is required.';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
        } elseif (strlen($mobile) != 10) {
            $response['message'] = 'Mobile Number must be 10 digits.';
        } elseif (strlen($department) <= 2) {
            $response['message'] = 'Enter Your department name.';
        } elseif (strlen($password) <= 4) {
            $response['message'] = 'Password must be at least 4 characters.';    
        
            //VALIDATION
           
        }else{ 
                // Include the database config file 
                include_once 'includes/dbh.inc.php'; 
                

                $query = "SELECT * FROM members WHERE email='$email'";
	            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	            $num_row = mysqli_num_rows($result);

                if ($num_row < 1) {
                $spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
                // Insert form data in the database 
                $insert = $conn->query("INSERT INTO members (fname,email,department,mobile,password,events,workshops,flagship) VALUES ('$name','$email','$department','$mobile','$spassword',' ',' ',' ')"); 
                
                
                $insert_ev = $conn->query("INSERT INTO events (fname,email,mobile) VALUE ('$name','$email','$mobile')");
			    $insert_ws = $conn->query("INSERT INTO workshops (fname,email,mobile) VALUE ('$name','$email','$mobile')");
                $insert_fs = $conn->query("INSERT INTO flagship (fname,email,mobile) VALUE ('$name','$email','$mobile')");
			    
                 
                    if($insert){ 

                        $_SESSION['login'] = $conn->insert_id;
				        $_SESSION['fname'] = $name;
				        $_SESSION['email'] = $email;
                        $response['status'] = 1; 
                        $response['message'] = 'Form data submitted successfully!'; 
                    } else {
                        $response['message'] = 'Error inserting data.';
                    }
                }else {
                    $response['message'] = 'Email already in system.';
                }
            
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);