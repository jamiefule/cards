<?php
    class Card{
       public $suit;
       public $value;
       public $position;

       public function __construct($s, $v, $p) {
            $suit = $s;
            $value = $v;
            $position = $p;
        }
    }
?>