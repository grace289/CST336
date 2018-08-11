<?php
if(isset($_POST['search_token']) && $_POST['search_token'] == 'XAZXCVB##@E'){
    include('database.php'); 
    $sql = "SELECT `count` FROM keywords where keyword = '".$_POST['keyword']."' limit 1";
    $count = $conn->query($sql);
    if (isset($count->num_rows) && $count->num_rows > 0) {
        while($row = $count->fetch_assoc()) {
            echo ("The keyword ".$_POST['keyword']." has been searched ".$row['count']." time(s)");    
        }
    }
     else {
       echo ("this keyword never searched !");
    } 
    $conn->close();
}
?>
