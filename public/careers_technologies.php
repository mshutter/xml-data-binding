<?php
	$pageTitle = "";
	include "includes/header.php";
	$future = simplexml_load_file('xml/future.xml') or die ('Couldn\'t get future.xml');
	$career = $future->careers->career;
	$tech = $future->techs->tech;
?>

<div id="future-tables">
	<table id="careers">
		<thead>
			<th>Name</th>
			<th>Requirements</th>
			<th>Information</th>
			<th>Average Salary</th>
		</thead>
		<tbody>
			<?php foreach ($career as $data) : ?>
			<tr>
				<td><?php echo $data->name; ?></td>
				<td><?php echo $data->reqs; ?></td>
				<td><?php echo $data->info; ?></td>
				<td><?php echo $data->salary; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<table id="technologies">
		<thead>
			<th>Name</th>
			<th>Type</th>
			<th>Information</th>
		</thead>
		<tbody>
			<?php foreach ($tech as $data) : ?>
				<tr>
					<td><?php echo $data->name; ?></td>
					<td><?php echo $data->type; ?></td>
					<td><?php echo $data->info; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<img id="camelpic" src="img/camel.jpg" alt="stupid camel" />
</div>

<script>
	function deletePage () {
		if (confirm("Are you sure you want to delete this page?...\nI worked really hard on it.")) {
			var fakeError = '<h2 style="background-color:red;">606 ERROR:</h2><h3>Page content has been deleted by reckless user. :\'\(</h3>';
			var homeLink = '<a href="index.php">Return Home</a>';
			$('#future-tables').children().hide();
			$('.nav').remove();
			$('#future-tables').css('height', '300px');
			$('#future-tables').append(fakeError + homeLink);
		}
	}

	function showTable (n) {
		$('#careers').hide();
		$('#technologies').hide();
		$('#camelpic').hide();

		switch (n) {
			case 1:
				$('#careers').show();
				break;

			case 2:
				$('#technologies').show();
				break;

			default:
				$('#camelpic').show();
				break;
		}
	}

	$(document).ready(function () {
		var input = prompt("Which table would you like to view, 'careers' or 'technologies'?");

		switch (input) {
			case 'careers':
				alert('Yes, master.');
				showTable(1);
				break;

			case 'technologies':
				alert('Wow! What a great speller you are!');
				showTable(2);
				break;

			default:
				alert('What?... that wasn\'t a choice.\nHere\'s a picture of a camel, stupid.');
				showTable(3);
		}

		var careerButton = '<li class="nav-element"><button onclick="showTable(1)">Careers</button></li>';
		var techButton = '<li class="nav-element"><button onclick="showTable(2)">Technologies</button></li>';
		var camelButton = '<li class="nav-element"><button onclick="showTable(3)">Camel</button></li>';
		var deleteButton = '<li class="nav-element"><button onclick="deletePage()" style="background-color:red;">DELETE</button></li>';

		$('.nav > ul').append(careerButton + techButton + camelButton + deleteButton);

	});
</script>

<?php include "includes/footer.php" ?>