<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
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
              <?php
              // getting info and storing in variables 
              if(isset($_GET['id'])){
                $id = $_GET['id']; 
                $sql = "select * from banners where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();

                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $image = $row['image'];
                  $status = $row['status'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action="banner_update_final.php" method="POST" enctype="multipart/form-data">
                <fieldset>              
                  <h3 class="text-center pb-4">Update Admin Info</h3>  
                  <input type="hidden" name="id" value="<?php echo $id; ?>">              
                  <div class="row mb-3">
                    <!-- Banner Photo -->
                    <label class="col-sm-2 col-form-label" for="Banner Photo">Banner Photo</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" placeholder="" value="<?php echo $image; ?>" class="form-control" required>
                      <img style="width: 100px; height:100px;" class="img-fluid" src="<?php echo '../images/slider/'.$image; ?>" alt="Photo">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Status -->
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" class="input-xlarge" id="status">
                        <option value="1"
                          <?php
                            if ($status=="1") {
                              echo "selected";
                            }
                          ?>
                        >Active</option>
                        <option value="0"
                          <?php
                            if ($status=="0") {
                              echo "selected";
                            }
                          ?>
                        >Inactive</option>
                      </select>
                      <p class="help-block">Select Status</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Update" name="submit" class="btn btn-success">
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

