(function ($) {
    "use strict"

    let ctx = document.getElementById("lineChart");
    ctx.height = 280;
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: 'SALES',
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: [0, 15, 57, 12, 85, 10, 50],
                label: "Keyboard",
                backgroundColor: 'rgba(132, 38, 255,1)',
                borderColor: 'rgba(132, 38, 255,1)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'rgba(132, 38, 255,1)',
                pointBackgroundColor: 'rgba(132, 38, 255,1)',
            }, {
                label: "Electric Guitar",
                data: [0, 30, 5, 53, 15, 55, 0],
                backgroundColor: 'rgba(132,38,255,0.4)',
                borderColor: 'rgba(132,38,255,0.4)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'rgba(132,38,255,0.4)',
                pointBackgroundColor: 'rgba(132,38,255,0.4)',
            }]
        },
        options: {
            responsive: !0,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                backgroundColor: '#000',
                titleFontFamily: 'Poppins',
                bodyFontFamily: 'Poppins',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Poppins',
                },


            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        max: 100,
                        min: 0,
                        stepSize: 25
                    }
                }]
            },
            title: {
                display: false,
            }
        }
    });
})(jQuery);