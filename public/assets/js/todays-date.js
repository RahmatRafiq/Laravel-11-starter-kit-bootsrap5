// Today Date
$(function () {
	var interval = setInterval(function () {
		var momentNow = moment();
		$("#todays-date").html(
			momentNow.format("MMMM . DD") +
				" " +
				momentNow.format(". dddd").substring(0)
		);
	}, 100);
});
