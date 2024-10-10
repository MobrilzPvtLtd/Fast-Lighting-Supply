import Chart from "chart.js/auto";

$(function() {
    var startDate = moment().subtract(30, 'days');
    var endDate = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
        fetchSalesData(start, end);
    }

    $('#reportrange').daterangepicker({
        startDate: startDate,
        endDate: endDate,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(startDate, endDate);

    fetchSalesData(startDate, endDate);
});

function fetchSalesData(start, end) {
    $.ajax({
        type: "GET",
        url: route("admin.sales_analytics.index"),
        data: {
            start: start.format('YYYY-MM-DD'),
            end: end.format('YYYY-MM-DD'),
        },
        success: function(response) {
            console.log(response);

            const data = {
                labels: response.labels.map(label => moment(label).format('D/MMM/YYYY')),
                sales: response.data.map(item => item.total.amount),
                totalOrders: response.data.map(item => item.total_orders),
                formatted: response.data.map(item => item.total.formatted),
            };

            initSalesAnalyticsChart(data);
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
        }
    });
}

let salesAnalyticsChart;

function initSalesAnalyticsChart(data) {
    if (salesAnalyticsChart) {
        salesAnalyticsChart.destroy();
    }

    salesAnalyticsChart = new Chart($(".sales-analytics .chart"), {
        type: "line",
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: "Sales",
                    data: data.sales,
                    borderColor: "#00CED1",
                    fill: false
                },
                {
                    label: "Total Orders",
                    data: data.totalOrders,
                    borderColor: "#FF5733",
                    fill: false
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    callbacks: {
                        label(item) {
                            let orders = `Orders: ${data.totalOrders[item.dataIndex]}`;
                            let sales = `Sales: ${data.formatted[item.dataIndex]}`;
                            return [orders, sales];
                        },
                    },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return `$${value}`;
                        },
                    },
                },
            },
        },
    });
}
// $(function () {
//     $.ajax({
//         type: "GET",
//         url: route("admin.sales_analytics.index"),
//         success(response) {
//             let data = {
//                 labels: response.labels,
//                 sales: [],
//                 formatted: [],
//                 totalOrders: [],
//             };

//             for (let item of response.data) {
//                 data.sales.push(item.total.amount);
//                 data.formatted.push(item.total.formatted);
//                 data.totalOrders.push(item.total_orders);
//             }

//             initSalesAnalyticsChart(data);
//         },
//     });
// });

// function initSalesAnalyticsChart(data) {

//     new Chart($(".sales-analytics .chart"), {
//         type: "line",
//         data: {
//             labels: data.labels,
//             datasets: [
//                 {
//                     data: data.sales,
                    // backgroundColor: [
                    //     "rgba(255, 99, 132, 0.5)",
                    //     "rgba(54, 162, 235, 0.5)",
                    //     "rgba(255, 206, 86, 0.5)",
                    //     "rgba(75, 192, 192, 0.5)",
                    //     "rgba(153, 102, 255, 0.5)",
                    //     "rgba(255, 159, 64, 0.5)",
                    // ],
//                     fill: false
//                 },
//             ],
//         },
//         options: {
//             responsive: true,
//             maintainAspectRatio: false,
//             plugins: {
//                 legend: false,
//                 tooltip: {
//                     displayColors: false,
//                     callbacks: {
//                         label(item) {
//                             let orders = `${trans(
//                                 "admin::dashboard.sales_analytics.orders"
//                             )}: ${data.totalOrders[item.dataIndex]}`;

//                             let sales = `${trans(
//                                 "admin::dashboard.sales_analytics.sales"
//                             )}: ${data.formatted[item.dataIndex]}`;

//                             return [orders, sales];
//                         },
//                     },
//                 },
//             },
//             scales: {
//                 y: {
//                     beginAtZero: true,
//                     ticks: {
//                         // Include the currency symbol in the ticks
//                         callback: function (value) {
//                             return data.formatted[0].charAt(0) + value;
//                         },
//                     },
//                 },
//             },
//         },
//     });
// }
