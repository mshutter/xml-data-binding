function getCountdown (event) {
	var today = new Date();
	var countdown = event - today;

	var days = Math.floor(countdown / (24 * 60 * 60 * 1000));

	countdown = countdown - days * (24 * 60 * 60 * 1000);
	var hours = Math.floor(countdown / (60 * 60 * 1000));

	countdown = countdown - hours * (60 * 60 * 1000);
	var minutes = Math.floor(countdown / (60 * 1000));

	countdown = countdown - minutes * (60 * 1000);
	var seconds = Math.floor(countdown / (1000));

	var strTime = days+"d "+hours+"h "+minutes+"m "+seconds+"s";
	return strTime;
}

$(document).ready(function () {
	var springBreak = new Date("March 14, 2015 00:00:00");

	$('#timer').contents().first().replaceWith(getCountdown(springBreak));
	setInterval(function () {
		$('#timer').contents().first().replaceWith(getCountdown(springBreak));
	}, 1000);
});