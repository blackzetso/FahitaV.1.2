$(function() {
	'use strict';
	 // CHARTJS
	var ctx = document.getElementById("Chart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
			datasets: [{
				label: 'Profits',
				data: [20, 400, 310, 284, 580, 320, 480],
				borderWidth: 2,
				backgroundColor: 'rgb(52, 84, 245, 0.1)',
				borderColor: 'rgb(52, 84, 245)',
				borderWidth: 2,
				pointBackgroundColor: '#ffffff',
				pointRadius: 3
			},
			{
				label: "sales",
				borderColor: "rgba(1, 207, 107)",
				borderWidth: "1",
				backgroundColor: "rgba(1, 207, 107, 0.3)",
				pointHighlightStroke: "rgba(1, 207, 107)",
				data: [10, 300, 210, 184, 300, 220, 230],
				pointBackgroundColor: '#ffffff',
				borderWidth: 2,
				pointRadius: 3
            }
			],
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
					},
					gridLines: {
						display: false,
						color: "#ccccd0"
					}
				}],
				xAxes: [{
					ticks: {
						display: true
					},

					gridLines: {
						display: false,
						color: "#ccccd0"
					}
				}]
			},
		}
	});

	//WidgetChart1 CHARTJS
    var ctx = document.getElementById( "widgetChart1" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            type: 'line',
            datasets: [ {
                data: [1, 30, 20, 28, 39, 22, 11],
                label: 'Dataset',
                backgroundColor: 'rgba(52, 84, 245,.1)',
                borderColor: '#3454f5',
            }, ]
        },
        options: {

            maintainAspectRatio: false,
            legend: {
                display: false
            },
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                cornerRadius: 0,
                intersect: false,
            },
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    borderWidth: 2
                },
                point: {
                    radius: 0,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
    } );

	// BARCHART CHARTJS
	new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
		data: {
		  labels: ["Jan", "Feb", "Mar", "Apr"],
		  datasets: [
			{
				label: "Males",
				backgroundColor: "#3454f5",
				data: [133,800,1500,2478]
			}, {
				label: "Female",
				backgroundColor: "#01cf6b",
				data: [608,747,875,934]
			}
		  ]
		},
		options: {
		  title: {
			display: false,
		  }
		}
	});

});

