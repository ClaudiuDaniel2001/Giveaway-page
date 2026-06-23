<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with([
            'user',
            'orderDetails.produs.images',
            'tickets'
        ])
        ->latest()
        ->get();

        return view(
            'admin.order.index',
            compact('orders')
        );
    }
    public function ship(Order $order){
        if ($order->status == 'cancelled'){
            return back()->with(
                'error',
                'cannot ship cancelled order'
            );
        }
        $order->update([
            'status' => 'shipped',
            'shippedDate' => now(),
        ]);
        return back()->whit(
            'success',
            'Order shipped'
        );
    }
    public function destroy(Order $order)
{
    // șterge detaliile comenzii
    $order->orderDetails()->delete();

    // șterge comanda
    $order->delete();

    return back()->with('success', 'Comanda a fost ștearsă');
}
}
