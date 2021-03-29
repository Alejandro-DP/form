<?php
    class Data {
        public $name;
        public $email;
        public $package;
        public $movie;
        public $price;

        public function __construct($name,$email,$package,$movie,$price){
            $this->name = $name;
            $this->email = $email;
            $this->package = $package;
            $this->movie = $movie;
            $this->price = $price;
        }
    }
?>