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
        $tempCards = $deck->cards;
        for($i = 0; $i < $n; $i++){
            $c = $deck->deal_one_card();
            if($c != null)
                $output .= $c->commonName . " of " . $c->suit .", ";
        }

        return substr($output, 0, -2);
    }

    $output = "<h1>Jamie Fule Test Output</h1><br>";

    //--------------------------------Testing-----------------------------
    $testDeck = new Deck();
    //-------------------------Test 1-------------------------------------
    //Check for a normal 52 card deck
    $output .= "<h3>Test 1: Is the deck populated fully?</h3>";
    $test1Result = printDeckInOrder($testDeck);

    //check if 52 cards were printed
    if(sizeof(explode(", ", $test1Result)) == 52)
        $output .= "<b style='color: green;'>Test 1 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 1 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test1Result . "</textarea>";
    
    //-------------------------Test 2-------------------------------------
    //Testing that deal_one_card succesfully prints the full deck in order
    $output .= "<h3>Test 2: Dealing all Cards, does the output match test 1?</h3>";
    $test2Result = dealNCards($testDeck, 52);
    
    if($test1Result == $test2Result)
        $output .= "<b style='color: green;'>Test 2 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 2 Failed</b><br>";
        

        $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test2Result . "</textarea>";

    //-------------------------Test 3-------------------------------------
    //Testing that the deck reset function properly resets after all te cards are drawn
    $output .= "<h3>Test 3: Does resetDeck() reset the deck after all cards got dealt?</h3>";

    $testDeck->resetDeck();

    $test3Result = printDeckInOrder($testDeck);


    if($test1Result == $test3Result)
        $output .= "<b style='color: green;'>Test 3 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 3 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test3Result . "</textarea>";

    //-------------------------Test 4-------------------------------------
    //Testing that the deck gets shuffled (Making sure test1Result differs from test4Result)
    $output .= "<h3>Test 4: Is the deck shuffled?</h3>";

    $testDeck->shuffle();
    $test4Result = printDeckInOrder($testDeck);
    
    if($test1Result != $test4Result)
        $output .= "<b style='color: green;'>Test 4 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 4 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test4Result . "</textarea>";
    //-------------------------Test 5-------------------------------------
    //Test that dealing cards results in the deck properly being shortened, so no duplicates exist
    $output .= "<h3>Test 5: Can you shuffle cards after dealing?</h3>";
    
    $output .= "<p>Cards Dealt: " . dealNCards($testDeck, 2) . "</p> <br>";

    $testDeck->shuffle();
    $test5Result = printDeckInOrder($testDeck);

    //make sure that its not just the same output with the top two trimmed
    if(sizeof(explode(", ", $test5Result)) == 50 && $test5Result != array_slice(explode(", ", $test3Result), -2))
        $output .= "<b style='color: green;'>Test 5 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 5 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test5Result . "</textarea>";

    //-------------------------Test 6-------------------------------------
    //Test that you can't get more than the allowed cards
    $output .= "<h3>Test 6: What happens if you draw more cards than are in the deck?</h3>";

    $test6Result = dealNCards($testDeck, 55);

    //should only be 50 since we already drew 2 cards
    if(sizeof(explode(", ", $test6Result)) == 50)
        $output .= "<b style='color: green;'>Test 6 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 6 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test6Result . "</textarea>";

    //-------------------------Test 7-------------------------------------
    //Test that dealing cards results in the deck properly being shortened, so no duplicates exist
    $output .= "<h3>Test 7: Can you shuffle an empty deck? The deck should still be empty.</h3>";

    $testDeck->shuffle();

    $test7Result = printDeckInOrder($testDeck);

    //verify that deck is still empty
    if(sizeof($testDeck->cards) == 0)
        $output .= "<b style='color: green;'>Test 7 Passed</b><br>";
    else
        $output .= "<b style='color: red;'>Test 7 Failed</b><br>";

    $output .= "<p>Output:</p><textarea rows=6 cols=100>" . $test7Result . "</textarea>";

    echo $output;
    
?>
