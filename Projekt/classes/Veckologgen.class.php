<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

require_once 'Post.class.php';
class Veckologgen {
    //constructor for veckologgen
    public function __construct($db) {
        $this->db = $db;
    }

    //destructor for veckologgen
    public function __destruct() {
        $this->db->close();
    }

    //add new post to db and update the file
    public function newPost($uid, $message, $date) {
        $sql = "INSERT INTO posts(uid, description, text, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("isss", $uid, $message, $message, $date);
        $stmt->execute();
    }

    //delete post from posts array delete post from database
    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE pid = " . $id;
        $this->db->query($sql);
    }

    public function getPosts() {
        //join posts and users table
        $sql = "SELECT posts.pid, posts.description, posts.text, posts.date, users.username FROM posts INNER JOIN users ON posts.uid = users.uid ORDER BY posts.pid DESC";
        
        //get result from query
        $result = $this->db->query($sql);
        $posts = array();
        //loop through result and add to posts array
        while ($row = $result->fetch_assoc()) {
            $post = new Post($row['pid'], $row['username'], $row['description'], $row['text'], $row['date']);
            array_push($posts, $post);
        }
        return $posts;
         
        
    }

    

    private $db;
    //posts( pid 	description 	text 	    uid 	date 	)
    //users( id 	username 	    password 	create_at       )

}

?>