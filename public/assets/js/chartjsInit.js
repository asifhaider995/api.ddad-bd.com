$.exists = function(selector) {
    return $(selector).length > 0;
};
// Color Variable
// Focus Color
var $indigo = "#5856D6";
var $indigo1 = "rgba(88, 86, 214, 0.1)";
var $blue = "#007AFF";
var $green = "#34C759";
var $orange = "#FF9500";
var $pink = "#FF2D55";
var $purple = "#AF52DE";
var $red = "#FF3B30";
var $teal = "#5AC8FA";
var $yellow = "#FFCC00";
var $gray = "#8E8E93";
// Base Color
var $white = "#fff";
var $black = "#000";
var $black1 = "#24292e";
var $black2 = "#666";
var $black3 = "#a7a9ab";
var $black4 = "#e1e4e8";
var $black5 = "#f6f8fa";

var scalesYaxes = [{
  ticks: {
    fontSize: 14,
    fontColor: "rgba(0, 0, 0, 0.4)",
    padding: 15,
    beginAtZero: true,
    autoSkip: false,
    maxTicksLimit: 4
  },
  gridLines: {
    color: "rgba(0, 0, 0, 0.1)",
    zeroLineWidth: 2,
    zeroLineColor: "transparent",
    drawBorder: false,
    tickMarkLength: 0
  }
}]
var scalesXaxes = [{
  ticks: {
    fontSize: 14,
    fontColor: "rgba(0, 0, 0, 0.4)",
    padding: 5,
    beginAtZero: true,
    autoSkip: false,
    maxTicksLimit: 4
  },
  gridLines: {
    display: false
  }
}];
/* End Line chart Variable */
// Chart Style1
if ($.exists("#st_chart1")) {
    var ctx1 = document.querySelector("#st_chart1");
    var myChart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: "Bandwidth Stats",
                data: [12.5, 16.1, 13.5, 15.2, 12.5, 14.7, 15, 11.2, 15.3, 13.4, 16.4, 14.3],
                backgroundColor: $indigo1,
                borderColor: $indigo,
                borderWidth: 3,
                lineTension: 0,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }]
        },
        options: {
            title: {
                display: false
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    // use label callback to return the desired label
                    label: function(tooltipItem, data) {
                        return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                    },
                    // remove title
                    title: function(tooltipItem, data) {
                        return;
                    }
                }
            },
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: "Month"
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: "Value"
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    });
}


// Chart Style2
if ($.exists("#st_chart2")) {
    var ctx2 = document.querySelector("#st_chart2");
    var myChart2 = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: ["01 Jan 2020",
                "02 Jan 2020",
                "03 Jan 2020",
                "04 Jan 2020",
                "05 Jan 2020",
                "06 Jan 2020",
                "07 Jan 2020",
                "08 Jan 2020",
                "09 Jan 2020",
                "10 Jan 2020",
                "11 Jan 2020",
                "12 Jan 2020"
            ],
            datasets: [{
                    backgroundColor: $indigo,
                    data: [17, 22, 27, 32, 27, 22, 17, 22, 27, 32, 27, 22]
                },
                {
                    backgroundColor: $black4,
                    data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20]
                }
            ]
        },
        options: {
            title: {
                display: true
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    label: function(tooltipItem) {
                        return "Sale: " + Number(tooltipItem.yLabel) + "pic";
                    }
                }
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            barRadius: 4,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    stacked: true
                }],
                yAxes: [{
                    display: false,
                    stacked: true,
                    gridLines: false
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }
        }
    })
}


// Chart Style3
if ($.exists("#st_chart3")) {
    var ctx2 = document.querySelector("#st_chart3");
    var myChart2 = new Chart(ctx2, {
        type: "doughnut",
        data: {
            datasets: [{
                data: [40, 40, 20],
                backgroundColor: [$blue, $orange, $red],
                borderWidth: 3,
            }],
            labels: ["Desktop", "Mobile", "Tablet"]
        },
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: "top"
            },
            title: {
                display: false,
                text: "Technology"
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4
            }
        }
    })
}


