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
              <!--MAIN START -->
              	<div class="card text-center">
        				  <div class="card-header">
        				    <h3>Dashboard</h3>
        				  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <a href="volunteer_pending_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $status=0;
                                $query = "SELECT * FROM volunteer WHERE status=:status";

                                $stmt=$con->prepare($query);
                                $stmt->execute(['status'=>$status]);
                                $total=$stmt->rowCount();
                                
                                echo '<h1 class="card-title text-danger">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-danger">
                              Pending Volunteer
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="blood_donor_pending_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $status=0;
                                $query = "SELECT * FROM blood_donor WHERE status=:status";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute(['status'=>$status]);
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title text-danger">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-danger">
                              Pending Blood Donor
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
        				  <div class="card-body">
        				    <div class="row">
          					  <div class="col-sm-3">
                        <a href="admin_list.php">
            					    <div class="card h-100">
            					      <div class="card-body">
            					      	<p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM admin";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
            					      </div>
            					      <div class="card-footer text-muted">
                              Admin
            						    </div>
            					    </div>
                        </a>
          					  </div>
                      <div class="col-sm-3">
                        <a href="officer_employee_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM employee";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Office Employee
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="executive_committee_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM ec_member";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Executive Committee 
                            </div>
                          </div>
                        </a>
                      </div>
          					  <div class="col-sm-3">
                        <a href="life_member_list.php">
            					    <div class="card h-100">
            					      <div class="card-body">
            					      	<p class="card-text h5">Total</p>
            					        <?php
                                $query = "SELECT * FROM life_member";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
            					      </div>
            					      <div class="card-footer text-muted">
            						    Life Members
            						    </div>
            					    </div>
                        </a>
          					  </div>
                      <div class="col-sm-3">
                        <a href="volunteer_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $status=1;
                                $query = "SELECT * FROM volunteer WHERE status=:status";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute(['status'=>$status]);
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                            Volunteers
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="blood_donor_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $status=1;
                                $query = "SELECT * FROM blood_donor WHERE status=:status";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute(['status'=>$status]);
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                            Blood Donor
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="donor_member_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM donor_member";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Donor Member
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="notice_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM notice";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Notice
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="activities_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM activities";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Events
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="publication_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM publication";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();

                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Publication
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-sm-3">
                        <a href="report_list.php">
                          <div class="card h-100">
                            <div class="card-body">
                              <p class="card-text h5">Total</p>
                              <?php
                                $query = "SELECT * FROM report";
                                
                                $stmt=$con->prepare($query);
                                $stmt->execute();
                                $total=$stmt->rowCount();
                                
                                echo '<h1 class="card-title">'.$total.'</h1>';
                              ?>
                            </div>
                            <div class="card-footer text-muted">
                              Reports
                            </div>
                          </div>
                        </a>
                      </div>
          					</div>
        				  </div>
				        </div>
              <!-- /row -->
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