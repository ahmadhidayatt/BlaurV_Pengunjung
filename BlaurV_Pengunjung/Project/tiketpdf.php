<?php
require 'js/lib/pdfcrowd-4.3.6/pdfcrowd.php';

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("andribangpak", "0a6714b46b192248711a59231d485afd");

    // create output file for conversion result
    $output_file = fopen("MyLayout.pdf", "wb");

    // check for a file creation error
    if (!$output_file)
        throw new \Exception(error_get_last()['message']);

    // run the conversion and store the result into a pdf variable
    $pdf = $client->convertFile("tiketing.php");

    // write the pdf into the output file
    $written = fwrite($output_file, $pdf);

    // check for a file write error
    if ($written === false)
        throw new \Exception(error_get_last()['message']);

    // close the output file
    fclose($output_file);
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // handle the exception here or rethrow and handle it at a higher level
    throw $why;
}

?>