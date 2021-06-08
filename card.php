<?php
    class Card{
       public $suite;
       public $value;
       public $position;

       function __construct($s, $v, $p) {
            $suite = $s;
            $value = $v;
            $position = $p;
        }
    }
?>