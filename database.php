<?php
    //create database connection'
    $dbhost="localhost";
    $dbuser="widget_cms";
    $dbpass="password";
    $dbname="widget_corp";
    
    $connection=  mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    //test if connection occured
    if (mysqli_connect_errno()){
        die("Database Connection Failed".mysqli_connect_error().
                "(".mysqli_connect_errno().")");
    }
?>
<!doctype>
<html>
    <head>
        <title>Database</title>
    </head>
    <body>
          <?php
          
          ?>

    </body>
</html>
<?php 
    //5.close the database connection
    mysqli_close($connection);
?>


