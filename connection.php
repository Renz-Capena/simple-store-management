<?php 
    function connect(){
        $sql = new mysqli('localhost','root','','store');

        return $sql;
    }
?>