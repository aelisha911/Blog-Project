<?php 
$showAlert = false ;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'db.php';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
    $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : '';
	$exists=false;
	// $username = $_POST['name'];
    // $Email= $_POST['email'];
    // $Contact_no = $_POST['contact_no'];
    // $Password = $_POST['password'];
    // $CPassword = $_POST['cpassword'];
    // $Role_ID = $_POST['role_id'];
	// $sql = "Select * from user where name='$name'"; 
    
    // $result = mysqli_query($conn, $sql); 
    
    // $num = mysqli_num_rows($result);  
    
    // This sql query is use to check if 
    // the username is already present  
    // or not in our Database 
    // if($num == 0) {
        // die("Password: " . $password);
        // die("Confirm Password: " . $cpassword);
        
        if($password == $cpassword ) { 
    // echo $password;
    // echo $cpassword;
            $hash = password_hash($password,  
                                PASSWORD_DEFAULT); 
                
            // Password Hashing is used here.  
			$sql = "INSERT INTO `user`( `name`, `email`, `contact_no`, `password`, `role_id`) VALUES ('$name','$email','$contact_no','$hash','$role_id' )";
    
            $result = mysqli_query($conn, $sql); 
    
            if ($result) {
                $showAlert = true;
            } 
		}
	 else {
		$showError = "Passwords do not match";
	}
}

	

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php require_once("db.php") ?>

<?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
}

if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>';
}

// if ($exists) {
//     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//             <strong>Error!</strong> '. $exists .'
//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">×</span>
//             </button>
//           </div>';
// }
?>

<div class="wrapper" style="background-image: url('images/User-Registration-Plugin.webp');">
    <div class="inner">
        <form action="" method="POST">
            <h3>Registration Form</h3>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="username">Username:</label>
                    <div class="form-holder">
                        <i class="fa-regular fa-user fa-xs" style="color: #1f2020;"></i>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="email">Email:</label>
                    <div class="form-holder">
                        <i class="fa-regular fa-envelope fa-xs" style="color: #1f2020;"></i>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="contact_no">Contact No.:</label>
                    <div class="form-holder">
                        <i class="fa-solid fa-phone fa-xs" style="color: #1f2020;"></i>
                        <input type="text" class="form-control" name="contact_no">
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="role_id">Role:</label>
                    <div class="form-holder">
                        <i class="fa-solid fa-users fa-2xs" style="color: #1f2020;"></i>
                        <select class="form-control" name="role_id">
                            <option value="1">Viewer</option>
                            <option value="2">Subscriber</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="password">Password:</label>
                    <div class="form-holder">
                        <i class="fa-solid fa-lock fa-xs" style="color: #1f2020;"></i>
                        <input type="text" class="form-control" name="password" placeholder="********">
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="cpassword">Confirm Password:</label>
                    <div class="form-holder">
                        <i class="fa-solid fa-lock fa-xs" style="color: #1f2020;"></i>
                        <input type="text" class="form-control" name="cpassword" placeholder="********">
                    </div>
                </div>
            </div>
            <div class="form-end">
                <div class="button-holder">
                    <button type="submit" name="register">Register Now</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>