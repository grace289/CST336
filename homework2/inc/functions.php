<?php








$ballAnswer = array(
    "It is certain.", 
    "It is decidedly so.",
    "Without a doubt" ,
    "Yes - definitely.",
    "You may rely on it.",
    "As I see it, yes.",
    "Most Likely.",
    "Outlook good.",
    "Yes.",
    "Signs point to yes.",
    "Ask again later.",
    "Better not tell you now.",
    "Concentrate and ask again.",
    "Don't count on it.",
    "My reply is no.",
    "My sources say no.",
    "OUtlook not so good.",
    "Very Doubtful.",
    "No." );
    
    echo $ballAnswer[array_rand($ballAnswer)];
    
    $random_keys=array_rand($ballAnswer, 19);
    
        function play(){
        for($i=1; $i<19; $i++){
            ${"random_keys" . $i} = rand(0,19);
            displaySymbol(${"random_keys" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        }

    function displaySymbol($randomValue, $pos){        
        switch($randomValue) {
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "bar";
            break;
            case 2: $symbol = "cherry";
            break;
            case 3: $symbol = "lemon";
            break;
        }        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol) . "' width='70' >";
    }
        
    function displayText($ballAnswer){
        echo "<div id='output'>";
        if($ballAnswer){
            switch($random_keys){
                case 0: $ballAnswer = "Yes.";
                    echo "<audio src='sound/jackpot.mp3' autoplay> </audio>";
                    break;
            }
             
            }
            else {
            echo "<h3> Try again! </h3>";
        }
        echo "</div>";
    }

    

    
    
    
    
    
    
    


?>