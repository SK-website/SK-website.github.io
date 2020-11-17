<?php

//if(file_exists(CONFIG.'/contact.txt')){
 //   echo "<h2>File exists</h2>";
//}else{
//    echo "<h2>File is not exist</h2>";
//    $fh = fopen(CONFIG.'/contact.txt', 'w');
//    fclose($fh);
//}

file_put_contents(CONFIG.'/contact.txt', "Hello File");
$jf = file_get_contents(CONFIG.'/configs.json');
$data = json_decode($jf);
var_dump($data);

echo "<h2>REQUEST:</h2>";
var_dump($_REQUEST);
echo "<h2>GET:</h2>";
var_dump($_GET);
echo "<h2>POST:</h2>";
var_dump($_POST);
?>
<h1>Test Controller</h1>
<form action="/test" method="POST">
    <label for="">Name:</label>
    <input type="text" name="username" value="My name">
    <input type="submit" name="submit" value="testvalue">
</form>