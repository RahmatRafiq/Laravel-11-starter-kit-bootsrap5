var options = {
	chart: {
		width: 300,
		type: "donut",
	},
	labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
	series: [20, 20, 20, 20, 20],
	legend: {
		position: "bottom",
	},
	dataLabels: {
		enabled: false,
	},
	stroke: {
		width: 0,
	},
	colors: ["#007deb", "#299bff", "#66b7ff", "#a3d4ff", "#cce7ff", "#f5faff"],
};
var chart = new ApexCharts(document.querySelector("#donut"), options);
chart.render();
