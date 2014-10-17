<?php
// Helper function courtesy of https://github.com/guzzle/guzzle/blob/3a0787217e6c0246b457e637ddd33332efea1d2a/src/Guzzle/Http/Message/PostFile.php#L90
function getCurlValue($filename, $contentType, $postname)
{
    // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
    // See: https://wiki.php.net/rfc/curl-file-upload
    if (function_exists('curl_file_create')) {
        return curl_file_create($filename, $contentType, $postname);
    }

    // Use the old style if using an older version of PHP
    $value = "@{$this->filename};filename=" . $postname;
    if ($contentType) {
        $value .= ';type=' . $contentType;
    }

    return $value;
}

function uploadFile($url, array $data)
{
    $ch = curl_init();
    $options = array(CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLINFO_HEADER_OUT => true, //Request header
        CURLOPT_HEADER => true, //Return header
        CURLOPT_SSL_VERIFYPEER => false, //Don't veryify server certificate
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array('multipart/form-data') //form data
    );

    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    $header_info = curl_getinfo($ch, CURLINFO_HEADER_OUT);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($result, 0, $header_size);
    $body = substr($result, $header_size);
    curl_close($ch);

    return array(
        'result' => $result,
        'header_info' => $header_info,
        'header_size' => $header_size,
        'header' => $header,
        'body' => $body
    );
}


$filename = '/path/to/file.jpg';
$cfile = getCurlValue($filename, 'image/jpeg', 'cattle-01.jpg');

//NOTE: The top level key in the array is important, as some apis will insist that it is 'file'.
$data = array('file' => $cfile);

//DO
$url = 'http://host';
uploadFile($url, $data);
?>