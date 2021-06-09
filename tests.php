<?php
    //Test file
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require './deck.php';
    
    function printDeckInOrder($deck){
        $output = "";
        
        for($i = sizeof($deck->cards) - 1; $i >= 0; $i--){
            $output .= $deck->cards[$i]->commonName . " of " . $deck->cards[$i]->suit .", ";
        }
        
        return substr($output, 0, -2);
    }
    
    function dealNCards($deck, $n){
        $output = "";

        for($i = 0; $i < $n; $i++){
            $c = $deck->deal_one_card();
            $output .= $c->commonName . " of " . $c->suit .", ";
        }

        return substr($output, 0, -2);
    }

    $testDeck = new Deck();
    
    $output = "<h3>Deck In Order (Top to Bottom)</h3>";

    $output .= "<textarea rows=10 cols=100>" . printDeckInOrder($testDeck) . "</textarea>";

    $output .= "<h3>Deal all Cards (Output Should Match)</h3>";
    
    $output .= "<textarea rows=10 cols=100>" . dealNCards($testDeck, 52) . "</textarea>";

    $output .= "<h3> Reset Deck (Output Should Match <h3>";

    $testDeck->resetDeck();

    $output .= "<textarea rows=10 cols=100>" . printDeckInOrder($testDeck) . "</textarea>";

    $output .= "<h3>Shuffled Deck (Output Should Differ)</h3>";

    //TODO: Finish Shuffle
    $testDeck->shuffle();

    $output .= "<textarea rows=10 cols=100>" . printDeckInOrder($testDeck) . "</textarea>";

    echo $output;
?>