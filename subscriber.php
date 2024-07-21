<?php
include 'db.php';

// $acess=$_get['flag'];


if (isset($_POST['blog'])) {
  
  $title = $_POST['blog-title'];
  $description = $_POST['blog-desc'];
  $category = $_POST['blog-category'];
  if(file_exists($_FILES['image']["tmp_name"])){
    $allowedType = ['jpg', 'jpeg', 'png', 'gif'];
    $typeOfFile =  pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $file = uniqid() . "." . $typeOfFile;
    $target = "uploads/" . $file;
    if (in_array($typeOfFile, $allowedType)) {
      
      move_uploaded_file($_FILES['image']["tmp_name"], $target);
      $p_img = $file;
    } else {
      $p_img = 0;
    }
  }
  $sql = "INSERT INTO `blogs`(`img`, `blog_title`, `blog_description`, `category_id`) VALUES ('$p_img','$title','$description','$category')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>




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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Subscriber</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>






      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
                Addons
            </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->
            <!-- $acess=$_get['flag']
            if($acess==2){ -->

              <li class="nav-item">
                <a class="nav-link" href="tables.php">
                  <i class="fas fa-fw fa-table"></i>
                  <span>No of Blogs.</span></a>
              </li>
            <!-- } -->
      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center ">
        <button class="logout-subscriber border-0 ">Logout</button>
      </div>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              <button class="add_blog_btn  p-2 text-center btn-outline-info" data-toggle="modal" data-target="#exampleModal ">+ Add new Blog</button>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Blog Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="blog-title" class="col-form-label">Title:</label>
                          <input type="text" class="form-control" id="recipient-name" name="blog-title">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Description:</label>
                          <textarea class="form-control" id="message-text" name="blog-desc"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="blog-category" class="col-form-label">Category:</label>
                          <input type="text" class="form-control" id="blog-category" name="blog-category">
                        </div>
                        <div class="form-group">
                          <label for="blog-img" class="col-form-label">Image:</label>
                          <input type="file" class="form-control" id="blog-image" name="image" required>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="submit" class="form-control btn btn-primary" name="blog" value="SUBMIT">
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>

            


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  
                  <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM `blogs`";
                //  die("SQL:".$sql);
                $result = $conn->query($sql);
                //  die("result:" .$result);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><img src="uploads/<?php echo $row['image']; ?>" class="rounded-circle table-img" alt="Image"></td>
                            <td data-toggle="modal" data-target="#updateModal"><?php echo $row['blog-title']; ?></td>
                            <td>
                                <form action="" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="submit" class="delete-blog border-0 btn btn-danger" name="delete-blog" value="Delete">
                                </form>
                            </td>
                        </tr>
                      
               
            </tbody>
            <?php
                      }
                          }      ?>
                </table>
              </div>
            </div>
            <?php 
            // require_once('db.php');

            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //   $blog_id = $_POST['id'];

            //   $sql = "DELETE FROM blogs WHERE id = '$blog_id'";

            //   if ($conn->query($sql) === TRUE) {
            //     echo "Record deleted successfully";
            //   } else {
            //     echo "Error: " . $sql . "<br>" . $conn->error;
            //   }
            // }
            ?>
            <!-- Update Blog Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    <form action="update_blog.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" id="update-id" name="id">
                      <div class="form-group">
                        <label for="update-title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="update-title" name="update-title" required>
                      </div>
                      <div class="form-group">
                        <label for="update-description" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="update-description" name="update-desc" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="update-category" class="col-form-label">Category:</label>
                        <input type="text" class="form-control" id="update-category" name="update-category" required>
                      </div>
                      <div class="form-group">
                        <label for="update-image" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="update-image" name="update-image">
                      </div>
                      <button type="submit" class="btn btn-primary" name="update-blog">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- // update_blog.php -->
            <?php
            require_once('db.php');

            if (isset($_POST['update-blog'])) {
              $id = $_POST['update-id'];
              $title = $_POST['update-title'];
              $description = $_POST['update-desc'];
              $category = $_POST['update-category'];
              $image = $_FILES['update-image']['name'];

              if ($image) {
                $target = "uploads/" . basename($image);
                move_uploaded_file($_FILES['update-image']['tmp_name'], $target);
                $sql = " UPDATE `blogs` SET `img`='$image',`blog_title`='$title',`blog_description`='$description',`category_id`='$category' WHERE `blog_id`='$id'";
              } else {
                // $sql = "UPDATE blogs SET title='$title', description='$description', category='$category' WHERE id='$id'";
              }

              if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
            ?>


            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                  </div>
                </div>
              </div>
            </div>



            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
              $('#myModal').modal('toggle')
            </script>
            <script>
              const deletes = document.getElementsByClassName('delete-blog');
              Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                  console.log("delete-blog");
                  id = e.target.id.substr(1, );
                  if (confirm("press a button!")) {
                    console.log("yes");

                  } else {
                    console.log("no");
                  }
                })
              });
            </script>
            <!-- <script>
const updates = document.getElementsByClassName('update-blog');
Array.from(updates).forEach((element) => {
  element.addEventListener("click", (e) => {
    const id = e.target.dataset.id;
    const title = e.target.dataset.title;
    const description = e.target.dataset.description;
    const category = e.target.dataset.category;

    document.getElementById('update-id').value = id;
    document.getElementById('update-title').value = title;
    document.getElementById('update-description').value = description;
    document.getElementById('update-category').value = category;
    $('#updateModal').modal('show');
  });
});
</script> -->
            <script>
              const edits = document.getElementsByClassName('edit');
              Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {
                  console.log("edits");
                  $('#update-id').val(e.target.id);
                  console.log(e.target.id, "qq")
                  $('#updateModal').modal('toggle');

                })
              });
            </script>
</body>

</html>

</html>