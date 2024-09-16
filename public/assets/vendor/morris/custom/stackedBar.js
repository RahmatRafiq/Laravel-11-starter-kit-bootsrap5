// Stacked Bar Chart
Morris.Bar({
	element: "stackedBar",
	data: [
		{ x: "2019 Q1", y: 3, z: 2, a: 3 },
		{ x: "2019 Q2", y: 2, z: null, a: 1 },
		{ x: "2019 Q3", y: 0, z: 2, a: 1 },
		{ x: "2019 Q4", y: 2, z: 3, a: 3 },
		{ x: "2018 Q1", y: 3, z: 2, a: 3 },
		{ x: "2018 Q2", y: 2, z: null, a: 1 },
		{ x: "2018 Q3", y: 0, z: 2, a: 4 },
		{ x: "2018 Q4", y: 2, z: 3, a: 3 },
	],
	xkey: "x",
	ykeys: ["y", "z", "a"],
	labels: ["Y", "Z", "A"],
	stacked: true,
	hideHover: "auto",
	resize: true,
	gridLineColor: "#dfd6ff",
	barColors: ["#007deb", "#299bff", "#66b7ff", "#a3d4ff", "#cce7ff", "#f5faff"],
});
