var options = {
	chart: {
		height: 163,
		type: "area",
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		width: 0,
	},
	legend: {
		show: false,
	},
	series: [
		{
			name: "Income",
			data: [2, 2.5, 4, 4, 5, 5, 5, 3.5, 2, 1.5, 3, 5],
		},
		{
			name: "Expenses",
			data: [3, 2, 2, 3, 2.5, 2, 3, 3, 4, 6.5, 9, 9],
		},
	],
	grid: {
		xaxis: {
			lines: {
				show: false,
			},
		},
		yaxis: {
			lines: {
				show: false,
			},
		},
		padding: {
			top: -30,
			right: -20,
			bottom: -20,
			left: -20,
		},
	},
	xaxis: {
		labels: {
			show: false,
		},
	},
	yaxis: {
		labels: {
			show: false,
		},
	},
	colors: ["#007deb", "#299bff"],
};

var chart = new ApexCharts(document.querySelector("#income"), options);

chart.render();