// Chart Style3_1
if ($.exists("#st_chart3_1")) {
    var ctx2 = document.querySelector("#st_chart3_1");
    var myChart2 = new Chart(ctx2, {
        type: "doughnut",
        data: {
            datasets: [{
                data: [40, 60],
                backgroundColor: [$blue, $orange],
                borderWidth: 3,
            }],
            labels: ["Item1 ", "Item2 "]
        },
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: "top"
            },
            title: {
                display: false,
                text: "Technology"
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4
            }
        }
    })
}



// Chart Style4
if ($.exists("#st_chart4")) {
    var marksCanvas = document.getElementById("st_chart4");

    var marksData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May"],
        datasets: [{
            label: "Sales",
            backgroundColor: "rgba(52, 199, 89, 0.1)",
            data: [70, 75, 70, 80, 75],
            borderColor: $green,
            borderWidth: 1,
        }, {
            label: "Visits",
            backgroundColor: "rgba(255, 149, 0, 0.2)",
            data: [54, 65, 60, 70, 70],
            borderColor: $orange,
            borderWidth: 1,
        }]
    };

    var radarChart = new Chart(marksCanvas, {
        type: 'radar',
        data: marksData,
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: "top"
            },
            title: {
                display: false,
                text: "Technology"
            },
            scale: {
                pointLabels: {
                    fontSize: 13
                },
                ticks: {
                    fontSize: 0
                }
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
            }
        }
    });
}


