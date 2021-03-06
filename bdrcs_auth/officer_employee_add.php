<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $duration=$_POST['duration'];
    $image = $_FILES['image'];

    
    $imagename = $image['name'];
    $imagepath = $image['tmp_name'];
    $imageerror = $image['error'];

    if ($imageerror==0) {
      $destfile = '../images/office_employee/'.$imagename;
      move_uploaded_file($imagepath, $destfile);
    }
      

    $sql= "INSERT INTO `employee`(`name`, `email`, `designation`, `mobile`, `duration`, `photo`) VALUES (:name,:email,:designation,:mobile,:duration,:imagename)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['name'=>$name, 'email'=>$email, 'designation'=>$designation, 'mobile'=>$mobile, 'duration'=>$duration, 'imagename'=>$imagename]);

    if ($query) {
      $success='<span class="alert alert-success">Record Added Successfully</span>';
    } else {
      $error='<span class="alert alert-danger">Sorry! Try Again</span>';
    }

  }
?>
      <!--header start-->
      <?php include('header.php'); ?>
      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12 main-chart">
              <form class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
                <fieldset>
                  <h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3> 
                  <h3 class="text-center pb-4">Add A Office Employee</h3>                
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" class="form-control" value="<?= isset($name) ? $name:'' ?>" required>
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- designation -->
                    <label class="col-sm-2 col-form-label" for="designation">Designation</label>
                    <div class="col-sm-10">
                      <input type="text" id="designation" name="designation" placeholder="" class="form-control" value="<?= isset($designation) ? $designation:'' ?>" required>
                      <p class="help-block">Please provide designation, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- mobile -->
                    <label class="col-sm-2 col-form-label" for="mobile">Phone/Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>" required>
                      <p class="help-block">Please provide Phone Number, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" class="form-control" value="<?= isset($email) ? $email:'' ?>">
                      <p class="help-block">Please provide Email, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Duration -->
                    <label class="col-sm-2 col-form-label" for="duration">Duration</label>
                    <div class="col-sm-10">
                      <input type="text" id="duration" name="duration" placeholder="" class="form-control" value="<?= isset($duration) ? $duration:'' ?>">
                      <p class="help-block">Please provide Job Time Duration, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Image -->
                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" accept = image/* placeholder="" class="form-control" required>
                      <p class="help-block">Please provide Photo, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Office Employee" name="submit" class="btn btn-success">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          <!-- /row -->
        </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </body>
</html>