
<?php
foreach (glob("class/*.php") as $filename)
{
    include $filename;
}
$message = "";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$title = "Welcome";
   require("head.php");
   // Check connection
   $user = new user();
   $user->readAll("user");

   if(isset($_POST['SubmitButton'])){ //check if form was submitted
     $inputName = test_input($_POST['inputFName']); //get input text
     $inputEmail = test_input($_POST['inputEmail']); //get input text
     $inputPasword = test_input($_POST['inputPass']); //get input text

     // Create data
     $cons = new conn();
     $cons->insert("user",$inputName,$inputEmail,$inputPasword);
}

   ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  Full Name: <input type="text" name="inputFName" required/>
  Email Address: <input type="text" name="inputEmail" required/>
  Password: <input type="password" name="inputPass" required/>
  <br><input type="submit" name="SubmitButton"/>
</form>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    function nav() {
      if (document.getElementById("mySidebar").style.width == "0px") {
        document.getElementById("mySidebar").style.width = "250px";
      }
      else {
      document.getElementById("mySidebar").style.width = "0";
        }
    }

    function drpDown(){
      if ($(".dropdown-container").css('max-height') === '0px') {

        $(".dropdown-container").css('max-height', '1000px');
      }
      else {
        $(".dropdown-container").css('max-height', '0');
      }
    }

</script>
</body>
</html>
