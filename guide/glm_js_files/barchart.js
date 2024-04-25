const ctx = document.getElementById('myBarChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Bookings',
                                data: [25, 22, 16, 35, 20, 13, 15, 23, 21, 14, 16, 26],
                                backgroundColor: '#003D25',
                                borderColor: '#003D25',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Number of Bookings'
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Months'
                                    }
                                }]
                            }
                        }
                    });