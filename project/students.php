<?php
  include'header.php';
  include'nedmin/baglanti.php';
?>

<?php
  if (!$_SESSION["usr_type"] == 1) {
      $_SESSION["status"] = "unauthorized login";
      $_SESSION["status_code"] = "Warning";
      header("Location:index");
  }
?>

<?php
  $dep = $_SESSION['dep'];
  $ogrencisor = $db->prepare("select * from user where usr_type=:usr_type && dep=:dep");
    $ogrencisor->execute(array(
      "usr_type" => 0,
      "dep" => $dep,
    ));
?>


<div class="container">
  <h3>Students</h3>



   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First/Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Created_at</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php
    $say=0;
    while($result=$ogrencisor->fetch(PDO::FETCH_ASSOC)){ $say++ ?>
      <tr>
        <th scope="row"><?php echo($say); ?></th>
        <td><?php echo($result['full_name']); ?></td>
        <td><?php echo($result['email']); ?></td>
        <td><?php echo($result['dep']); ?></td>
        <td><?php echo($result['created_at']); ?></td>
        <td>
          <a  onclick="Notiflix.Confirm.Show('Delete student','Are you sure?','Yes','No',function(){window.location='nedmin/delete.php?id=<?php echo $result['id']; ?>&delstudent=ok';},function(){},);"
          class="text-danger" data-toggle="tooltip" title="Delete" style="cursor: pointer;">
            <span class="glyphicon glyphicon-trash text-danger"></span>Delete
          </a>
        </td>
      </tr>
      <?php
    }
     ?>
  </tbody>
</table>
</div>

<?php include'footer.php'; ?>
