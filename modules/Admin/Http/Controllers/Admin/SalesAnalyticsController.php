<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\Order;

class SalesAnalyticsController
{
    /**
     * Display a listing of the resource.
     *
     * @param Order $order
     *
     * @return Response
     */
    public function index(Request $request, Order $order)
    {
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(total) as total_amount'))
                ->groupBy('date')
                ->get();

        $labels = $orders->pluck('date')->toArray();

        $data = $orders->map(function($order) {
            return [
                'total_orders' => $order->total_orders,
                'total' => [
                    'amount' => $order->total_amount,
                    'formatted' => number_format($order->total_amount, 2),
                ],
            ];
        });

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);

        // return response()->json([
            // 'labels' => trans('admin::dashboard.sales_analytics.day_names'),
            // 'data' => $order->salesAnalytics(),
        // ]);
    }
}
