<?php
include("functions.php");
usserAccessCheck();
include("userdata.php");
if(isset($_POST)){
  sleep(3);
  $tinCode = filterString($_POST['tin']);
  if (empty($tinCode)) {
    echo "<script>    
              toastr.error('$code_5 is required!', 'Empty field', {\"progressBar\": true});
              document.getElementById('tin').style.borderColor='red';
             </script>";
             die();
  }
  if($_SESSION['cotCounter'] <= 1){
       echo "<script>
               Swal.fire('Maximum $code_5 attempts exceeded!', '$cot_error', 'error');
                  document.getElementById('tin').style.borderColor='red';
                  document.getElementById('tin').style.color='red';
                  </script>";
                  $query = $conn->query("UPDATE users SET status = 'blocked' WHERE id = '$userid'");
                  session_destroy();
                  ?>
                  <meta http-equiv="refresh" content="5; url=../">
                  <?php
                  
         die();
  }
    
    if ($userstin != $tinCode) {
            $count = $_SESSION['tinCounter'];
            $newcount = $count - 1;
              echo "<script>
               Swal.fire('Invalid $code_5 !!', 'For security purpose, Your account will be suspended once you exceed the maximum trial limit. You  have $newcount attempts left.', 'error');
                  document.getElementById('tin').style.borderColor='red';
                  document.getElementById('tin').style.color='red';
                  </script>";
              $_SESSION['tinCounter'] = $newcount;    
             die();
    }
    
    if ($userstin == $tinCode) {
      echo "<script>
               Swal.fire('Valid $code_5 supplied!', 'Your transaction will be continued. Redirecting...', 'success');
                document.getElementById('tin').style.borderColor='green';
                  document.getElementById('tin').style.color='green';
                  </script>";   
       ?>
      <meta http-equiv="refresh" content="3; url=../email/otp-mail.php?transferToken=<?php echo$_SESSION['transaction_session']?> ">
       <?php
    }
 
}
?>