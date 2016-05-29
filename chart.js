/**
 * Line Chart
 */
var Highcharts = require('highcharts');

module.exports = {

  draw: function(series) {
    Highcharts.chart('results', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'Smile Graph'
      },
      xAxis: {
        title: {
            text: 'Time'
        },
        min: 0,
        max: 1
      },
      yAxis: {
        title: {
            text: 'Smile Count'
        },
        min: 0
      },
      /**
       * @TODO ツールチップにその時の画像を出す
       */
      // tooltip: {
      //   useHTML: true,
      //   formatter: function() {
      //     return '<img src="http://livedoor.blogimg.jp/tabetabe22/imgs/1/c/1cf039f3.jpg" border="0" height="100">';
      //   },
      //   valueDecimals: 2
      // },
      plotOptions: {
        spline: {
          marker: {
            enabled: true
          }
        }
      },
      series: series
    });
  }

};
