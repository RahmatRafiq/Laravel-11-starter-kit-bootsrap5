// Sparkline 1
var options1 = {
	series: [
		{
			data: [30, 90, 60, 75, 45, 30],
		},
	],
	chart: {
		type: "area",
		height: 40,
		width: 240,
		sparkline: {
			enabled: true,
		},
	},
	stroke: {
		curve: "smooth",
		width: 1,
	},
	colors: ["#eaacb7"],
	tooltip: {
		fixed: {
			enabled: false,
		},
		x: {
			show: false,
		},
		y: {
			title: {
				formatter: function (seriesName) {
					return "";
				},
			},
		},
		marker: {
			show: false,
		},
	},
};

var chart1 = new ApexCharts(document.querySelector("#sparkline1"), options1);
chart1.render();
