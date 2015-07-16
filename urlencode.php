<html>
<head>
	<title>Url Encode</title>
</head>
<body>
	<?php 
		$page="William Shakespeare";
		$quote="To be or not TO be";
		$link1 ="/bio/".rawurlencode($page)."?quote=".rawurlencode($quote);
		$link2 ="/bio/".urlencode($page)."?quote=".urlencode($quote);

		echo $link1."<br/>";
		echo $link2."<br/>";

	 ?>

</body>
</html>