<?php
session_start();
if (isset($_SESSION["loginEstudiante"])) {
    session_destroy();    
}

header("Location: Inicio");