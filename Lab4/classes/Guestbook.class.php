<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

require_once 'classes/Post.class.php';

class Guestbook {
    //constructor for guestbook read from file
    public function __construct() {
        $this->readFromFile();
    }

    //add new post to guestbook and update the file
    public function newPost(string $name, string $message, string $date) {
        $this->posts[] = new Post($name, $message, $date);
        $this->saveToFile();
    }

    //delete post, and update the file
    public function deletePost(int $index) {
        unset($this->posts[$index]);
        $this->saveToFile();
    }
    
    private function saveToFile() {
        $file = fopen('data/data.txt', 'w');
        foreach ($this->posts as $post) {
            fwrite($file, $post->getName() . ';' . $post->getMessage() . ';' . $post->getDate() . PHP_EOL);
        }
        fclose($file);
    }

    private function readFromFile() {
        $file = fopen('data/data.txt', 'r');
        while ($line = fgets($file)) {
            $post = explode(';', $line);
            $this->posts[] = new Post($post[0], $post[1], $post[2]);
        }
        fclose($file);
    }

    public function getPosts() {
        return $this->posts;
    }

    private $posts = [];

}

?>