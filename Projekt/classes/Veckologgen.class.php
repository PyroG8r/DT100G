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
    public function newPost($uid, $description, $message, $date, $tags) {
        $sql = "INSERT INTO posts(uid, description, text, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("isss", $uid, $description, $message, $date);
        $stmt->execute();

        //if tags are set, add them to the tags table
        if (isset($tags)) {
            // update tags table with new post tags
            $pid = $this->db->insert_id;
            // for loop to add all tags to the tags table
            for ($i = 0; $i < count($tags); $i++) {
                $sql = "INSERT INTO taggedposts(tagid, pid) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ii", $tags[$i], $pid);
                $stmt->execute();
            }
        }

    }

    //delete post from posts array delete post from database
    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE pid = " . $id;
        $this->db->query($sql);
    }

    public function getPosts() {
        //join posts and users table
        $sql = "SELECT posts.pid, posts.description, posts.text, posts.date, users.username FROM posts INNER JOIN users ON posts.uid = users.uid ORDER BY posts.pid ASC";
        
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

    public function newTags($tags) {
        // for loop to add all tags to the tags table
        // return array of tag ids
        $tagids = array();
        for ($i = 0; $i < count($tags); $i++) {
            $sql = "INSERT INTO tags(name) VALUES (?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $tags[$i]);
            $stmt->execute();
            array_push($tagids, $this->db->insert_id);
        }
        return $tagids;
        
        
    }

    public function getTags($pid) {
        $sql = "SELECT tags.name FROM tags INNER JOIN taggedposts ON tags.tagid = taggedposts.tagid WHERE taggedposts.pid = " . $pid;
        $result = $this->db->query($sql);
        $tags = array();
        while ($row = $result->fetch_assoc()) {
            array_push($tags, $row['name']);
        }
        return $tags;
    }

    

    private $db;
    //posts( pid 	description 	text 	    uid 	date 	)
    //users( id 	username 	    password 	create_at       )

}

?>