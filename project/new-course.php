
<?php
  include'header.php';
  include'nedmin/baglanti.php';
?>

<?php

  $sinifsor=$db->prepare("SELECT * FROM classroom");
  $sinifsor->execute();

?>

<div class="container">
  <h3>Adding Course</h3>
  <form action="nedmin/islem.php" method="post">  

    <div class="form-group">


    <select size="1" name="ders" id="ders" onchange="getValue($('#ders').val(),$('#ders option:selected').text(),$('#ders course_akts').text());">
				<option value="English">SYC504</option>
				<option value="Robotic">SYC606</option>
				<option value="Algorithm">SYC403</option>
				<option value="Science">SYS598</option>

		</select></br><br/>
			<small class="form-text text-muted">Your Course Code :<input type="text" name="code" size="20" id="course_name"><br /></small><br />
			<small class="form-text text-muted">Your Course Name: <input type="text" name="course_name" size="20" id="code"></small><br /><br />
    </div>

    <div class="form-group">
      <label for="level_id">Level</label>
      <select class="form-control" name="level_id">
        <?php
          while($sinifcek=$sinifsor->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $sinifcek['id'] ?>"><?php echo $sinifcek['classroom_nm'] ?></option>
          <?php
        }
       ?>
      </select>
    </div>

    <div class="form-group">
      <label for="akts">AKTS</label>
      <input type="text" class="form-control" id="akts" name="akts"  required>
    </div>

    <div class="form-group">
      <label for="credit">Credit</label>
      <input type="text" class="form-control" id="credit" name="credit" required>
    </div>

    <input type="hidden" name="user_id" value="<?php echo($_SESSION['user_id']); ?>">
    <button type="submit" name="course_create" class="btn btn-primary">Save course</button>
  </form>
</div>

<?php include'footer.php'; ?>
