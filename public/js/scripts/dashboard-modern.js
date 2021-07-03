// Dashboard - Modern
//----------------------

(function (window, document, $) {
  // //Sample toast
  setTimeout(function () {
    M.toast({ html: "Hey! I am a toast." })
  }, 2000)

  // Donut chart
  // -----------
  
  var no_of_days=$('#noOfDays').attr('data-id');
  var no_of_days_used=$('#noOfDaysused').attr('data-used');
  var CurrentBalanceDonutChart = new Chartist.Pie(
    "#current-balance-donut-chart",
    {
      labels: [1, 2],
      series: [
        { meta: "Completed", value: no_of_days_used },
        { meta: "Remaining", value: no_of_days }
      ]
    },

    {
      donut: true,
      donutWidth: 8,
      showLabel: false,
      plugins: [
        Chartist.plugins.tooltip({
          class: "current-balance-tooltip",
          appendToBody: true
        }),
        Chartist.plugins.fillDonut({
          items: [
            {
              content:
                '<p class="small">Balance Hours</p><h5 class="mt-0 mb-0">'+no_of_days+ ' Hours</h5>'
            }
          ]
        })
      ]
    }
  )
  
    var proficiencyLevelVal=$('#proficiencyLevel').attr('data-id');
  var proficiencyDonutChart = new Chartist.Pie(
    "#proficiency-donut-chart",
    {
      labels: [1, 2],
      series: [
        { meta: "Proficiency Level", value: "100" },
        { meta: "Proficiency Level", value: "100" }
      ]
    },

    {
      donut: true,
      donutWidth: 8,
      showLabel: false,
      plugins: [
        Chartist.plugins.fillDonut({
          items: [
            {
              content:
                '<h5 class="mt-0 mb-0">'+proficiencyLevelVal+'</h5>'
            }
          ]
        })
      ]
    }
  )

  // Total Transaction
  // -----------------
  var TotalTransactionLine = new Chartist.Line(
    "#total-transaction-line-chart",
    {
      series: [[3, 10, 4, 20, 7, 45, 5, 35, 20, 48, 30, 50]]
    },
    {
      chartPadding: 0,
      axisX: {
        showLabel: true,
        showGrid: false
      },
      axisY: {
        showLabel: true,
        showGrid: true,
        low: 0,
        high: 50,
        scaleMinSpace: 40
      },
      lineSmooth: Chartist.Interpolation.simple({
        divisor: 2
      }),
      plugins: [
        Chartist.plugins.tooltip({
          class: "total-transaction-tooltip",
          appendToBody: true
        })
      ],
      fullWidth: true
    }
  )

  TotalTransactionLine.on("created", function (data) {
    var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
    defs
      .elem("linearGradient", {
        id: "lineLinearStats",
        x1: 0,
        y1: 0,
        x2: 1,
        y2: 0
      })
      .elem("stop", {
        offset: "0%",
        "stop-color": "rgba(255, 82, 249, 0.1)"
      })
      .parent()
      .elem("stop", {
        offset: "10%",
        "stop-color": "rgba(255, 82, 249, 1)"
      })
      .parent()
      .elem("stop", {
        offset: "30%",
        "stop-color": "rgba(255, 82, 249, 1)"
      })
      .parent()
      .elem("stop", {
        offset: "95%",
        "stop-color": "rgba(133, 3, 168, 1)"
      })
      .parent()
      .elem("stop", {
        offset: "100%",
        "stop-color": "rgba(133, 3, 168, 0.1)"
      })

    return defs
  }).on("draw", function (data) {
    var circleRadius = 5
    if (data.type === "point") {
      var circle = new Chartist.Svg("circle", {
        cx: data.x,
        cy: data.y,
        "ct:value": data.value.y,
        r: circleRadius,
        class:
          data.value.y === 35
            ? "ct-point ct-point-circle"
            : "ct-point ct-point-circle-transperent"
      }) 
      data.element.replace(circle)
    }
  })

  // User Statics
  var UserStatisticsBarChart = new Chartist.Bar(
    "#user-statistics-bar-chart",
    {
      labels: ["jun-1", "jun-2", "jun-3", "jun-4", "jun-5", "jun-6"],
      series: [
        [50, 75, 96, 79, 48, 68]
      ]
    },
    {
      // Default mobile configuration
      stackBars: true,
      chartPadding: 0,
      axisX: {
        showGrid: false
      },
      axisY: {
        showGrid: false,
        labelInterpolationFnc: function (value) {
          return value / 100 + "%"
        },
        scaleMinSpace: 50
      },
      plugins: [
        Chartist.plugins.tooltip({
          class: "user-statistics-tooltip",
          appendToBody: true
        })
      ]
    },
    [
      // Options override for media > 800px
      [
        "screen and (min-width: 800px)",
        {
          stackBars: false,
          seriesBarDistance: 10
        }
      ],
      // Options override for media > 1000px
      [
        "screen and (min-width: 1000px)",
        {
          reverseData: false,
          horizontalBars: false,
          seriesBarDistance: 15
        }
      ]
    ]
  )

  UserStatisticsBarChart.on("draw", function (data) {
    if (data.type === "bar") {
      data.element.attr({
        style: "stroke-width: 12px",
        x1: data.x1 + 0.001
      })
      data.group.append(
        new Chartist.Svg(
          "circle",
          {
            cx: data.x2,
            cy: data.y2,
            r: 6
          },
          "ct-slice-pie"
        )
      )
    }
  })

  UserStatisticsBarChart.on("created", function (data) {
    var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
    defs
      .elem("linearGradient", {
        id: "barGradient1",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(255,75,172,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(255,75,172, 0.6)"
      })

    defs
      .elem("linearGradient", {
        id: "barGradient2",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(129,51,255,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(129,51,255, 0.6)"
      })
    return defs
  })


  var participationRate=$('#participationRate').attr('data-id');
  // Conversion Ratio
  var ConversionRatioBarChart = new Chartist.Bar(
    "#conversion-ration-bar-chart",
    {
      labels: ["Q1"],
      series: [[participationRate]]
    },
    {
      stackBars: true,
      chartPadding: {
        top: 0,
        right: 50,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false
      },
      axisY: {
        showGrid: false,
        labelInterpolationFnc: function (value) {
          return value / 100 + "%"
        }
      },
      plugins: [
        Chartist.plugins.tooltip({
          class: "user-statistics-tooltip",
          appendToBody: true
        })
      ]
    }
  )
  ConversionRatioBarChart.on("draw", function (data) {
    if (data.type === "bar") {
      data.element.attr({
        style: "stroke-width: 40px;",
        x1: data.x1 + 0.001
      })
      data.group.append(
        new Chartist.Svg("circle", {
          cx: data.x2,
          cy: data.y2
        })
      )

    }
  })

  ConversionRatioBarChart.on("created", function (data) {
    var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
    defs
      .elem("linearGradient", {
        id: "barGradient1",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(129,51,255,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(129,51,255, 0.6)"
      })

    defs
      .elem("linearGradient", {
        id: "barGradient2",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(255,75,172,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(255,75,172, 0.6)"
      })
    return defs
  })


var newSkillsValue=$('#newSkillsValue').attr('data-id');
  // Conversion Ratio
  var newSkillsValueBarChart = new Chartist.Bar(
    "#newSkills",
    {
      labels: ["Q1"],
      series: [[newSkillsValue]]
    },
    {
      stackBars: true,
      chartPadding: {
        top: 0,
        right: 50,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false
      },
      axisY: {
        showGrid: false,
        labelInterpolationFnc: function (value) {
          return value / 100 + "%"
        }
      },
      plugins: [
        Chartist.plugins.tooltip({
          class: "user-statistics-tooltip",
          appendToBody: true
        })
      ]
    }
  )
  newSkillsValueBarChart.on("draw", function (data) {
    if (data.type === "bar") {
      data.element.attr({
        style: "stroke-width: 40px;stroke: #85ecd0;",
        x1: data.x1 + 0.001
      })
      data.group.append(
        new Chartist.Svg("circle", {
          cx: data.x2,
          cy: data.y2
        })
      )

    }
  })

  newSkillsValueBarChart.on("created", function (data) {
    var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
    defs
      .elem("linearGradient", {
        id: "barGradient1",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(129,51,255,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(129,51,255, 0.6)"
      })

    defs
      .elem("linearGradient", {
        id: "barGradient2",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(255,75,172,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(255,75,172, 0.6)"
      })
    return defs
  });

var assesmentTakenValue=$('#assesmentTakenValue').attr('data-id');
  // Conversion Ratio
  var assesmentTakenBarChart = new Chartist.Bar(
    "#assesmentTaken",
    {
      labels: ["Q1"],
      series: [[assesmentTakenValue]]
    },
    {
      stackBars: true,
      chartPadding: {
        top: 0,
        right: 50,
        bottom: 0,
        left: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false
      },
      axisY: {
        showGrid: false,
        labelInterpolationFnc: function (value) {
          return value / 100 + "%"
        }
      },
      plugins: [
        Chartist.plugins.tooltip({
          class: "user-statistics-tooltip",
          appendToBody: true
        })
      ]
    }
  )
  assesmentTakenBarChart.on("draw", function (data) {
    if (data.type === "bar") {
      data.element.attr({
        style: "stroke-width: 40px;stroke: #c87ddc;",
        x1: data.x1 + 0.001
      })
      data.group.append(
        new Chartist.Svg("circle", {
          cx: data.x2,
          cy: data.y2
        })
      )

    }
  })

  assesmentTakenBarChart.on("created", function (data) {
    var defs = data.svg.querySelector("defs") || data.svg.elem("defs")
    defs
      .elem("linearGradient", {
        id: "barGradient1",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(129,51,255,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(129,51,255, 0.6)"
      })

    defs
      .elem("linearGradient", {
        id: "barGradient2",
        x1: 0,
        y1: 0,
        x2: 0,
        y2: 1
      })
      .elem("stop", {
        offset: 0,
        "stop-color": "rgba(255,75,172,1)"
      })
      .parent()
      .elem("stop", {
        offset: 1,
        "stop-color": "rgba(255,75,172, 0.6)"
      })
    return defs
  });
  //Sampel Line Chart Three

  // Options
//  var SLOption = {
//    responsive: true,
//    maintainAspectRatio: true,
//    datasetStrokeWidth: 3,
//    pointDotStrokeWidth: 4,
//    tooltipFillColor: "rgba(0,0,0,0.6)",
//    legend: {
//      display: false,
//      position: "bottom"
//    },
//    hover: {
//      mode: "label"
//    },
//    scales: {
//      xAxes: [
//        {
//          display: false
//        }
//      ],
//      yAxes: [
//        {
//          display: false
//        }
//      ]
//    },
//    title: {
//      display: false,
//      fontColor: "#FFF",
//      fullWidth: false,
//      fontSize: 40,
//      text: "82%"
//    }
//  }
//  var SLlabels = ["January", "February", "March", "April", "May", "June"]
//
//  var LineSL3ctx = document
//    .getElementById("custom-line-chart-sample-three")
//    .getContext("2d")
//
//  var gradientStroke = LineSL3ctx.createLinearGradient(500, 0, 0, 200)
//  gradientStroke.addColorStop(0, "#8133ff")
//  gradientStroke.addColorStop(1, "#ff4bac")
//
//  var gradientFill = LineSL3ctx.createLinearGradient(500, 0, 0, 200)
//  gradientFill.addColorStop(0, "#8133ff")
//  gradientFill.addColorStop(1, "#ff4bac")
//
//  var SL3Chart = new Chart(LineSL3ctx, {
//    type: "line",
//    data: {
//      labels: SLlabels,
//      datasets: [
//        {
//          label: "My Second dataset",
//          borderColor: gradientStroke,
//          pointColor: "#fff",
//          pointBorderColor: gradientStroke,
//          pointBackgroundColor: "#fff",
//          pointHoverBackgroundColor: gradientStroke,
//          pointHoverBorderColor: gradientStroke,
//          pointRadius: 4,
//          pointBorderWidth: 1,
//          pointHoverRadius: 4,
//          pointHoverBorderWidth: 1,
//          fill: true,
//          backgroundColor: gradientFill,
//          borderWidth: 1,
//          data: [24, 18, 20, 30, 40, 43]
//        }
//      ]
//    },
//    options: SLOption
//  })
  // charts update on sidenav collapse
  $('.logo-wrapper .navbar-toggler').on('click', function () {
    setTimeout(function () {
      CurrentBalanceDonutChart.update();
      TotalTransactionLine.update();
      UserStatisticsBarChart.update();
      ConversionRatioBarChart.update();
    }, 200);
  })
})(window, document, jQuery)
