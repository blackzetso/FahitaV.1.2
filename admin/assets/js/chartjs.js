$(function() {
	'use strict';
	var ctx = document.getElementById("Chart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
			datasets: [{
				label: 'Profits',
				data: [20, 420, 210, 354, 580, 320, 480],
				borderWidth: 2,
				backgroundColor: 'transparent',
				borderColor: '#3454f5',
				borderWidth: 4,
				pointBackgroundColor: '#ffffff',
				pointRadius: 8
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display:true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					}
				}],
				xAxes: [{
					ticks: {
						display: true
					},

					gridLines: {
						display: false
					}
				}]
			},
		}
	});
	var ctx = document.getElementById("Chart2").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
			datasets: [{
				label: 'Sales',
				data: [200, 450, 290, 367, 256, 543, 345],
				borderWidth: 2,
				backgroundColor: '#3454f5',
				borderColor: '#3454f5',
				borderWidth: 2.0,
				pointBackgroundColor: '#ffffff',
				pointRadius: 4
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					}
				}],
				xAxes: [{
					ticks: {
						display: true
					},
					gridLines: {
						display: false
					}
				}]
			},
		}
	});
	var ctx = document.getElementById("Chart3").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [
					80,
					70,
					30,
					40,
				],
				backgroundColor: ['#3454f5', '#fa292e', '#01cf6b', '#fe7100'],
				label: 'Dataset 1'
			}],
			labels: ['Chrome', 'Firefox', 'Opera', 'Safari'],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
			},
		}
	});
	var ctx = document.getElementById("Chart4").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				data: [
					70,
					60,
					50,
					30,
				],
				backgroundColor: ['#3454f5', '#fa292e', '#01cf6b', '#fe7100'],
				label: 'Dataset 1'
			}],
			labels: ['Data 1', 'Data 2', 'Data 3', 'Data 4'],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position: 'bottom',
			},
		}
	});
});