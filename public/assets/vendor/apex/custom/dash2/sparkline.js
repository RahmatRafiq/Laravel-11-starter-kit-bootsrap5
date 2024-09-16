var options1 = {
	series: [
		{
			data: [10, 20, 30, 40, 30, 50, 70],
		},
	],
	chart: {
		type: "line",
		width: "75%",
		height: 40,
		sparkline: {
			enabled: true,
		},
	},
	colors: ["#0073d8"],
	stroke: {
		curve: "smooth",
		width: 3,
	},
	tooltip: {
		fixed: {
			enabled: false,
		},
		x: {
			show: false,
		},
		marker: {
			show: false,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
};

var chart1 = new ApexCharts(
	document.querySelector("#sparklineLine1"),
	options1
);
chart1.render();

var options2 = {
	series: [
		{
			data: [10, 20, 30, 40, 30, 50, 70],
		},
	],
	chart: {
		type: "line",
		width: "75%",
		height: 40,
		sparkline: {
			enabled: true,
		},
	},
	colors: ["#0073d8"],
	stroke: {
		curve: "smooth",
		width: 3,
	},
	tooltip: {
		fixed: {
			enabled: false,
		},
		x: {
			show: false,
		},
		marker: {
			show: false,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
};

var chart2 = new ApexCharts(
	document.querySelector("#sparklineLine2"),
	options2
);
chart2.render();

var options3 = {
	series: [
		{
			data: [10, 20, 30, 40, 30, 50, 70],
		},
	],
	chart: {
		type: "line",
		width: "75%",
		height: 40,
		sparkline: {
			enabled: true,
		},
	},
	colors: ["#0073d8"],
	stroke: {
		curve: "smooth",
		width: 3,
	},
	tooltip: {
		fixed: {
			enabled: false,
		},
		x: {
			show: false,
		},
		marker: {
			show: false,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
};

var chart3 = new ApexCharts(
	document.querySelector("#sparklineLine3"),
	options3
);
chart3.render();

var options4 = {
	series: [
		{
			data: [10, 20, 30, 40, 30, 50, 70],
		},
	],
	chart: {
		type: "line",
		width: "75%",
		height: 40,
		sparkline: {
			enabled: true,
		},
	},
	colors: ["#e4052e"],
	stroke: {
		curve: "smooth",
		width: 3,
	},
	tooltip: {
		fixed: {
			enabled: false,
		},
		x: {
			show: false,
		},
		marker: {
			show: false,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
};

var chart4 = new ApexCharts(
	document.querySelector("#sparklineLine4"),
	options4
);
chart4.render();
