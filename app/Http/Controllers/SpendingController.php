<?php

namespace App\Http\Controllers;

use App\Spent;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $spents = Spent::all();

        $total = 0;
        foreach ($spents as $spent) {
            $total += $spent['total'];
        }

        return view('spending.index')->with('data', ['spents' => $spents, 'total' => $total]);
    }

    public function new()
    {
        return view('spending.new');
    }

    public function create(Request $data)
    {
        Spent::create([
            'total' => $data['total'],
            'spentDate' => $data['spentDate'],
            'description' => $data['description'],
        ]);

        return redirect('spendings');
    }

    public function delete($id)
    {
        Spent::find($id)->delete();
        return redirect('spendings');
    }
}

