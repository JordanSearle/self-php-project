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

  public $postID;
  public $postTitle;
  public $postBody;
  public $cover_IMG_URL;
  public $cover_IMG_Title;
  public $post_Date;
  public $last_Edit_Date;
  public $groupID;


    function test(){
    echo $this->getPostID() .$this->getPostTitle() . $this->getPostBody() . $this->getCoverIMGURL() . $this->getCoverIMGTitle() . $this->getPostDate() . $this->getLastEditDate() . $this->getGroupID() . "<br>";
    }
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
      $postList = [];
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM post";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row

          while($row = $result->fetch_assoc()) {
              $post = new posts();

              $post->setPostID($row["postID"]);
              $post->setPostTitle($row["postTitle"]);
              $post->setPostBody($row["postBody"]);
              $post->setCoverIMGURL($row["cover_IMG_URL"]);
              $post->setCoverIMGTitle($row["cover_IMG_Title"]);
              $post->setPostDate($row["post_Date"]);
              $post->setLastEditDate($row["last_Edit_Date"]);
              $post->setGroupID($row["groupID"]);

              //echo $post->getPostTitle();
              //echo $row["postID"].$row["postTitle"].$row["postBody"].$row["cover_IMG_URL"].$row["cover_IMG_Title"].$row["post_Date"].$row["last_Edit_Date"].$row["groupID"];
             $postlist[] = $post;
          }
      } else {
          echo "0 results";
      }
      $conn->close();
      return $postlist;
    }

    function update(){ /**Edited Correctly **/
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "UPDATE post SET postTitle = '$this->$postTitle', postBody = '$this->$postBody', cover_IMG_Title = '$this->$cover_IMG_Title', cover_IMG_URL= '$this->$cover_IMG_URL', post_Date = ' $this->post_Date', last_Edit_Date = '$this->last_Edit_Date', groupID = '$this->$groupID' WHERE postID = $this->$postID";

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




    /**
     * Get the value of Post
     *
     * @return mixed
     */
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * Set the value of Post
     *
     * @param mixed postID
     *
     * @return self
     */
    public function setPostID($postID)
    {
        $this->postID = $postID;

        return $this;
    }

    /**
     * Get the value of Post Title
     *
     * @return mixed
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * Set the value of Post Title
     *
     * @param mixed postTitle
     *
     * @return self
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;

        return $this;
    }

    /**
     * Get the value of Post Body
     *
     * @return mixed
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * Set the value of Post Body
     *
     * @param mixed postBody
     *
     * @return self
     */
    public function setPostBody($postBody)
    {
        $this->postBody = $postBody;

        return $this;
    }

    /**
     * Get the value of Cover IMG URL
     *
     * @return mixed
     */
    public function getCoverIMGURL()
    {
        return $this->cover_IMG_URL;
    }

    /**
     * Set the value of Cover IMG URL
     *
     * @param mixed cover_IMG_URL
     *
     * @return self
     */
    public function setCoverIMGURL($cover_IMG_URL)
    {
        $this->cover_IMG_URL = $cover_IMG_URL;

        return $this;
    }

    /**
     * Get the value of Cover IMG Title
     *
     * @return mixed
     */
    public function getCoverIMGTitle()
    {
        return $this->cover_IMG_Title;
    }

    /**
     * Set the value of Cover IMG Title
     *
     * @param mixed cover_IMG_Title
     *
     * @return self
     */
    public function setCoverIMGTitle($cover_IMG_Title)
    {
        $this->cover_IMG_Title = $cover_IMG_Title;

        return $this;
    }

    /**
     * Get the value of Post Date
     *
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_Date;
    }

    /**
     * Set the value of Post Date
     *
     * @param mixed post_Date
     *
     * @return self
     */
    public function setPostDate($post_Date)
    {
        $this->post_Date = $post_Date;

        return $this;
    }

    /**
     * Get the value of Last Edit Date
     *
     * @return mixed
     */
    public function getLastEditDate()
    {
        return $this->last_Edit_Date;
    }

    /**
     * Set the value of Last Edit Date
     *
     * @param mixed last_Edit_Date
     *
     * @return self
     */
    public function setLastEditDate($last_Edit_Date)
    {
        $this->last_Edit_Date = $last_Edit_Date;

        return $this;
    }

    /**
     * Get the value of Group
     *
     * @return mixed
     */
    public function getGroupID()
    {
        return $this->groupID;
    }

    /**
     * Set the value of Group
     *
     * @param mixed groupID
     *
     * @return self
     */
    public function setGroupID($groupID)
    {
        $this->groupID = $groupID;

        return $this;
    }

}
?>
