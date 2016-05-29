var $ = require('jquery');
var LineChart = require('./chart');

/**
 * Sample Chart
 */
var series = [
  {
    name: 'TeamA',
    data: [
      [0, 10],
      [0.1, 5],
      [1, 2]
    ],
    images: [
      {
        datetime: '1990/01/30 15:10:05',
        src     : 'http://hoge.png'
      }
    ]
  },
  {
    name: 'TeamB',
    data: [
      [0, 2],
      [0.2, 5],
      [1, 2]
    ],
    images: [
      {
        datetime: '1990/01/30 15:10:05',
        src     : 'http://hoge.png'
      }
    ]
  }
];

$(document).ready(function(){
  $('#see-results-btn').click(function(){
    console.log('click!');
    LineChart.draw(series);
  });
});
