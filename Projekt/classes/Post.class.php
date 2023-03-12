<?php
declare(strict_types=1); // Check for type cast problems
error_reporting(E_ALL); // Report and exit for all errors

class Post {
    public function __construct(string $pid, string $name, string $description, string $text, string $date) {
        $this->pid = $pid;
        $this->name = $name;
        $this->description = $description;
        $this->text = $text;
        $this->date = $date;
    }

    public function getPid() {
        return $this->pid;
    }

    public function getName() {
        return $this->name;
    }
    public function getMessage() {
        return $this->description;
    }
    public function getText() {
        return $this->text;
    }
    public function getDate() {
        return $this->date;
    }

    private $pid;
    private $name;
    private $description;
    private $text;
    private $date;


}

?>