<?php

session_start();

if (empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
$profilePic = 'default-avatar.png';
$sql = "SELECT profile_picture FROM users WHERE id_user = '$_SESSION[id_user]'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $profilePic = !empty($row['profile_picture']) ? $row['profile_picture'] : 'default-avatar.png';
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Job Portal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .profile-img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto;
      display: block;
      border: 3px solid #ccc;
    }
  </style>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <a href="index.php" class="logo logo-bg">
        <span class="logo-mini">O<b>J</b>P</span>
        <span class="logo-lg">Online<b> Job</b> Portal</span>
      </a>

      <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="../jobs.php">Jobs</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <img src="../uploads/profile_pictures/<?php echo $profilePic; ?>" class="profile-img" alt="Profile Picture">

                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                    <li class="active"><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                    <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <h2><i>Recent Applications</i></h2>
              <p>Below you will find job roles you have applied for</p>

              <?php
              $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <div class="attachment-block clearfix padding-2">
                    <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                    <div class="attachment-text padding-2">
                      <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>
                      <?php

                      if ($row['status'] == 0) {
                        echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                      } else if ($row['status'] == 1) {
                        echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                      } else if ($row['status'] == 2) {
                        echo '<div class="pull-right"><strong class="text-green">Accepted please contact with related company.</strong></div> ';
                      }
                      ?>

                    </div>
                  </div>

              <?php
                }
              }
              ?>

            </div>
          </div>
        </div>
      </section>



    </div>
    <footer class="main-footer" style="margin-left: 0px;">
      <div class="container py-5">
        <div class="row g-5">

          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">Contact</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kathmandu, Nepal</p>
            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+977 9823575991</p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i>onlinejobportal@gmail.com</p>
          </div>

        </div>
        <div class="container">
          <div class="copyright">
            <div class="row">
              <div class=" text-center">
                &copy; <a class="border-bottom" href="./index.php">ONLINE JOB PORTAL</a>, <a class="border-bottom" href="">Code By Pukar & Ajay</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </footer>



  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/adminlte.min.js"></script>
</body>

</html>