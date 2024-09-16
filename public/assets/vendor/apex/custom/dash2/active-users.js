var options = {
	chart: {
		height: 271,
		type: "radialBar",
		toolbar: {
			show: false,
		},
	},
	plotOptions: {
		radialBar: {
			dataLabels: {
				name: {
					fontSize: "12px",
					fontColor: "#ffffff",
				},
				value: {
					fontSize: "21px",
				},
				total: {
					show: true,
					label: "Total",
					formatter: function (w) {
						// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
						return "250";
					},
				},
			},
			track: {
				background: "rgba(0, 0, 0, 0.05)",
			},
		},
	},
	series: [80, 70, 20],
	labels: ["Likes", "Shares", "Clicks"],
	colors: ["#0073d8", "#2798f7", "#6bbbff", "#28256d", "#007600"],
};

var chart = new ApexCharts(document.querySelector("#device-sessions"), options);
chart.render();
