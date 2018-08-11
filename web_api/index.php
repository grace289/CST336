<?php
include('header.php');
?>
<div class="jumbotron text-center">
<h1>eBay <b>Search API</b></h1>
   <div class="input-group Container col col-sm-5" style="margin-left: 30%;margin-top: 2%;margin-bottom: 2%">
        <input type="text" id="keyword" class="form-control" style="height: 50px" size="50" placeholder="Enter a keyword e.g watch, book, phone, etc" required>
        <div class="input-group-btn">
            <button type="button" style="height:50px" onclick="search_ebay()" class="btn btn-danger">Search</button>
        </div>
    </div>
      <span style="color: black" id="error"></span> 
      <b><span id="keyword_status"></span></b>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container text-center bg-grey">
	<img src="loading.gif" id="loading"  class="col col-md-3" style="margin-left:37% ;display: none; width: 100px; height: 50px;">
<div id="results" class="text-center">
 </div>
<br>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#keyword").keyup(function(){
	    	if($('#keyword').val().length > 3){ 
				   $keyword = $('#keyword').val();
	        	   $.ajax({
	                url: "keyword_status.php",
	                type: "POST",
	                data: {
	                    'keyword' : $keyword,
	                    'search_token' :'XAZXCVB##@E'
	                },
	                success: function ($response) {
	                    console.log('success');
						$('#keyword_status').text($response);
	                }
	            });	
	    	}
	    });
	});
	function search_ebay(){
		$keyword = $('#keyword').val();
		if($keyword == ''){
			$("#error").text('[X] Please enter any keyword here ');
		}
		else{
		    $('#results').empty();
			$('#loading').css('display','block');
			   $.ajax({
                url: "ebay.php",
                type: "POST",
                data: {
                    'keyword' : $keyword,
                    'search_token' :'XAZXCVB##@E'
                },
                success: function ($response) {
                    console.log('records found');
					$('#loading').css('display','none');            					
                    $('#results').empty();
                    $('#results').append($response);
                }
            });
		}
	}
</script>
<?php
	include('footer.php');
?>