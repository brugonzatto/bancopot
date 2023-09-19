<?php
require_once "./controller/ValidAuth.php";

try {
	session_destroy();
} catch (Exception $e) {
	echo $e->getMessage();
}

?>
<meta HTTP-EQUIV="refresh" CONTENT="1; URL = index.php"><title>Saindo do sistema...</title>