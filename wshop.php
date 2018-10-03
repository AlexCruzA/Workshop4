<?php
$row = 1;
$csvFile = $argv[1];
$textFile = $argv[2];

if (($handle = fopen($csvFile, "r")) !== FALSE) {
	
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        var_dump($data[0]);

        echo  $data[0] . " " . $data[1] . " lives in " . $data[3] . " and his phone number is " . $data[2] . "\n";
        
        $file = $textFile;
        // Open the file to get existing content
        $current = file_get_contents($file);
        // Append a new person to the file
        $current .= $data[0] . " " . $data[1] . " lives in " . $data[3] . " and his phone number is " . $data[2] . PHP_EOL;
        // Write the contents back to the file
        file_put_contents($file, $current);
    }
    fclose($handle);
}

?>