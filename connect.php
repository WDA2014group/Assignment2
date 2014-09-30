<?php
require_once('db.php');
if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
echo 'Could not connect to mysql on ' . DB_HOST . '\n';
exit;
}
 echo 'Connected to mysql <br />';
 echo 'Connected to database ' . DB_NAME;
?>
