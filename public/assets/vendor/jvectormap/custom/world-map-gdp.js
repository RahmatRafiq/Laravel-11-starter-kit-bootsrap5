// World Map GDP
$(function () {
	$("#world-map-gdp").vectorMap({
		map: "world_mill_en",
		zoomOnScroll: false,
		series: {
			regions: [
				{
					values: gdpData,
					scale: ["#0073d8"],
					normalizeFunction: "polynomial",
				},
			],
		},
		backgroundColor: "transparent",
		onRegionTipShow: function (e, el, code) {
			el.html(el.html() + " (GDP - " + gdpData[code] + ")");
		},
	});
});
