<?php
    class Deck{
        public $cards;
        public $discarded;

        //creates a newly populated deck of cards
        public function __construct() {
            $cards = populateCards();
        }

        //if you already had a deck of cards in mind
        public function __construct($c) {
            $cards = $c;
        }

        public function shuffle(){

        }

        public function deal_one_card(){

            return $card;
        }

        function populateCards(){
            $suits = ['hearts', 'diamonds', 'spades', 'clubs'];
            $pos = 0;

            for($i = 0; $i < 3; $i++){
                for($j = 0; $j < 13; $j++){
                    array_push($card, new Card($suits[$i], $j, $pos));
                    $pos++;
                }
            }   
        }
    }
?>