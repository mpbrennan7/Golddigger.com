<?php
$curl = curl_init('https://www.zipcodeapi.com/API#distance');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
 
$page = curl_exec($curl);
 
if(curl_errno($curl)) // check for execution errors
{
	echo 'Scraper error: ' . curl_error($curl);
	exit;
}
 
curl_close($curl);
$dom = new DOMDocument;
$dom->loadHTML($page);
$key = $dom->getElementsByTagName('value');
foreach ($key as $k) {
        echo $k;
		//$k->setAttribute('src', 'http://example.com/' . $image->getAttribute('src'));
}

/*"myAttr=\"([^\"]+)\""
$regex ='/<input class="input-block-level" type="text" name="api_key" value="(*)" required="required" ///>';
//$regex = '/<div id="case_textlist">(.*?)<\/div>/s';
if ( preg_match($regex, $page, $list) )
    echo $list[0];
else 
    print "Not found"; 

 <div class="span6">
                                                        <label>API Key</label>
                                                        <input class="input-block-level" type="text" name="api_key" value="iF3M7s7kbXdGF2v3LGq6DpJ97fKXWlSKBdUtIzEs0333Ph1NY3AS6EKEcADCNqMq" required="required" />
                                                </div>
*/
?>