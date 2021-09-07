<?php
  session_start();
  include 'nedmin/baglanti.php';

  function isLoggedUser(){
    if(isset($_SESSION['email'])){
      return 1;
    }
    else{
      return 0;
    }
  }
  
  if (!isLoggedUser()) {
      $_SESSION["status"] = "İzinsiz Giriş Lütfen Giriş Yapın!";
      $_SESSION["status_code"] = "Warning";
      header("Location:login");
  }
  
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
			function getValue(Code, Course) {
				$("#code").val(Code);
				$("#course_name").val(Course); 
			}
		</script>
</head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index"># AÜ #</a>
        </div>
          <ul class="nav navbar-nav">
            <li><a href="index">Home</a></li>
            <?php if ($_SESSION['usr_type']==0): ?>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Courses<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses">Courses</a></li>
                  <li><a href="new-course">Add Courses</a></li>
                </ul>
              </li>
            <?php endif; ?>
            <?php if ($_SESSION['usr_type']==1): ?>
              <li ><a href="students">Students</a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['email'])): ?>
              <li><a><span class="glyphicon glyphicon-user"></span><?php echo "  ".$_SESSION['full_name']; ?> <?php if ($_SESSION['usr_type']==0): ?>(Student)<?php else: ?>(Teacher)<?php endif; ?></a></li>
              <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php else: ?>
              <li><a href="signup"><span class="glyphicon glyphicon-user"></span> Signup</a></li>
              <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
<?php include'notifi.php'; ?>
