<?php
    class Card{
       public $suit;
       public $value;
       public $commonName;
       
       public function __construct($s, $v, $cn) {
            $this->suit = $s;
            $this->value = $v;
            $this->commonName = $cn;
        }
    }
?>