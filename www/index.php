
<?php

//Now on Github

// Debug function => Plots to console
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = json_encode($output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

 // Generates an Array of Domains with UTM Tag
 function generateUTMTags($url, $slashtag) {
    $utmMediums = array('GCN' => "G", 'Twitter' => "T", 'Instagram' => "I", 'Strava' => "S");
    $outputArray = array();

    foreach ($utmMediums as $medium => $prepend) {
            $domainWithTag = $url . "?utm_source=" . $medium;
            $outputArray[] = array(
                "domain" => $domainWithTag,
                "slashtag" => $prepend . $slashtag,
            );
    }

    debug_to_console("DOMAINS: " . $outputArray);
    return $outputArray;
}

// Creates a ShortURL via Rebrandly API
function createShortUrls($domain) {
    $apiKey = 'c2d2d1039e404c3d955d74f829d84d9a'; // created by Rebrandly
        
    $urlToShorten = $domain['domain'];
    $slashtag = $domain['slashtag'];
    $brandedDomain = array("id" => "522a045c14af4923996e6746a38e3e76"); //faster.li

    $data = array(
        'destination' => $urlToShorten,
        'slashtag' => $slashtag,
        'domain' => $brandedDomain,
    );

    $json_data = json_encode($data);
    debug_to_console("SEND => " . $json_data);
    
    $ch = curl_init('https://api.rebrandly.com/v1/links');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'apikey: ' . $apiKey,
    ));

    $response = curl_exec($ch);
    debug_to_console("REPONSE <= " . $response);
    
    curl_close($ch);
    

    $shortUrlData = json_decode($response, true);
            
    return $shortUrlData;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>UTM Tag Generator</title>
</head>
<body>
    <h1>UTM Tag Generator</h1>
    <form method="post">
        <label for="domain">Domain:</label>
        <input type="text" id="domain" name="domain" required>
        <br><br>
        <label for="slashtag">Slashtag:</label>
        <input type="text" id="slashtag" name="slashtag" required>
        <br><br>
        <input type="submit" value="Generate UTM Tags">
    </form>

    <?php
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $domain = $_POST["domain"];
        $slashtag = $_POST["slashtag"];

        $urls = generateUTMTags($domain, $slashtag); // array mit domains
        
        echo "<h2>Generated Short Links:</h2>";
        echo "<ul>";
        
        foreach ($urls as $url) {
            $short = createShortUrls($url); // shorten every domain
            debug_to_console($short);

            echo "<li><b>Destination:</b> " . $short["destination"] . ", <b>Short: </b>" . $short["shortUrl"] . "</li>";
        }
        
        echo "</ul>";
    }
    
    ?>
</body>
</html>