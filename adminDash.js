
    var options = {
      series: [{
      name: 'Monthly Customers',
      fontFamily: 'cursive',
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
      name: 'Semesterly Customers',
      data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    },
    ],
      chart: {
      type: 'bar',

      height: 400,
      width: 600,
    },
    plotOptions: {
      bar: {
        background: '#000',
        fontFamily: 'Georgia',
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      }
    },

    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 3,
      colors: ['transparent']
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Dec'],

    },
    yaxis: {
      title: {

        text: 'Revenue per month (thousands)'
      }
    },

    fill: {
      opacity: 1


    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousand"
        }
      }
    }
    };



var chart = new ApexCharts(document.querySelector("#apex1"),options);
chart.render();

//sidebar toggle codes
let sidebarOpen = false;
let sideBar = document.getElementById("sideBar");
let sidebarCloseIcon = document.getElementById('sideBarIcon');

function toggleSidebar(){
  if(!sidebarOpen){
    sidebar.classList.add('sidebar_responsive');
    sidebarOpen = true;
  }
}
function closeSideBar(){
  if(sideBarOpen){
    sideBar.classList.remove("sidebar_responsive");
    sideBarOpen = false;
  }
}
