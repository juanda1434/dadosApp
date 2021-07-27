<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author USUARIO
 */
class Database {
  
    public function connect(){
        $usuario="root";
        $contrasenia="";
        $baseDatos="dados";
        $host="localhost";
        

       $link = new PDO("mysql:host=$host;dbname=$baseDatos",$usuario,$contrasenia);
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $link;
    }
}
