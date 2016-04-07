<?php
	$pageTitle = "";
	include "includes/header.php";
	include "includes/left.php";
?>

<article.type-system-traditional>
	<h2>The Story</h2>
	<p class="article">
		Michael "Mike" Shutter (born <?php echo $birthdate; ?>) is an American rapper, actor, and entrepreneur.
		He initially was affiliated with the record label Swishahouse, then left to found his own label, Ice Age Entertainment.
		Before he was on Swishahouse he was in a group called Souf Folk, in which he used the alias Sache. He released one album with Souf Folk called Country Thuggin in 2013.
		He is also known for his catchphrase "MIKE SHUTTER, WHO!, MIKE SHUTTER, WHO..." usually repeated several times and for handing out shirts with his cell phone number printed on the back.
	</p>
</article>

<h3>Courses</h3>

<input id="get-record" type="button" value="See My Courses!">
<div id="courses">
	<table>
		<thead>
			<th>Name</th>
			<th>Prof</th>
			<th>Info</th>
		</thead>
		<tbody id="table-body">
			<!-- This is where 'courses.xml' data records will go. -->
		</tbody>
	</table>
</div>

<div class="clearfix"></div>

<script>
	// Create SimpleXMLElement Object
	<?php $courses = simplexml_load_file("xml/courses.xml") or die("Unable to retrieve courses.xml"); ?>
	
	// Get total number of records in XML
	var count = <?php echo $courses->count(); ?>;
	var records = [];
	var i = 0;

	// Populate records[] array with records
	<?php foreach ($courses as $course) : ?>
		records[i] = "<td>" + "<?php echo $course->name; ?>" + "</td>";
		records[i] += "<td>" + "<?php echo $course->prof; ?>" + "</td>";
		records[i] += "<td>" + "<?php echo $course->info; ?>" + "</td>";
		i++;
	<?php endforeach; ?>

	// Function will return next record, reseting at records.length
	function getNextCourseRecord () {
		var n = 0;

		function getCourseRecord () {
			n++;
			if (n >= records.length) {
				n = 0;
			}
			return records[n];
		}
		return getCourseRecord;
	}

	$(document).ready(function () {
		var getCourseRecord = getNextCourseRecord();

		// Target table body and populate with next record on #get-record click
		var tbody = $('#table-body');
		$('#get-record').on('click', function () {
			if (tbody.children().length > 0) {
				tbody.html(getCourseRecord());			
			} else {
				tbody.append(getCourseRecord());
			}
		});
	});
</script>

<?php include "includes/footer.php"; ?>