const ctx = document.createElement('canvas');
document.querySelector('.chart-container').appendChild(ctx);

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'Small Amount: Rs. 115000',
            'Large Amount: Rs. 117000',
            'Medium Amount: 408000',
            'Service Amount: Rs. 28000',
            'Micro Amount: Rs. 45000',
            'Mega Amount: Rs. 65000'
        ],
        datasets: [{
            data: [29, 30, 11, 7, 11, 12],
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