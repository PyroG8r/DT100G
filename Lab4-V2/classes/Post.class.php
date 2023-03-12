<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

class Post {
    public function __construct(string $uid, string $name, string $message, string $date) {
        $this->uid = $uid;
        $this->name = $name;
        $this->message = $message;
        $this->date = $date;
    }

    public function getUid() {
        return $this->uid;
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

    private $uid;
    private $name;
    private $message;
    private $date;


}

?>