<?php
require './card.php';

    class Deck{
        public $cards = [];
        public $discarded = [];

        public function __construct($c = null) {
            if($c != null)
                $cards = $c;
            else
                self::populateCards();
        }

        public function shuffle(){
            global $cards;
            //craft a new deck from randomly selected cards in the current deck
            $newDeck = [];

            //while deck has cards left, pick a random card and add it to the new deck
            while(!empty($cards)){
                $r = rand(0, sizeof($cards) - 1);
                array_splice($cards, $cards[$r]->position, 1);
                array_push($newDeck, $r);
            }

            //set the cards to the newly shuffled deck
            $cards = $newDeck;
        }

        public function deal_one_card(){
            $c =array_pop($this->cards);

            //add removed card to the discarded pile
            $this->discarded[] = $c;
            
            return $c;
        }

        function populateCards(){

            $suits = ['Hearts', 'Diamonds', 'Spades', 'Clubs'];
            $commonName = ["Ace", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Jack", "Queen", "King"];
            
            for($i = 0; $i <= 3; $i++){
                for($j = 1; $j <= 13; $j++){
                    $this->cards[] =  new Card($suits[$i], $j, $commonName[$j-1]);
                }
            }   
        }

        function resetDeck(){
            $this->cards = array_reverse($this->discarded);
        }
    }
?>