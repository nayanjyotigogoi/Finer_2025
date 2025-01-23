const ctx = document.createElement('canvas');
document.querySelector('.chart-container').appendChild(ctx);

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'Small Amount: Rs. 1133000',
            'Large Amount: Rs. 1170000',
            'Medium Amount: 408000',
            'Service Amount: Rs. 240000',
            'Micro Amount: Rs. 450000',
            'Mega Amount: Rs. 450000'
        ],
        datasets: [{
            data: [29, 30, 11, 6, 12, 11],
            backgroundColor: [
                '#3366cc',
                '#994d00',
                '#666666',
                '#ccaa00',
                '#339933',
                '#ff6633'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'right'
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                    }
                }
            }
        }
    }
});