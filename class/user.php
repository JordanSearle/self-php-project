<?php
/**
 * Define MyClass
 */
class user
{
  private $servername = "localhost";
  private $username = "imjswxjj_Jsearle";
  private $password = "password";
  private $dbname = "testdb";

    function createTable(){

    }

    function insert($table,$inputName,$inputEmail,$inputPasword){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO $table (fullname, email, password)VALUES ('$inputName', '$inputEmail', '$inputPasword')";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }

    function readAll($table){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM $table";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "id: " . $row["userID"]. " - Name: " . $row["fullname"]. "<br>";
          }
      } else {
          echo "0 results";
      }
      $conn->close();
    }
    function update($table,$inputName,$inputEmail,$inputPasword,$id){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "UPDATE $table SET fullname = '$inputName' , email = '$inputEmail', password = '$inputPasword' WHERE userID = $id";

      if ($conn->query($sql) === TRUE) {
          echo "New record updated successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
    function delete($table,$id){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM $table WHERE userID = $id";

      if ($conn->query($sql) === TRUE) {
          echo "Record deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    function emptyTable($table){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "DELETE FROM $table";

      if ($conn->query($sql) === TRUE) {
          echo "Records deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
}
?>
