document.addEventListener('DOMContentLoaded', function() {
    var chartlabel = []
    var projectCount = []
    var cmrCount = []
    fetch('build/php/cmrchart.php').then((res) => res.json()).then(response => {
        // SORT RESULT BY YEAR FROM LEAST TO GEATEST
        response.sort((a,b) => {
            return a.year_submission - b.year_submission
        })
        console.log(response)
        // LOOP THRU THE SORTED RESPONSE AND PUSH NEW DATA INTO CHART LABELS ONE BY ONE BASED ON YEAR SUBMISSION
        for(let i in response) {
            // labels
            var newlabel = response[i].year_submission + ' ' + response[i].semester
            chartlabel.push(newlabel)
            // data
            projectCount.push(response[i].project_count)
            cmrCount.push(response[i].cmr_count)
        }
        // console.log('==' + chartlabel + '==' + projectCount + '==' + cmrCount + '==')   
        var bardata = {
            labels: chartlabel,
            datasets: [{
                type: 'bar',
                label: 'Universe',
                data: projectCount,
                borderColor: 'rgb(0,0,139)',
                backgroundColor: 'rgba(0, 0, 139, .9)'
            }, {
                type: 'bar',
                label: 'CMR',
                data: cmrCount,
            //   fill: false,
                borderColor: 'rgb(255,191,0)',
                backgroundColor : 'rgba(255,191,0,0.5)'
            }]
        }
        var ctx = document.getElementById('cmr-chart')
        var barchart = new Chart(ctx, {
            type: 'bar',
            data: bardata,
            options: {
                scales: {
                    yAxes:  [{
                        display: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    }).catch(error => console.log(error))
})

