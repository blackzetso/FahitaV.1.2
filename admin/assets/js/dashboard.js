$(function(e){
  'use strict';
    // DoughnutChart
	if ($('.canvasDoughnut').length){

	var chart_doughnut_settings = {
			type: 'doughnut',
			tooltipFillColor: "rgba(51, 51, 51, 0.55)",
			data: {
				labels: [
					"Last Month",
					"Last Week",
					"This Week"
				],
				datasets: [{
					data: [10, 15, 38],
					backgroundColor: [
						"#01cf6b",
						"#3454f5",
						"#fa292e"
					],
					hoverBackgroundColor: [
						"#01cf6b",
						"#3454f5",
						"#fa292e"
					]
				}]
			},
			options: {
				legend: false,
				responsive: false
			}
		}

		$('.canvasDoughnut').each(function(){

			var chart_element = $(this);
			var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

		});
	}

	// LINE CHART
	var line = new Morris.Line({
		element: 'line-chart',
		resize: true,
		data: [{
			y: '2011 Q1',
			item1: 2666
		}, {
			y: '2011 Q2',
			item1: 2778
		}, {
			y: '2011 Q3',
			item1: 7812
		}, {
			y: '2011 Q4',
			item1: 3767
		}, {
			y: '2012 Q1',
			item1: 9810
		}, {
			y: '2012 Q2',
			item1: 5670
		}, {
			y: '2012 Q3',
			item1: 10632
		}, {
			y: '2012 Q4',
			item1: 15073
		}, {
			y: '2013 Q1',
			item1: 10687
		}, {
			y: '2013 Q2',
			item1: 8432
		}],
		xkey: 'y',
		ykeys: ['item1'],
		labels: ['Item 1'],
		lineColors: ['#01cf6b'],
		hideHover: 'auto'
	});

	// CHARTJS-1
	var ctx = document.getElementById("Chart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
			datasets: [{
				label: 'Profits',
				data: [100, 250, 110, 300, 110, 350, 130],
				borderWidth: 4,
				backgroundColor: 'transparent',
				borderColor: '#01cf6b',
				borderWidth: 2,
				pointBackgroundColor: '#ffffff',
				pointRadius: 5
			}]
		},
		options: {
			legend: {
				display:true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					},
					gridLines: {
						display: false,
						color: "#eee"
					}
				}],
				xAxes: [{
					ticks: {
						display: true
					},

					gridLines: {
						display: false,
						color: "#eee"
					}
				}]
			},
		}
	});

	// CHARTJS-2
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
		labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
		datasets: [{
		label: 'New',
		data: [12, 19, 3, 17, 6, 3, 7],
		backgroundColor: "rgba(	52, 84, 245, 0.8)"
		}, {
		label: 'Existing',
		data: [2, 29, 5, 5, 2, 10, 3],
		backgroundColor: "rgba(	25, 183, 106,0.8)"
		}]
		}
	});
});



