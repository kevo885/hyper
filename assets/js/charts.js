// basic line chart
var yearStart = 2000;
var yearEnd = 2040;

var year = [];

while (yearStart < yearEnd + 1) {
    year.push(yearStart++);
}
var options = {
    chart: {
        type: 'line'
    },
    series: [{
        name: 'sales',
        data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
    }],
    xaxis: {
        categories: year
    }
}
// another basic line chart
var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


var options = {
    chart: {
        height: 380,
        width: "100%",
        type: "line"
    },
    series: [
        {
            name: "Series 1",
            data: [45, 52, 38, 45, 19, 33]
        }
    ],
    xaxis: {
        categories: [
            "01 Jan",
            "02 Jan",
            "03 Jan",
            "04 Jan",
            "05 Jan",
            "06 Jan"
        ]
    }
};
var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();

// pie
var options = {
    series: [20,20,20,20,20],
    chart: {
    width: 380,
    type: 'pie',
  },
  labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
  };

  var chart = new ApexCharts(document.querySelector("#pie"), options);
  chart.render();