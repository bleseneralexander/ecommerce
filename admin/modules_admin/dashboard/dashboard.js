// // This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
  var options = {
    series: [{
      name: "Áo",
      data: [10, 44, 55, 57, 56, 61, 58, 63, 60, 66, 10, 90],
      },
      {
        name: "Quần",
        data: [40, 76, 85, 101, 98, 87, 105, 91, 114, 94, 80, 4],
      },
      {
        name: "Giày",
        data: [60, 85, 41, 36, 76, 45, 58, 52, 53, 41, 2, 34],
      },
      {
        name: "Tất",
        data: [40, 35, 48, 36, 86, 45, 78, 92, 53, 41, 2, 9],
      },
      {
        name: "Bóng",
        data: [30, 135, 41, 36, 26, 45, 48, 54, 53, 41, 6, 9],
      }],
    chart: {
    height: 250,
    type: 'line',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'straight'
  },
  // title: {
  //   text: 'Product Trends by Month',
  //   align: 'left'
  // },
  grid: {
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  xaxis: {
    categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#apex1"), options);
  chart.render();
  
  // Sidebar Toggle Codes;
  
  var sidebarOpen = false;
  var sidebar = document.getElementById("sidebar");
  var sidebarCloseIcon = document.getElementById("sidebarIcon");
  
  function toggleSidebar() {
    if (!sidebarOpen) {
      sidebar.classList.add("sidebar_responsive");
      sidebarOpen = true;
    }
  }
  
  function closeSidebar() {
    if (sidebarOpen) {
      sidebar.classList.remove("sidebar_responsive");
      sidebarOpen = false;
    }
  }


