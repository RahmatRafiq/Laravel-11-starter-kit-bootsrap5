$(function () {
	$("#world-map-markers2").vectorMap({
		map: "continents_mill",
		hoverColor: false,
		zoomOnScroll: false,
		series: {
			regions: [
				{
					values: gdpData,
					scale: ["#0073d8", "#067e73"],
				},
			],
		},
		markerStyle: {
			initial: {
				fill: "#ffffff",
				stroke: "#0073d8",
				"fill-opacity": 1,
				"stroke-width": 20,
				"stroke-opacity": 0.4,
				r: 25,
			},
			hover: {
				fill: "#ffffff",
				stroke: "#e13d4b",
				"fill-opacity": 0.8,
				"stroke-width": 20,
				"stroke-opacity": 0.4,
				r: 25,
				cursor: "pointer",
			},
		},
		regionStyle: {
			initial: {
				fill: "#008060",
			},
			hover: {
				"fill-opacity": 0.8,
			},
			selected: {
				fill: "#333333",
			},
		},
		backgroundColor: "transparent",
		markers: [
			{ latLng: [12, 23], name: "Africa" },
			{ latLng: [65, 100], name: "Europe" },
			{ latLng: [37, 85], name: "Asia" },
			{ latLng: [49, -105], name: "North America" },
			{ latLng: [-15, -60], name: "South America" },
			{ latLng: [-25, 140], name: "Australia" },
		],
	});
});
