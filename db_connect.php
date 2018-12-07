<!--This project was made following the steps in a tutorial made by @mayomidele1-->

<?php

#mysqli_connect() is a PHP function use for connecting to MySQL database, this function takes in four arguments, the servername, username, password and the database name in that order

    function db(){
        global $link;
        $link = mysqli_connect("localhost","root", "","todolist") or die("couldn't connect to database");
        return $link;
    }

#to check if we are really connected:
    /*
        if(db()) {
            echo "wawu !!! I'm connected";
        }
    */
?>