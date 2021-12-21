var yearStart = 2000;
var yearEnd = 2040;

var year = [];

while(yearStart < yearEnd+1){
  year.push(yearStart++);
}
var options = {
    chart: {
        type: 'line'
    },
    series: [{
        name: 'sales',
        data: [30, 40, 35, 50, 49, 60, 70, 91, 125,43,4343,43,434,343,43]
    }],
    xaxis: {
        categories: year
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();