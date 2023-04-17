<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Loket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Loket::query()
            ->get();

        return view('home.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data =
            Antrian::query()
            ->with('loket')
            ->where([
                'loket_id' => $request->nomor,
                'status' => 'active'
            ])
            ->whereDate('created_at', Carbon::today())
            ->latest('nomor')->first();

        return response()->json($data->nomor);
    }
}
