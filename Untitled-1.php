header("Content-Type: application/octet-stream");
$file = 'C:\xampp\htdocs\DBMS PROJECT\LIBRARY MANAGEMENT SYSTEM.pptx';  
header("Content-Disposition: attachment; filename=" . basename($file));   
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
//$file = "pdf/".$file;
flush(); // this doesn't really matter.
$fp = fopen($file, "r");
while (!feof($fp)) {
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
}
--------------------------------------------------------------
    //Read the url
    $url = 'C:\xampp\htdocs\DBMS PROJECT\LIBRARY MANAGEMENT SYSTEM.pptx';  
    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

    //Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($url).'"');
    header('Content-Length: ' . filesize($url));
    header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($url,true);

    //Terminate from the script
    die();