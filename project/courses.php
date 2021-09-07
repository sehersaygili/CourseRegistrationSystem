<?php
  include'header.php';
  include'nedmin/baglanti.php';
?>
<?php
  $user_id = $_SESSION['user_id'];
  $qr = $db->prepare("select * from courses where user_id=:user_id");
    $qr->execute(array(
      "user_id" => $user_id,
    ));
?>
<div class="container">
  <h3>Courses</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Course Name</th>
        <th scope="col">Code</th>
        <th scope="col">Level</th>
        <th scope="col">AKTS</th>
        <th scope="col">Credit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $say=0;
      while($result=$qr->fetch(PDO::FETCH_ASSOC)){ $say++ ?>
        <tr>
          <th scope="row"><?php echo($say); ?></th>
            <td><?php echo($result['course_name']); ?></td>
            <td><?php echo($result['code']); ?></td>
            <td><?php echo($result['level_id']); ?></td>
            <td><?php echo($result['akts']); ?></td>
            <td><?php echo($result['credit']); ?></td>
            <td>
              <a  onclick="Notiflix.Confirm.Show('Delete Course','Are you sure?','Yes','No',function(){window.location='nedmin/delete.php?id=<?php echo $result['id']; ?>&delcourse=ok';},function(){},);"
              class="text-danger" data-toggle="tooltip" title="Del" style="cursor: pointer;">
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
