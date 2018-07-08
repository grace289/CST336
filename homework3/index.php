<?php
    $confident = 0;
    $independent = 0;
    $relaxed = 0;
    $shy = 0;
    $adaptable = 0;
    
function checkSelected($option) {
    if ($option == $_GET['Question1']) {
        return "selected";
    }
}
function addMark($dog) {
    global $confident, $independent, $relaxed, $shy, $adaptable;
    if($dog == "confident")
        $confident++;
    else if($dog == "independent")
        $independent++;
    else if($dog == "relaxed")
        $relaxed++;
    else if($dog == "shy")
        $shy++;
    else if($dog == "adaptable")
        $adaptable++;
}
function getAnswer($name, $Question1, $Question2, $Question3, $Question4) {
    global $confident, $independent, $relaxed, $shy, $adaptable;
    addMark($Question1);
    addMark($Question2);
    addMark($Question3);
    addMark($Question4);
    
    if(!isset($_GET["submit"]))
        echo "";
    else if(empty($name) || empty($Question1) || empty($Question2) || empty($Question3) || empty($Question4)) {
        echo "<h1 id='error'> Form incomplete! All fields required </h1>";
        return;
        exit;
    } else {
        display($name);
    }
}
function display($name) {
    global $confident, $independent, $relaxed, $shy, $adaptable;
    echo "<div id='answer'>";
    $dog = array($confident, $independent, $relaxed, $shy, $adaptable);
    $index = 0;
    for ($i = 0; $i < 5; $i++) {
        if ($dog[$i] > $dog[$index]) {
            $index = $i;
        }
    }
    echo "<h1 id='display'> $name";
    switch($index) {
        
        case 0: 
            echo " you are condfident and strong... just like a german shepherd!</br>";
            echo '<div align="center">';
                 echo '<img src="img/german_shepherd.jpg">';
                 echo '</div><br />';
            break;
        case 1:
            echo " you are independent... just like an Alaskan Malamute! ";
            echo '<div align="center">';
                 echo '<img src="img/alaskan-malamute.jpg">';
                 echo '</div><br />';
            break;
        case 2: // relaxed
            echo " you are laid back and relaxed!";
            echo '<div align="center">';
                 echo '<img src="img/relaxed_dog.jpg">';
                 echo '</div><br />';
            break;
        case 3: // shy
            echo " you are shy or timid!";
            echo '<div align="center">';
                 echo '<img src="img/shy.jpg">';
                 echo '</div><br />';
            break;
        case 4: // adaptable
            echo " you are adaptable... just like a Golden Retriever!";
            echo '<div align="center">';
                 echo '<img src="img/golden_retriever.jpg">';
                 echo '</div><br />';
            break;
    }
    echo "</h1></div>";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>What Type of Dog Are You?</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        @import url("css/styles.css");
        @import url('https://fonts.googleapis.com/css?family=Chewy');
        </style>
        <header>What Type of Dog Are You?</header>
    </head>
    
    <body style="background-image: url('/CST336/homework3/img/dog-bone-background.jpg');">
        
        <div class="backgroundimg" />
        
        <div class="container">

        <?php
          getAnswer($_GET["Name"],
                    $_GET["Question1"],
                    $_GET["Question2"],
                    $_GET["Question3"],
                    $_GET["Question4"]);
        ?>
        <form method="GET">
            <h3>What is your name?</h3>
            <input type = "text" name = "Name" value=<?=$_GET["Name"]?>>
            
            
            <h3>In a group project you are most likely to...</h3>
            <select name="Question1">
                <option value="">Select One</option>
                <option <?=checkSelected("confident")?> value="confident"> Be the leader </option>
                <option <?=checkSelected("independent")?> value="independent"> I prefer to work alone </option>
                <option <?=checkSelected("relaxed")?> value="relaxed"> Take whatever's left </option>
                <option <?=checkSelected("shy")?> value="shy"> Follow the leader </option>
                <option <?=checkSelected("adaptable")?> value="adaptable"> Help where I can </option>
            </select>
            
            
            <h3>What do people find most intimidating about you?</h3>
            <input type="radio" name="Question2" value="confidence" <?=($_GET['Question2']=="confidence")?"checked":"" ?>>
            <label for = "A3">Your looks</label> <br/>
            <input type="radio" name="Question2" value="independent" <?=($_GET['Question2']=="independent")?"checked":"" ?>>
            <label for = "A3">You're competitive</label> <br/>
            <input type="radio" name="Question2" value="relaxed" <?=($_GET['Question2']=="relaxed")?"checked":"" ?>>
            <label for = "A3">You don't care</label> <br/>
            <input type="radio" name="Question2" value="shy" <?=($_GET['Question2']=="shy")?"checked":"" ?>>
            <label for = "A3">You're quiet</label> <br/>
            <input type="radio" name="Question2" value="adaptable" <?=($_GET['Question2']=="adaptable")?"checked":"" ?>>
            <label for = "A3">Nothing</label> <br/>
            
            <h3>Question 4: How do you relax?</h3>
            <input type="radio" name="Question3" value="confidence" <?=($_GET['Question3']=="confidence")?"checked":"" ?>>
            <label for = "A3">Socialize</label> <br/>
            <input type="radio" name="Question3" value="independent" <?=($_GET['Question3']=="independent")?"checked":"" ?>>
            <label for = "A3">Read</label> <br/>
            <input type="radio" name="Question3" value="relaxed" <?=($_GET['Question3']=="relaxed")?"checked":"" ?>>
            <label for = "A3">Watch TV</label> <br/>
            <input type="radio" name="Question3" value="shy" <?=($_GET['Question3']=="shy")?"checked":"" ?>>
            <label for = "A3">Play Video Games</label> <br/>
            <input type="radio" name="Question3" value="adaptable" <?=($_GET['Question3']=="adaptable")?"checked":"" ?>>
            <label for = "A3">Go with the flow</label> <br/>
            
            <h3>At a party you...</h3>
            <input type="checkbox" name="Question4" value="confident" <?=($_GET['Question4']=="confident")?"checked":"" ?>>
            <label for = "A3">Say hi to everyone</label> <br/>
            <input type="checkbox" name="Question4" value="independent" <?=($_GET['Question4']=="independent")?"checked":"" ?>>
            <label for = "A3">I don't like parties</label> <br/>
            <input type="checkbox" name="Question4" value="relaxed" <?=($_GET['Question4']=="relaxed")?"checked":"" ?>>
            <label for = "A3">Grab a drink and mingle</label> <br/>
            <input type="checkbox" name="Question4" value="shy" <?=($_GET['Question4']=="shy")?"checked":"" ?>>
            <label for = "A3">Look for familiar faces and stay with them</label> <br/>
            <input type="checkbox" name="Question4" value="adaptable" <?=($_GET['Question4']=="adaptable")?"checked":"" ?>>
            <label for = "A3">Kick it with the first group of people I meet</label> <br/>
            
            <input class="btn" type="submit" name="submit" value="Submit">
            
        </form>
        </div>
        
        
        <footer>
        <hr>
        <div class="marquee">
       <div>
        <span>Dogs Rule!</span>
       </div>
    </div>
        <figure>
            <img id="csumb" src="img/csumb.png" alt="CSUMB Logo" />
        </figure>
        CST336. 2018 &copy; Alvarez<br/>
        <strong>Disclaimer:</strong> The information in this webpage is ficticious. It is used for academic purposes only.
        
    </footer>
        
    </body>
</html>