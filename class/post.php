<?php
/**
 * Define MyClass
 */
class posts
{
  private $servername = "localhost";
  private $username = "imjswxjj_Jsearle";
  private $password = "password";
  private $dbname = "testdb";



    function insert($postTitle,$postBody,$coverIMG,$coverIMG_URL,$cDate,$eDate,$groupID){ /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO post (postTitle, postBody, cover_IMG_Title, cover_IMG_URL, post_Date, last_Edit_Date, groupID)VALUES ('$postTitle','$postBody','$coverIMG','$coverIMG_URL','$cDate','$eDate','$groupID')";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }

    function readAll(){ /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM post";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "id: " . $row["postID"]. " - Title: " . $row["postTitle"]. " - postBody: " . $row["postBody"]. " - Cover Img: " . $row["cover_IMG_Title"]. " - cover_IMG_URL: " . $row["cover_IMG_URL"]." - post_Date: " .
             $row["post_Date"]. " - Last Edit: " . $row["last_Edit_Date"] . " - group ID: " . $row["groupID"]. "<br>";
          }
      } else {
          echo "0 results";
      }
      $conn->close();
    }
    function update($ID,$postTitle,$postBody,$coverIMG,$cover_IMG_URL,$cDate,$eDate,$groupID){ /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "UPDATE post SET postTitle = '$postTitle', postBody = '$postBody', cover_IMG_Title = '$coverIMG', cover_IMG_URL= '$cover_IMG_URL', post_Date = ' $cDate', last_Edit_Date = '$eDate', groupID = '$groupID' WHERE postID = $ID";

      if ($conn->query($sql) === TRUE) {
          echo "New record updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
    function delete($id){  /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM post WHERE userID = $id";

      if ($conn->query($sql) === TRUE) {
          echo "Record deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    function emptyTable(){  /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM post";

      if ($conn->query($sql) === TRUE) {
          echo "Records deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
}
?>