// Chart Style5
if ($.exists("#st_chart5")) {
    var ctx1 = document.querySelector("#st_chart5").getContext('2d');
    let gradient1 = ctx1.createLinearGradient(0, 0, 0, 450);
        gradient1.addColorStop(0, 'rgba(52, 199, 89, 0.5)');
        gradient1.addColorStop(0.5, 'rgba(52, 199, 89, 0.03)');

    let gradient2 = ctx1.createLinearGradient(0, 0, 0, 450);
        gradient2.addColorStop(0, 'rgba(0, 122, 255, 0.5)');
        gradient2.addColorStop(0.5, 'rgba(0, 122, 255, 0.03)');

    var myChart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: "Bandwidth Stats",
                data: [130.5, 160.1, 140.5, 150.2, 100.5, 140.7, 160, 100.2, 120.3],
                backgroundColor: gradient1,
                borderColor: $green,
                borderWidth: 3,
                lineTension: 0,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }, {
                label: "Bandwidth Stats",
                data: [100.5, 180.1, 110.5, 170.2, 130.5, 160.7, 110, 130.2, 150.3],
                backgroundColor: gradient2,
                borderColor: $blue,
                borderWidth: 3,
                lineTension: 0,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }]
        },
        options: {
            title: {
                display: false
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    // use label callback to return the desired label
                    label: function(tooltipItem, data) {
                        return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                    },
                    // remove title
                    title: function(tooltipItem, data) {
                        return;
                    }
                }
            },
            scales: {
                yAxes: scalesYaxes,
                xAxes: scalesXaxes
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    });
}
// Chart Style5_1
if ($.exists("#st_chart5_1")) {
    var ctx1 = document.querySelector("#st_chart5_1").getContext('2d');
    let gradient1 = ctx1.createLinearGradient(0, 0, 0, 450);
        gradient1.addColorStop(0, 'rgba(52, 199, 89, 0.5)');
        gradient1.addColorStop(0.5, 'rgba(52, 199, 89, 0.03)');

    let gradient2 = ctx1.createLinearGradient(0, 0, 0, 450);
        gradient2.addColorStop(0, 'rgba(0, 122, 255, 0.5)');
        gradient2.addColorStop(0.5, 'rgba(0, 122, 255, 0.03)');

    var myChart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: "Bandwidth Stats",
                data: [130.5, 160.1, 130.5, 150.2, 100.5, 140.7, 150, 110.2, 150.3],
                backgroundColor: gradient1,
                borderColor: $green,
                borderWidth: 3,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }, {
                label: "Bandwidth Stats",
                data: [100.5, 180.1, 110.5, 170.2, 130.5, 160.7, 110, 150.2, 100.3],
                backgroundColor: gradient2,
                borderColor: $blue,
                borderWidth: 3,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }]
        },
        options: {
            title: {
                display: false
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    // use label callback to return the desired label
                    label: function(tooltipItem, data) {
                        return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                    },
                    // remove title
                    title: function(tooltipItem, data) {
                        return;
                    }
                }
            },
            scales: {
                yAxes: scalesYaxes,
                xAxes: scalesXaxes
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    });
}
// Chart Style5_2
if ($.exists("#st_chart5_2")) {
    var ctx1 = document.querySelector("#st_chart5_2").getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: "Bandwidth Stats",
                data: [80.5, 110.1, 80.5, 80.2, 50.5, 90.7, 80, 60.2, 70.3],
                backgroundColor: "transparent",
                borderColor: $orange,
                borderWidth: 3,
                lineTension: 0,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }, {
                label: "Bandwidth Stats",
                data: [100.5, 180.1, 110.5, 170.2, 130.5, 160.7, 110, 130.2, 150.3],
                backgroundColor: "transparent",
                borderColor: $blue,
                borderWidth: 3,
                lineTension: 0,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }]
        },
        options: {
            title: {
                display: false
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    // use label callback to return the desired label
                    label: function(tooltipItem, data) {
                        return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                    },
                    // remove title
                    title: function(tooltipItem, data) {
                        return;
                    }
                }
            },
            scales: {
                yAxes: [{
                  ticks: {
                    fontSize: 14,
                    fontColor: "rgba(0, 0, 0, 0.4)",
                    padding: 15,
                    beginAtZero: true,
                    autoSkip: false,
                    maxTicksLimit: 4
                  },
                  gridLines: {
                    color: "rgba(0, 0, 0, 0.1)",
                    zeroLineWidth: 1,
                    zeroLineColor: "rgba(0, 0, 0, 0.1)",
                    drawBorder: false,
                    tickMarkLength: 0
                  }
                }],
                xAxes: scalesXaxes
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    });
}
// Chart Style5_3
if ($.exists("#st_chart5_3")) {
    var ctx1 = document.querySelector("#st_chart5_3").getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
                label: "Bandwidth Stats",
                data: [80.5, 110.1, 80.5, 80.2, 50.5, 90.7, 80, 60.2, 70.3],
                backgroundColor: "transparent",
                borderColor: $orange,
                borderWidth: 3,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }, {
                label: "Bandwidth Stats",
                data: [100.5, 180.1, 110.5, 170.2, 130.5, 160.7, 110, 150.2, 100.3],
                backgroundColor: "transparent",
                borderColor: $blue,
                borderWidth: 3,
                pointBackgroundColor: $white,
                pointDotRadius: 10
            }]
        },
        options: {
            title: {
                display: false
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 8,
                yPadding: 8,
                caretPadding: 8,
                backgroundColor: $white,
                cornerRadius: 4,
                titleFontSize: 13,
                titleFontStyle: "normal",
                bodyFontSize: 13,
                titleFontColor: $black1,
                bodyFontColor: $black2,
                borderWidth: 1,
                borderColor: $black4,
                callbacks: {
                    // use label callback to return the desired label
                    label: function(tooltipItem, data) {
                        return tooltipItem.xLabel + ": " + tooltipItem.yLabel + "k";
                    },
                    // remove title
                    title: function(tooltipItem, data) {
                        return;
                    }
                }
            },
            scales: {
                yAxes: [{
                  ticks: {
                    fontSize: 14,
                    fontColor: "rgba(0, 0, 0, 0.4)",
                    padding: 15,
                    beginAtZero: true,
                    autoSkip: false,
                    maxTicksLimit: 4
                  },
                  gridLines: {
                    color: "rgba(0, 0, 0, 0.1)",
                    zeroLineWidth: 1,
                    zeroLineColor: "rgba(0, 0, 0, 0.1)",
                    drawBorder: false,
                    tickMarkLength: 0
                  }
                }],
                xAxes: scalesXaxes
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    });
}
