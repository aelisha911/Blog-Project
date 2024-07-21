<?php require_once("db.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Blog Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/login.img);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
			      	</div>
							<form action="#" method="POST" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name" >User mail</label>
			      			<input type="text" name="email" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control"  name="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		           
		          </form>
<?php    
if(isset($_POST["submit"]))
// die("submit:");
{    
if(!empty($_POST['email']) && !empty($_POST['password'])) 
{    
	// die("submit23456:");

    $email = $_POST['email'];    
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    // $con=mysql_connect('localhost','root','') or die(mysql_error());    
    // mysql_select_db('user_registration') or die("cannot select DB");    
     
	$sql = "SELECT * FROM user WHERE email = '$email' "; 
	// die("SQL:".$sql);
	$result = $conn->query($sql);
	// die("result:" .$result);/

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		// Verify the password
		// die("Role_ID: " . $row['role_id']);
		// if (password_verify($password, $row['password'])) {
			// die("password verify:" .$password);
			if ($row['role_id'] == 1) {
				header("Location: blogs.php");
				
			} elseif ($row['role_id'] == 2) {
				echo "<script>window.location.href = 'admin.php?flag=2';</script>";

				header("Location: subscriber.php");
			
			} else {
				header("Location: admin.php");
			
			}
		} else {
			// Password is incorrect
			echo "Invalid email or password!";
		}
	//  else {
	// 	echo "No user found with that email!";
	// }
} else {
	echo "All fields are required!";
}
}
?>   
		          <p class="text-center">Not a member? <a  href="registration.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/jqery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

	</body>

</html>