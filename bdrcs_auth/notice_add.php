<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $des=$_POST['des'];

    $sql= "INSERT INTO `notice`(`title`, `des`) VALUES (:title,:des)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['title'=>$title, 'des'=>$des]);

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
                  <h3 class="text-center pb-4">Add Notice</h3>
                  <div class="row mb-3">
                    <!-- Title -->
                    <label class="col-sm-2 col-form-label" for="title">Notice Title</label>
                    <div class="col-sm-10">
                      <input type="text" id="title" name="title" placeholder="" class="form-control" value="<?= isset($title) ? $title:'' ?>" required>
                      <p class="help-block">Please provide Notice Title, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Description -->
                    <label class="col-sm-2 col-form-label" for="des">Notice Description</label>
                    <div class="col-sm-10">
                      <textarea id="des" name="des" rows="30" class="form-control" value="<?= isset($des) ? $des:'' ?>" required></textarea>
                      <p class="help-block">Please provide Notice Description, required field</p>
                    </div>
                  </div>                  
                  
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Notice" name="submit" class="btn btn-success">
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