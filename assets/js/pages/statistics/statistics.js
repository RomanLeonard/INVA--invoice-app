$(document).ready(function(){

    $.ajax({
        method: "POST",
        url: "get-statistics",
        dataType: "json",
        data: {
            'AJAX': true,
            'type': 'statistics',
        }
    })
    .done(function( data ) {

        var statistics = $.map(data, function(value, index) { return [[index,value]]; }); // make statistics obj -> array

        $(statistics).each(function( i ){

            var year   = statistics[i][0]; // get year
            var months = $.map(statistics[i][1], function(value, index) { return [[index,value]]; }); // get months array;

            $('.statistics').append(`
            <!-- statistic card -->
                <div class="col-12 col-lg-6 mb-2 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="chart_`+year+`" width="100%" height="50px"></canvas>
                        </div>
                    </div>
                </div> 
            <!-- ./statistic card -->
            `); // add canvases to view

            var months_default_values = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // set defaults value for every month;
            $(months).each(function(y){
                var month_name  = parseInt(months[y][0]) - 1;
                var month_value = parseInt(months[y][1]);
                months_default_values[ month_name ] = month_value;
            }); // set months value;


            // create chart
            const ctx = document.getElementById('chart_'+year).getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
                    datasets: [{
                        label: year,
                        data: months_default_values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        })
        
    });

});
