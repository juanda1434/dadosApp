<?php

echo "hola";
if (isset($_GET["pin"]) && $_GET["pin"]) {
    echo json_encode(array("pon"));
}
