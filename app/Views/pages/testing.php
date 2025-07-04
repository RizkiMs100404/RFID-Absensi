<?php
$user = session('userData');

?>
<p><?php 
foreach ($user as $key => $value) {
    echo "$key: $value<br>";
}

?></p>