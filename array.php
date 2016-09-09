<?php 
	$flavour=array("vanilla","chocolate","Strawberry","Chocochip");
	?>
	<pre>
		<?php 
		var_dump($flavour);	
		echo "There are total::".count($flavour)."In array"."\n";
			foreach ($flavour as $name) {
				# code...
				echo $name."\n";
			}
		 ?>
	</pre>


	<?php 
	//associative arrays
		//$countries=new array();
		$countries["IN"]="India";
		$countries["US"]="USA";
		$countries["UK"]="United state Of Kingdom";
		$countries["SL"]="SriLanka";
		$countries["AU"]="Australia";

		echo $countries["IN"];


	 ?>
	 <?php 
	 	$country=new array();
	 	$country["code"]="IN";
	 	$country["name"]="India";
	 	$country["capital"]="Delhi";
	 	$country["population"]="122ml";
	 	$country["anthem"]="JAN GAN MAN";
	 	$country["PM"]="Narendra Modi";
	 	$country["president"]="Dr.Pranab Mukhrji";

	  ?>
	   <?php 
	 	$country=new array(
	 		"code"=>"IN","India",
	 		"capital"=>"Delhi",
	 		"population"=>"122ml",
	 		"national_anthem"=>"JAN GAN MAN",
	 		"Prime_minister"=>"Narendra Modi",
	 		"president"=>"Dr.Pranab Mukhrji"
	 		);
		var_dump_pre($data){
			
		$bt =  debug_backtrace();
		echo "<b>Calling file:</b>". $bt[0]['file'];
		echo "<br><b>line no :</b>". $bt[0]['line'];
		if(is_array($data)) {
			print "<pre>-----------------------\n";
			print_r($data);
			print "-----------------------</pre>";
		} elseif (is_object($data)) {
			print "<pre>==========================\n";
			var_dump($data);
			print "===========================</pre>";
		} else {

			print "=========&gt; ";
			var_dump($data);
			print " &lt;=========";

		}
	
		}
	  ?>
	  <h1>
	  	
	  </h1>
	
