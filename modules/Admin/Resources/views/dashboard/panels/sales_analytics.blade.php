<div class="dashboard-panel sales-analytics">
    <div class="grid-header clearfix">
        <div class="row">
            <div class="col-lg-7">
                <h5>{{ trans('admin::dashboard.sales_analytics_title') }}</h5>
            </div>
            <div class="col-lg-5">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="canvas">
        <canvas class="chart" width="400" height="250"></canvas>
    </div>
</div>

@push('globals')
    <script>
        FleetCart.langs['admin::dashboard.sales_analytics.orders'] = '{{ trans('admin::dashboard.sales_analytics.orders') }}';
        FleetCart.langs['admin::dashboard.sales_analytics.sales'] = '{{ trans('admin::dashboard.sales_analytics.sales') }}';

    </script>
@endpush
