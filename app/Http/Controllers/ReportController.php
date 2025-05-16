<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{  
    
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
    public function adminIndex()
    {
        if (!$this->isAdmin()) {
            abort(403, 'Недостаточно полномочий для доступа к этой странице.');
        }
        $orders = Order::paginate(10);
        $statuses = Status::all();

        return view('admin', compact('orders', 'statuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->statues_id = $request->input('statuses_id');
        $order->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'statuses_id' => 'required|exists:statuses,id',
        ]);

        $order = Order::findOrFail($id);
        $order->statues_id = $request->statues_id;
        $order->save();

        return redirect()->route('admin.index')->with('success', 'Статус обновлён успешно!');
    }



    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);
        return view('welcome', ['orders' => $orders]);
    }

    public function create()
    {
        $status = Status::all();

        return view('request', compact('status'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date|max:255',
            'time' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'payment' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
        ]);



        Order::create([
            'date' => $data['date'],
            'time' => $data['time'],
            'type' => $data['type'],
            'payment' => $data['payment'],
            'adress' => $data['adress'],
            'statuses_id' =>'1',
            'user_id' => Auth::id(),
        ]);


        return redirect('/')->with('message', 'Создание заявки успешно!');
    }
}
