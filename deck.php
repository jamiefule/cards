<?php
require './card.php';

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
            //craft a new deck from randomly selected cards in the current deck
            $newDeck = [];

            //while deck has cards left, pick a random card and add it to the new deck
            while(!empty($cards)){
                $r = rand(0, $cards.length - 1);
                array_splice($cards, $r->$position, 1);
                array_push($newDeck, $r);
            }

            //set the cards to the newly shuffled deck
            $cards = $newDeck;
        }

        public function deal_one_card(){
            $r = rand(0, $cards.length - 1);
            array_splice($cards, $r->$position, 1);
            //add removed card to the discarded pile
            array_push($discarded, $r);

            return $cards[$r];
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