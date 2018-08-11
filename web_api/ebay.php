<!-- Gathered information for this file from
http://developer.ebay.com/DevZone/merchandising/docs/HowTo/PHP_Merchandising/PHP_gMWI_GSI_gRCI_NV_XML/PHP_gmwi_gsi_grci_NV_XML.html
-->

<?php
if(isset($_POST['search_token']) && $_POST['search_token'] == 'XAZXCVB##@E'){
    error_reporting(E_ALL);
    
    // API request variables
    $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';
    $version = '1.0.0'; 
    $appid = 'GraceAlv-api-PRD-2262ede01-4632b3bd'; 
    $globalid = 'EBAY-US';
    $query = $_POST['keyword'];

    $safequery = urlencode($query); 

    $i = '0';  // Initialize the item filter index to 0
    $urlfilter = '';

    $filterarray =
      array(
        array(
        'name' => 'MaxPrice',
        'value' => '1000',
        'paramName' => 'Currency',
        'paramValue' => 'USD'),
        array(
        'name' => 'FreeShippingOnly',
        'value' => 'true',
        'paramName' => '',
        'paramValue' => ''),
        array(
        'name' => 'ListingType',
        'value' => array('AuctionWithBIN','FixedPrice','StoreInventory'),
        'paramName' => '',
        'paramValue' => ''),
      );
      // Generates an indexed URL snippet from the array of item filters
    function buildURLArray ($filterarray) {
      global $urlfilter;
      global $i;
      // Iterate through each filter in the array
      foreach($filterarray as $itemfilter) {
        // Iterate through each key in the filter
        foreach ($itemfilter as $key =>$value) {
          if(is_array($value)) {
            foreach($value as $j => $content) { // Index the key for each value
              $urlfilter .= "&itemFilter($i).$key($j)=$content";
            }
          }
          else {
            if($value != "") {
              $urlfilter .= "&itemFilter($i).$key=$value";
            }
          }
        }
        $i++;
      }
      return "$urlfilter";
    } // End of buildURLArray function


    $start = time();

     if (isset($_GET["xx"])) {
      $xx=$_GET["xx"];

    }else{  
        $xx= '2';
    }
     
    // Construct the findItemsByKeywords HTTP GET call 
    $apicall = "$endpoint?";
    $apicall .= "OPERATION-NAME=findItemsByKeywords";
    $apicall .= "&SERVICE-VERSION=$version";
    $apicall .= "&SECURITY-APPNAME=$appid";
    $apicall .= "&GLOBAL-ID=$globalid";
    $apicall .= "&keywords=$safequery";
    $apicall .= "&paginationInput.entriesPerPage=24";
    // Build the indexed item filter URL snippet
    
    buildURLArray($filterarray);
    $apicall .= "$urlfilter";

    // Load the call and capture the document returned by eBay API
    $resp = simplexml_load_file($apicall);

    // Check to see if the request was successful, else print an error
    if ($resp->ack == "Success") {
      $results = '';
      // If the response was loaded, parse it and build links  
      foreach($resp->searchResult->item as $item) {
        $pic   = $item->galleryURL;
        $title = $item->title;
      	$id = $item->itemId;
        $itemlink = $item->viewItemURL;
        $price = $item->sellingStatus->currentPrice;
        // For each SearchResultItem node, build a link and append it to $results
        $results .= '   
              <div class="col-sm-2" id="'.$id.'" >
                  <div class="thumbnail">
                      <img src="'.$pic.'" alt="'.$title.'" style="height:100px;width:100px">
                      <p><strong>'.substr($title, 0, 50).'</strong></p>
                      <p><b>$ '.$price.'</b></p>
                      <p><a target="_blank" href="'.$itemlink.'">Click here to reach orignal URL</a></p>
                  </div>
              </div>
                ';
      }
    }
    // If the response does not indicate 'Success,' print an error
    else {
      $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
      $results .= "AppID for the Production environment.</h3>";
    }
    echo $results;
    include('database.php');
    
    $sql = "SELECT `count` FROM keywords where keyword = '".$query."' limit 1";
    $count = $conn->query($sql);
    //print_r($count);
    //exit();
    if (isset($count->num_rows) && $count->num_rows > 0) {
        while($row = $count->fetch_assoc()) {
            $sql = "UPDATE keywords SET count='".($row['count']+1)."' WHERE keyword='".$query."'";
            if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
            } else {
                //echo "Error updating record: " . $conn->error;
            }     
        }
    }
     else {
       $sql1 = "INSERT INTO keywords (`keyword`, `count`) VALUES ('".$query."', '1')";
            if ($conn->query($sql1) === TRUE) {
               //echo "New record created successfully";
            } 
            else {
                //echo "Error: " . $sql1 . "<br>" . $conn->error;
          }
    } 

    $conn->close();
}
?>
