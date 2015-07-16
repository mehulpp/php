<pre>
<?php

print_r($_POST);

?>
</pre>
<br/>
<?php

$username=$_POST['name'];
$password=$_POST['password'];

echo "{$username}:{$password}";