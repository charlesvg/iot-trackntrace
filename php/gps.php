<?php
/*
$req_dump = print_r($_POST, TRUE);
$fp = fopen('request.log', 'a');
fwrite($fp, $req_dump);
fclose($fp);
*/
<?php
file_put_contents("post.log",print_r($_POST,true));
?>
OK
