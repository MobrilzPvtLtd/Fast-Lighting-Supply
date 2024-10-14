import { C as Chart } from "./chart.js-84fe26e4-v4.1.3.js"; // Change to 'Chart'
import "./@kurkle-b1b89bbc-v4.1.3.js"; // Make sure this import is necessary

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

    salesAnalyticsChart = new Chart($(".sales-analytics .chart"), { // Ensure you use the correct variable name
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
