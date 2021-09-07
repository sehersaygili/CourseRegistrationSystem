<?php
ob_start();
session_start();

include 'baglanti.php';

if (isset($_POST['login'])) {
      $email = htmlspecialchars($_POST['email']);
      $pass = md5($_POST['password']);

      $prepare = $db->prepare("select * from user where email=:uid &&  pass_hash=:pass");
      	$prepare->execute(array(
      		"uid" => $email,
      		"pass" => $pass
      	));

      if ($prepare -> rowCount()>0) {
          $prepare = $prepare->fetch();
          $_SESSION['email'] = $prepare['email'];
          $_SESSION['usr_type'] = $prepare['usr_type'];
          $_SESSION['full_name'] = $prepare['full_name'];
          $_SESSION['user_id'] = $prepare['id'];
          $_SESSION['dep'] = $prepare['dep'];

          $_SESSION["status"] = "Welcome {$prepare['full_name']}";
          $_SESSION["status_code"] = "Success";
          header("Location:../index");
      }
      else {

        $_SESSION["status"] = "Wrong email or password";
        $_SESSION["status_code"] = "Warning";
        header("Location:../login");
      }
}
if (isset($_POST['signup'])) {
  $full_name = htmlspecialchars($_POST['full_name']);
  $email = htmlspecialchars($_POST['email']);
  $pass_hash = md5($_POST['pass_hash']);
  $dep = htmlspecialchars($_POST['dep']);
  $usr_type = $_POST['usr_type'];


  $save = $db->prepare("INSERT INTO user SET
  full_name=:full_name,
  email=:email,
  pass_hash=:pass_hash,
  dep=:dep,
  usr_type=:usr_type
  ");
  $insert = $save->execute(array(
      'full_name' => $full_name,
      'email' => $email,
      'pass_hash' => $pass_hash,
      'dep' => $dep,
      'usr_type' => $usr_type
  ));
  if ($insert)
  {
    $_SESSION["status"] = "Your Account Has Been Created Successfully ";
    $_SESSION["status_code"] = "Success";
    header("Location:../login");
  }
  else
  {
    $_SESSION["status"] = "Oops! Something Has Gone Wrong!.. ";
    $_SESSION["status_code"] = "Warning";
    header("Location:../signup");
  }
}
if (isset($_POST['course_create'])) {
  $save = $db->prepare("INSERT INTO courses SET
	code=:code,
  course_name=:course_name,
  level_id=:level_id,
  akts=:akts,
  user_id=:user_id,
	credit=:credit
	");
  $insert = $save->execute(array(
    'code' => $_POST['code'],
    'course_name' => $_POST['course_name'],
    'level_id' => $_POST['level_id'],
    'akts' => $_POST['akts'],
    'user_id' => $_POST['user_id'],
    'credit' => $_POST['credit']
  ));
  if ($insert) {
    $_SESSION["status"] = "Course Added Successfully ";
    $_SESSION["status_code"] = "Success";
    header("Location:../courses");
  }else {
      $_SESSION["status"] = "Oops! Something Has Gone Wrong!.. ";
      $_SESSION["status_code"] = "Warning";
      header("Location:../new-course");
  }
}
?>
