
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
   $account = new account();
   $account->readAll();

   $group = new groups();
   $group->readAll();

   $postd = new posts();

   $c = $postd->readAll();
   foreach ($c as $score) {
   echo $score->test();
  }
  if(isset($_POST['SubmitButton'])){ //check if form was submitted
     $inputName = test_input($_POST['inputFName']); //get input text
     $inputEmail = test_input($_POST['inputEmail']); //get input text
     $inputPasword = test_input($_POST['inputPass']); //get input text

     // Create data
     $account->insert($inputName,$inputEmail,$inputPasword);
  }
  if(isset($_POST['SubmitNewGroup'])){ //check if form was submitted
    $userID = test_input($_POST['inputFName']); //get input text
    $groupTitle = test_input($_POST['inputEmail']); //get input text
    $groupDesc = test_input($_POST['inputPass']); //get input text

    // Create data
    $group->insert($userID,$groupTitle,$groupDesc);
  }
  if(isset($_POST['SubmitNewPost'])){ //check if form was submitted
    $postTitle = test_input($_POST['gTitle']); //get input text
    $postBody = test_input($_POST['GDesc']); //get input text
    $coverIMG = test_input($_POST['coverIMG']); //get input text
    $coverIMG_URL = test_input($_POST['coverIMG']); //get input text
    $cDate = date ("Y-m-d H:i:s");
    $eDate = date ("Y-m-d H:i:s");
    $groupID = $_POST['selectedGroup'];
    // Create data
    $post->insert($postTitle,$postBody,$coverIMG,$coverIMG_URL,$cDate,$eDate,$groupID);
  }

   ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  Full Name: <input type="text" name="inputFName" required/>
  Email Address: <input type="text" name="inputEmail" required/>
  Password: <input type="password" name="inputPass" required/>
  <br><input type="submit" name="SubmitButton"/>
</form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  Cover Image: <input type="file" name="coverIMG" required/>
  Post Title: <input type="text" name="gTitle" required/>
  Post Descritpion: <textarea name="GDesc" required> </textarea>
  <select name="selectedGroup" required>
    <?php
    $group->selectInput();
    ?>
</select>
  <br><input type="submit" name="SubmitNewPost"/>
</form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  User ID: <input type="text" name="inputFName" required/>
  Group Title: <input type="text" name="inputEmail" required/>
  Group Descritpion: <textarea name="inputPass" required> </textarea>
  <br><input type="submit" name="SubmitNewGroup"/>
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
