<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produse;
use App\Models\OrderDetails;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::with('orderDetails.produs.images')
    ->where('users_id', auth()->id())
    ->latest()
    ->get();

    return view('order.index', compact('orders'));
}
public function store(Request $request, $id)
{
    $request->validate([
        'tickets' => 'required|integer|min:1',
    ]);

    $produs = Produse::findOrFail($id);

    // Verificare sold out
    if ($produs->tickets_sold >= $produs->tickets) {
        return back()->with('error', 'Sold Out');
    }

    // Verificare bilete disponibile
    if (
        $produs->tickets_sold + $request->tickets >
        $produs->tickets
    ) {
        return back()->with(
            'error',
            'Nu mai sunt suficiente bilete disponibile.'
        );
    }

    // Calcul preț cu discount
    $price = $produs->price;

    if ($produs->discount > 0) {
        $price = $produs->price -
            ($produs->price * $produs->discount / 100);
    }

    // Creare comandă
    $order = Order::create([
        'users_id'     => auth()->id(),
        'orderNumber'  => time(),
        'orderDate'    => now(),
        'shippedDate'  => now(),
        'status'       => 'confirmed',
        'Total'        => $request->tickets * $price,
    ]);

    // Creare detalii comandă
    OrderDetails::create([
        'orders_id'       => $order->id,
        'produses_id'     => $produs->id,
        'quantityOrdered' => $request->tickets,
    ]);

    // Actualizare bilete vândute
    $produs->tickets_sold += $request->tickets;
    $produs->save();

    return redirect('/order')
        ->with(
            'success',
            'Comanda a fost plasată cu succes!'
        );
}
}
