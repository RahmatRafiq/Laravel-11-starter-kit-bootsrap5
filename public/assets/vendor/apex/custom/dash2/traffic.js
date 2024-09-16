var options = {
	chart: {
		height: 310,
		type: "area",
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		curve: "smooth",
		width: 3,
	},
	series: [
		{
			name: "Visitors",
			data: [10, 40, 15, 40, 35, 96, 69],
		},
	],
	grid: {
		borderColor: "#dae1ea",
		strokeDashArray: 5,
		xaxis: {
			lines: {
				show: true,
			},
		},
		yaxis: {
			lines: {
				show: false,
			},
		},
		padding: {
			top: 0,
			right: 20,
			bottom: 0,
			left: 20,
		},
	},
	xaxis: {
		categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
	},
	yaxis: {
		labels: {
			show: false,
		},
	},
	colors: ["#0073d8", "#b7945e", "#28256d"],
	fill: {
		type: "gradient",
		gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.2,
			opacityTo: 0.9,
			stops: [0, 90, 100],
		},
	},

	markers: {
		size: 0,
		opacity: 0.3,
		colors: ["#0073d8", "#b7945e", "#28256d"],
		strokeColor: "#ffffff",
		strokeWidth: 2,
		hover: {
			size: 7,
		},
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return +val + "k";
			},
		},
	},
};

var chart = new ApexCharts(document.querySelector("#traffic"), options);

chart.render();
