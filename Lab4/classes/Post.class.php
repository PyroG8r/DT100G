<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

class Post {
    public function __construct(string $name, string $message, string $date) {
        $this->name = $name;
        $this->message = $message;
        $this->date = $date;
    }
    public function getName() {
        return $this->name;
    }
    public function getMessage() {
        return $this->message;
    }
    public function getDate() {
        return $this->date;
    }


    private $name;
    private $message;
    private $date;


}

?>