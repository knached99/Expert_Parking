
        var colors =['green','lightgreen','lightblue','pink','darkorange'];
       var options = {
         series: ['50'],
         chart: {
         height: 350,
         type: 'radialBar',
       },
       plotOptions: {
         radialBar: {
           colors: 'green',
           hollow: {
             size: '65%',
           }
         },
       },
       labels: ['150'],
       };

       var chart = new ApexCharts(document.querySelector("#billingChart"), options);
       chart.render();
