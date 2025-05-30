<?php
session_start();
session_destroy();
header("Location: cards.php");
exit;
