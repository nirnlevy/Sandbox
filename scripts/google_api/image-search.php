<?php
$input = array("kitten", "cat");
$rand_keys = array_rand($input, 2);
?> 

<!--
  copyright (c) 2009 Google inc.

  You are free to copy and use this sample.
  License can be found here: http://code.google.com/apis/ajaxsearch/faq/#license
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  
  <style>
  *{text-align:center;margin:auto;width:100%!important;}
  img{width:100%!important;height:100%;}
  </style>
  
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Free Candy</title>
    <script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script type="text/javascript">
    /*
    *  How to search for images and restrict them by size.
    *  This demo will also show how to use Raw Searchers, aka a searcher that is
    *  not attached to a SearchControl.  Thus, we will handle and draw the results
    *  manually.
    */
    
    google.load('search', '1');
    
    function searchComplete(searcher) {
      // Check that we got results
      if (searcher.results && searcher.results.length > 0) {
        // Grab our content div, clear it.
        var contentDiv = document.getElementById('content');
        contentDiv.innerHTML = '';
    
        // Loop through our results, printing them to the page.
        var results = searcher.results;
        for (var i = 1; i < results.length; i++) {
          // For each result write it's title and image to the screen
          var result = results[i];
          var imgContainer = document.createElement('div');
          
          var title = document.createElement('h2');
          // We use titleNoFormatting so that no HTML tags are left in the title
          title.innerHTML = result.titleNoFormatting;
          
          var url = document.createElement('h2');
          url.innerHTML = result.unescapedUrl;
    
          var newImg = document.createElement('img');
          // There is also a result.url property which has the escaped version
          newImg.src = result.tbUrl;
          	document.write('<img class="image" src="')
          	document.write(url.innerHTML);
          	document.write('" />')    		
    		
    	/// <img src="URL" />	
    		
          // Put our title + image in the content
          contentDiv.appendChild(imgContainer);
        }
      }
    }
    
    function OnLoad() {
      // Our ImageSearch instance.
      var imageSearch = new google.search.ImageSearch();
    
      // Restrict to extra large images only
      imageSearch.setRestriction(google.search.ImageSearch.RESTRICT_IMAGESIZE,
                                 google.search.ImageSearch.IMAGESIZE_LARGE);
      var rand_no = Math.floor((7)*Math.random()) + 2;
      imageSearch.setResultSetSize(rand_no);
    
      // Here we set a callback so that anytime a search is executed, it will call
      // the searchComplete function and pass it our ImageSearch searcher.
      // When a search completes, our ImageSearch object is automatically
      // populated with the results.
      imageSearch.setSearchCompleteCallback(this, searchComplete, [imageSearch]);
    
      // Find me the candy
      imageSearch.execute("<?php echo $input[$rand_keys[0]]?>");
    }
    google.setOnLoadCallback(OnLoad);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="content">Loading...</div>
  </body>
</html>
​