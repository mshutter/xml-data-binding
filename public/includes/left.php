<?php
	ini_set('error_reporting', E_ALL-E_NOTICE);
	ini_set('display_errors', 1);

	$xml = simplexml_load_file("xml/details.xml") or die("Failed to load details.xml");

	$fname = $xml->fname;
	$lname = $xml->lname;
	$gender = $xml->gender;
	$age = $xml->age;
	$birthdate = $xml->birthdate;
?>

<div class="left">
	<h3>About Me:</h3>
	<img src="img/handsome.jpg" alt="A handsome Face" />
	<p>Name: 
		<span id="my-fname">
			<?php echo $fname; ?>
		</span>
		&nbsp;
		<span id="my-lname">
		<?php echo $lname; ?>
	</span>
	</p>

	<p>Gender: <span id="my-gender">
		<?php echo $gender; ?>
	</span></p>

	<p>Age: <span id="my-age">
		<?php echo $age; ?>
	</span></p>

	<p>Birth Date: <span id="my-birthdate">
		<?php echo $birthdate; ?>
	</span></p>

</div>