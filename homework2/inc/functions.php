<?php

    function play(){
        ${"randomValue" . $i} = rand(0,2);
        displayCard1(${"randomValue" . $i}, $i);
        displayCard2(${"randomValue" . $i}, $i);
        displayCard3(${"randomValue" . $i}, $i);
        
    }
 
 
     function displayCard1($randomValue, $pos){
        echo "<div id='output1'>";
        $cards1 = array("Flower_01", "supershroom_01", "Star_01");
        shuffle($cards1);
        foreach ($cards1 as $card) {
            print $pos;
            echo "<img id='card1' src='img/$card.png' width='250'>";
            
    }
            echo "</div>";
    }
    
    function displayCard2($randomValue, $pos){
        echo "<div id='output2'>";
        $cards2 = array("Flower_02", "supershroom_02", "Star_02");
        shuffle($cards2);
        foreach ($cards2 as $card) {
            print $pos;
            echo "<img id='card2' src='img/$card.png' width='250'>";
            
    }
            echo "</div>";    
    }

    function displayCard3($randomValue, $pos){
        echo "<div id='output3'>";
        $cards3 = array("Flower_03", "supershroom_03", "Star_03");
        shuffle($cards3);
        foreach ($cards3 as $card) {
            print $pos;
            echo "<img id='card3' src='img/$card.png' width='250'>";
    }
            echo "</div>";    
    }
    
    
?>    