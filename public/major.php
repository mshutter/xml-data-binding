<?php
	$pageTitle = "";
	include "includes/header.php";
	$future = simplexml_load_file('xml/future.xml') or die ('Couldn\'t get future.xml');
	$major = $future->major;
?>

<h2>My Major: <?php echo $major->name; ?></h2>

<div id="info">
	<h3>Information</h3>
	<p>
		<?php echo $major->info; ?>
	</p>
	<div class="clearfix"></div>
	<h3>Learning Outcomes</h3>
	<ul id="outcomes">
		<?php
			$outcome = $major->outcomes->outcome;
			foreach ($outcome as $data) {
				echo "<li>".$data."</li>";
			}
		?>
	</ul>
</div>
<button id="formatting-fun">This list is boring...</button>
<div class="clearfix"></div>

<script>
	function formattingFun () {
		var hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
		var a, b, c, d, e, f;

		// For each 'li' in #outcomes list...
		for (var i = 0; i < ($('#outcomes > li').length); i++) {

			// Generate a random hexadecimal color value...
			a = hex[Math.floor(Math.random() * 16)];
			b = hex[Math.floor(Math.random() * 16)];
			c = hex[Math.floor(Math.random() * 16)];
			d = hex[Math.floor(Math.random() * 16)];
			e = hex[Math.floor(Math.random() * 16)];
			f = hex[Math.floor(Math.random() * 16)];

			// and apply it to each list item's color and background-color.
			$('#outcomes > li:eq('+i+')').css('background-color', '#'+a+b+c+d+e+f);
			$('#outcomes > li:eq('+i+')').css('color', '#'+f+e+d+c+b+a);
		};

		// ... also, change the button text.
		$('#formatting-fun').html("That's more like it!");
	}

	$(document).ready(function () {

		$('#formatting-fun').on('click', function () { setInterval(formattingFun, 200); });
	});
</script>

<?php include "includes/footer.php" ?>