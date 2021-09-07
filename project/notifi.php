<script src="assets/notiflix-aio-2.7.0.min.js"></script>

<?php if (isset($_SESSION["status"])): ?>

  <?php if ($_SESSION["status_code"]=="Success"): ?>
    <script type="text/javascript">
       Notiflix.Notify.Success('<?php echo $_SESSION["status"]; ?>',{cssAnimationStyle:'zoom', cssAnimationDuration:500,useGoogleFont:true,position:"right-bottom",});
    </script>
  <?php endif; ?>

  <?php if ($_SESSION["status_code"]=="Error"): ?>
    <script type="text/javascript">
       Notiflix.Notify.Failure('<?php echo $_SESSION["status"]; ?>',{cssAnimationStyle:'zoom', cssAnimationDuration:500,useGoogleFont:true,position:"right-bottom",});
    </script>
  <?php endif; ?>

  <?php if ($_SESSION["status_code"]=="Warning"): ?>
    <script type="text/javascript">
       Notiflix.Notify.Warning('<?php echo $_SESSION["status"]; ?>',{cssAnimationStyle:'zoom', cssAnimationDuration:500,useGoogleFont:true,position:"right-bottom",});
    </script>
  <?php endif; ?>

  <?php
  unset($_SESSION["status"]);
  unset($_SESSION["status_code"]);
  ?>

<?php endif; ?>
