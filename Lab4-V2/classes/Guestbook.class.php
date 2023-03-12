<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

require_once 'classes/Post.class.php';

class Guestbook {
    //constructor for guestbook
    public function __construct() {
        //set database connection( table: guestbook, columns: id, name, message, date )
        $this->db = mysqli_connect("studentmysql.miun.se", "emjo2109", "t6h9zn2p", "emjo2109") or die('Fel vid anslutning');
        //read database
        $this->readDatabase();
    }

    //destructor for guestbook
    public function __destruct() {
        $this->db->close();
    }

    //add new post to guestbook and update the file
    public function newPost($name, $message, $date) {
        //add new post to database
        $sql = "INSERT INTO guestbook (name, message, date) VALUES ('" . $name . "', '" . $message . "', '" . $date . "')";
        $this->db->query($sql);

        //Preferred way to do it, prevents sql injection
        /*//prepare sql statement using prepared statements
        $sql = "INSERT INTO guestbook (name, message, date) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $name, $message, $date);
        $stmt->execute();
        $stmt->close();
        */

        //get id from inserted post
        $sql = "SELECT id FROM guestbook ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];

        //create new post
        $this->posts[] = new Post(strval($id), $name, $message, $date);
    }

    //delete post from posts array delete post from database
    public function deletePost($id) {
        //delete the nth ($id) row (post) from database
        $sql = "DELETE FROM guestbook WHERE id = " . $id;
        $this->db->query($sql);
        
        //delete post from posts array with id $id
        foreach($this->posts as $key => $post) {
            if($post->getUid() == $id) {
                unset($this->posts[$key]);
            }
        }
    }

    public function getPosts() {
        return $this->posts;
    }

    //get all posts from database
    private function readDatabase() {
        $sql = "SELECT * FROM guestbook";
        $result = $this->db->query($sql);
        //fill posts array with posts from database
        while($row = $result->fetch_assoc()) {
            $this->posts[] = new Post($row['id'], $row['name'], $row['message'], $row['date']);
        }
    }


    private $posts = [];
    private $db;
    
    

}

?>