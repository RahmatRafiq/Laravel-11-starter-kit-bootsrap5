// Morris Donut
Morris.Donut({
	element: "donutColors",
	data: [
		{ value: 30, label: "foo" },
		{ value: 15, label: "bar" },
		{ value: 10, label: "baz" },
		{ value: 5, label: "A really really long label" },
	],
	backgroundColor: "#17181c",
	labelColor: "#17181c",
	colors: ["#007deb", "#299bff", "#66b7ff", "#a3d4ff", "#cce7ff", "#f5faff"],
	resize: true,
	hideHover: "auto",
	gridLineColor: "#dfd6ff",
	formatter: function (x) {
		return x + "%";
	},
});
