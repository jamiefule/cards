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
            //craft a new deck from randomly selected cards in the current deck
            $newDeck = [];

            //while deck has cards left, pick a random card and add it to the new deck
            while(!empty($this->cards)){
                $r = rand(0, sizeof($this->cards) - 1);
                $c = $this->cards[$r];
                array_splice($this->cards, $r, 1);
                array_push($newDeck, $c);
            }

            //set the cards to the newly shuffled deck
            $this->cards = $newDeck;
        }

        public function deal_one_card(){
            $c =array_pop($this->cards);

            //add removed card to the discarded pile
            $this->discarded[] = $c;
            
            if($c != null)
                return $c;
            return;
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

        //if the deck has run out, move the cards from the discarded pile back to the regular pile
        function resetDeck(){
            if(empty($this->card))
                $this->cards = array_reverse($this->discarded);
        }
    }
?>