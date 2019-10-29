<?php

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_close($dbc);
require_once(SKIN_DIR . '/admin_question.php');
?>

