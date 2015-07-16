
<html>
    <head>
        <title>Validations</title>
    </head>
    <body>  
       <?php
       /*
        * 
        * Presence*/
       $value="x" ;
      if (!isset($value) || empty($value)){
          echo 'Validation failed.<br/>';
      }
       /*
        * String length*/
      $value="mehul";
      $min=3;
      if(strlen($value) < $min){
          echo 'Validation Failed.<br/>';
      }
      //max length
      $max=6;
      if(strlen($value) >$max){
          echo 'Validation Failed.<br/>';
      }
      /*
        * type*/
      $value="12";
      
      if(!is_string($value)){
          echo 'Validation Failed.<br/>';
      }
      /*
        * Inclusion in a set
       * */
      $value=6;
      $set=array("1","2","3","4","5");
      if(!in_array($value,$set)){
          echo 'Validation Failed.<br/>';
      }
      /*
        * uniquness
        * format    */
      //use a regex on a string
      //preg_match($regex,$subject)
      if (preg_match("/PHP/", "PHP is fun.")){
          echo 'A match was found';
      }else{
          echo "A MATCH was not found";
      }
       $value="@gmail.com";
       if (!preg_match("/@/",$value)){
           echo 'Validation failed.<br/>';
       }
       ?>
    </body>
</html>