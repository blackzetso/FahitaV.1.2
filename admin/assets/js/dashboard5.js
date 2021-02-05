$(function() {
	'use strict';
	// BARCHART CHARTJS
	if ($('#canvas').length) {
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myBar = new Chart(ctx, {
		type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
				datasets: [{
					label: 'PageViews',
					backgroundColor: "#3454f5",
					borderColor: "#3454f5",
					data: [25, 55, 64, 9, 30, 96, 33]
				}, {
					label: 'Users',
					backgroundColor: "#01cf6b",
					borderColor: "#01cf6b",
					data: [24, 14, 53, 18, 19,56, 65]
				}, {
					label: 'Shares',
					backgroundColor: "#fa292e",
					borderColor: "#fa292e",
					data: [45, 58, 62, 89, 63, 46, 63]
				}]
			},
			options: {
				elements: {
					rectangle: {
						borderWidth: 1,
						barWidth: 1,
						borderColor: 'rgb(0, 255, 0)',
						borderSkipped: 'bottom'
					}
				},
				responsive: true,
				maintainAspectRatio: false,

				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: 'Chart.js Bar Chart'
				}
			}
		});
	};

    // MORRIS CHART
	new Morris.Area({
	  element: 'morrisBar2',
	  data: [
		{x: '2010 Q4', y: 3, z: 7},
		{x: '2011 Q1', y: 3, z: 4},
		{x: '2011 Q2', y: null, z: 1},
		{x: '2011 Q3', y: 2, z: 5},
		{x: '2011 Q4', y: 8, z: 2},
		{x: '2012 Q1', y: 4, z: 4},
		{x: '2012 Q1', y: 7, z: 3}
	  ],
	  xkey: 'x',
	  ykeys: ['y', 'z'],
	  lineColors: ['#01cf6b','#3454f5'],
	  labels: ['Likes', 'Shares']
	}).on('click', function(i, row){
	  console.log(i, row);
	});

});

