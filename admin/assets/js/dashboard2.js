$(function() {
	"use strict";
	// AREA CHART
	var area = new Morris.Area({
		element: 'revenue-chart',
		resize: true,
		data: [{
			y: '2011 Q1',
			item1: 2666,
			item2: 2666
		}, {
			y: '2011 Q2',
			item1: 2778,
			item2: 2294
		}, {
			y: '2011 Q3',
			item1: 4912,
			item2: 1969
		}, {
			y: '2011 Q4',
			item1: 3767,
			item2: 13597
		}, {
			y: '2012 Q1',
			item1: 6810,
			item2: 1914
		}, {
			y: '2012 Q2',
			item1: 15670,
			item2: 4293
		}, {
			y: '2012 Q3',
			item1: 4820,
			item2: 3795
		}, {
			y: '2012 Q4',
			item1: 15073,
			item2: 5967
		}, {
			y: '2013 Q1',
			item1: 10687,
			item2: 4460
		}, {
			y: '2013 Q2',
			item1: 8432,
			item2: 5713
		}],
		xkey: 'y',
		ykeys: ['item1', 'item2'],
		labels: ['Item 1', 'Item 2'],
		lineColors: ['#3454f5', '#01cf6b'],
		backgroundColor: ['#000', '#000'],
		hideHover: 'auto'
	});
	// APEX CHART
	'use strict';
	window.Apex = {
		stroke: {
			width: 3
		},
		markers: {
			size: 0
		},
		tooltip: {
			fixed: {
				enabled: true,
			}
		}
	};
	var options1 = {
		chart: {
			type: 'line',
			width: 100,
			height: 45,
			sparkline: {
				enabled: true
			}
		},
		stroke: {
			colors: '#3454f5',
		},
		series: [{
			data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
		}],
		tooltip: {
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function(seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	}
	var options2 = {
		chart: {
			type: 'line',
			width: 100,
			height: 45,
			sparkline: {
				enabled: true
			}
		},
		stroke: {
			colors: '#01cf6b',
		},
		series: [{
			data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
		}],
		tooltip: {
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function(seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	}
	new ApexCharts(document.querySelector("#chart1"), options1).render();
	new ApexCharts(document.querySelector("#chart2"), options2).render();
	// MORRIES BARCHART
	new Morris.Bar({
		element: 'morrisBar4',
		data: [{
			x: '2011 Q1',
			y: 0
		}, {
			x: '2011 Q2',
			y: 1
		}, {
			x: '2011 Q3',
			y: 2
		}, {
			x: '2011 Q4',
			y: 3
		}, {
			x: '2012 Q1',
			y: 4
		}, {
			x: '2012 Q2',
			y: 5
		}, {
			x: '2012 Q3',
			y: 6
		}, {
			x: '2012 Q4',
			y: 7
		}, {
			x: '2013 Q1',
			y: 8
		}],
		xkey: 'x',
		ykeys: ['y'],
		labels: ['Y'],
		barColors: function(row, series, type) {
			if (type === 'bar') {
				var red = Math.ceil(0 * row.y / this.ymax);
				return 'rgb( 0, 139, 255, 0.5)';
				return 'rgb( 0, 139, 255, 0.5)';
			} else {
				return '#000';
			}
		}
	});
	// ECHART
	var chartdata2 = [{
		name: 'sales',
		type: 'line',
		smooth: true,
		data: [10, 15, 9, 18, 10, 15],
		color: ['#3454f5']
	}, {
		name: 'Profit',
		type: 'line',
		smooth: true,
		size: 10,
		data: [10, 18, 13, 20, 7, 16],
		color: ['#01cf6b']
	}, {
		name: 'Profit',
		type: 'line',
		smooth: true,
		size: 10,
		data: [10, 14, 10, 15, 9, 25],
		color: ['#fa292e']
	}];
	var chart2 = document.getElementById('echart2');
	var barChart2 = echarts.init(chart2);
	var option2 = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '25',
		},
		xAxis: {
			data: ['2014', '2015', '2016', '2017', '2018'],
			axisLine: {
				lineStyle: {
					color: '#ececff'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#9ca1b9'
			}
		},
		yAxis: {
			splitLine: {
				lineStyle: {
					color: '#ececff'
				}
			},
			axisLine: {
				lineStyle: {
					color: '#ececff'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#9ca1b9'
			}
		},
		series: chartdata2,
		color: ['#3454f5', '#f47b25', '#01cf6b', ]
	};
	barChart2.setOption(option2);
});