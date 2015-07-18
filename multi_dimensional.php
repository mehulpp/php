<?php 
	//$countries=new array();
	$countries[0]=array(
		"code"=>"IN",
		"Name"=>"India",
	 		"capital"=>"Delhi",
	 		"population"=>"122ml",
	 		"national_anthem"=>"JAN GAN MAN",
	 		//"Prime_minister"=>"Narendra Modi",
	 		"president"=>"Dr.Pranab Mukhrji"
	 		);
	$countries[1]=array(
		"code"=>"US",
		"Name"=>"United State",
	 		"capital"=>"Washington D.C",
	 		"population"=>"22500000",
	 		"national_anthem"=>"The star-spangled Banner",
	 		"president"=>"Barak Obama"
	 		);
	$countries[2]=array(
		"code"=>"DE",
		"Name"=>"germany",
	 		"capital"=>"Berlin",
	 		"population"=>"8715212",
	 		"national_anthem"=>"song of the german",
	 		"president"=>"Unknow"
	 		);


	 		foreach ($countries as $country) {?>
		<h1><?php echo $country["Name"] ?></h1>
		<dl>
			<dt>Country Code</dt>
			<dd><?php echo $country["code"]; ?></dd>
			<dt>Country Capital</dt>
			<dd><?php echo $country["capital"]; ?></dd>
			<dt>Country Population</dt>
			<dd><?php echo $country["population"]; ?></dd>
		</dl>	
	<?php } ?>
