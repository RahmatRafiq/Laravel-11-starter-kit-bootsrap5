var options = {
	plotOptions: {
		pie: {
			customScale: 0.8,
			donut: {
				size: "90%",
			},
		},
	},
	chart: {
		width: 199,
		type: "donut",
	},
	labels: ["Pending", "Completed", "New"],
	series: [40, 30, 20],
	legend: { show: false },
	dataLabels: {
		enabled: false,
	},
	stroke: {
		width: 0,
	},

	colors: ["#0073d8", "#df1438", "#ffbf05"],
};
var chart = new ApexCharts(document.querySelector("#tasks"), options);
chart.render();
