
<?php
include "conn.php";
$message = "";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Rubik" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
  <title>I'm Jordan Searle</title> <!--Title-->
</head>
<body>
  <?php

   include "classes.php";
   echo $nav;
   // Check connection
   $con = new conn();
   $con->readAll("user");

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
