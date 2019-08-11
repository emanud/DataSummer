<?php

/* This script takes a csv file containing a list of words and outputs 
 * a csv file with the same words sorted alphabetically, the total number 
 * of words in the file and the average length of the words. 
 * 
 */


// The csv file containing a list of words
$input_file_name = 'Foglio1.csv';

// The output file name
$ordered_file_name = 'Ordered_file.csv';

//Checking the existence of an output file of a previous execution, then deleting.
if (file_exists($ordered_file_name)) {
    unlink($ordered_file_name);
}

// Check if the input file exists
if (file_exists($input_file_name)) {
    // Takes input content as an array
    $file = file($input_file_name);

    // Sort the array values alphabetically
    sort($file);

    // Count the number of rows
    $number_of_rows = count($file);


    foreach ($file as $key => $value) {
        // Put the value in the output file
        file_put_contents($ordered_file_name, $value, FILE_APPEND);
        // Add the lengths of the row in a new variable
        $lengths += strlen(trim($value));
    }

    // Calculation of the average length
    $average_length = round($lengths / $number_of_rows);

    // Print the results in HTML
    echo '<h1>Results</h1>';

    echo '<ul>'
    . '<li>Total number of Words: ' . $number_of_rows . '</li>'
    . '<li>Average words lenght: ' . $average_length . '</li>'
    . '<li>Link for Download ordered files: <a href="' . $ordered_file_name . '">Open ordered file</a></li>'
    . '</ul>';
} else {
    // Print error message 
    echo '<h3>The input file ' . $input_file_name . ' doesn\'t exist</h3>';
}
