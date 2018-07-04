<?php
    $backgroundImage = "img/sea.jpg";
    
    //API call goes here
    
    if(isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $imageURLs = getImageURLs($keyword);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            body{
                background-image: url(<?=$backgroundImage?>);
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body>
        <br>
        <?php
        
        if(!isset($imageURLs)){ //form has not been submitted
            echo "<h2> Type a keyword to display a slideshow with random images from Pixabay.com </h2>";
        } else{
             //form was submitted
        ?>
            <!--Display carousel here-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!--Indicators Here -->
            <ol class="carousel-indicators">
            <?php
                for($i = 0; $i < 7; $i++){
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'";
                    echo ($i == 0) ? "class='active'" : "";
                    echo "></li>";
                }
            ?>
            
            </ol>
            
          
            <!--Wrapper for Images-->
            <div class="carousel-inner" role="listbox">
            <?php
                for($i = 0; $i < 7; $i++){
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    } while(!isset($imageURLs[$randomIndex]));
                    echo '<div class="carousel-item ';
                    echo($i == 0) ? "active": "";
                    echo '">';
                    echo '<img src ="' . $imageURLs[$randomIndex] . '">';
                    echo'</div>';
                    unset($imageURLs[$randomIndex]);
                }
            ?>
        </div>
        
        
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>

        <?php
        } //end of else statement
        ?>
        <br>
        <!-- HTML Form goes here! -->
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for ="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            <select name = "category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option value ="forest">Forest</option>
                <option value ="mountains">Mountains</option>
                <option value ="snow">Snow</option>
                <option value ="otter">Otters</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>