<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $orders = Auth::user()->orders()
            ->when($status, fn($query) => $query->where('status', $status))
            ->get();
        return view('orders.index', compact('orders', 'status'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->orders()->create($data);
        return redirect()->route('orders.index')->with('success', 'Заказ создан');
    }

    public function edit(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:new,in_progress,done',
        ]);

        $order->update($data);
        return redirect()->route('orders.index')->with('success', 'Заказ обновлен');
    }

    public function destroy(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ удален');
    }
}