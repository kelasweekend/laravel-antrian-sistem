<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Loket;
use App\Models\User;
use Illuminate\Http\Request;

class LoketController extends Controller
{
    public function index()
    {
        $data = Loket::with('user')->get();
        $user = User::whereRole('staff')->get();
        return view('backend.loket.index', compact('data', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kode' => 'required',
            'user' => 'required|numeric'
        ]);

        $check = Loket::where([
            'user_id' => $request->user
        ])->get();

        if (count($check) >= 1) {
            # code...
            return back()->with('galat', 'PJ Sudah ada di loket lain');
        }

        Loket::create([
            'tujuan' => $request->title,
            'kode' => $request->kode,
            'user_id' => $request->user,
            'status' => $request->status == true ? true : false
        ]);

        return back()->with('success', 'Loket berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $data = Loket::find($request->loket);
        if (empty($data)) {
            # code...
            return back()->with('galat', 'Loket Tidak Tersedia');
        }

        $check = Loket::where([
            'user_id' => $request->user_id
        ])->get();

        // dd(count($check));

        if (count($check) >= 1) {
            # code...
            if ($check[0]->id == $request->loket) {
                # code...
                $data->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status == true ? true : false
                ]);
            } else {
                # code...
                return back()->with('galat', 'PJ Sudah ada di loket lain');
            }
        }
        return back()->with('success', 'Loket berhasil di update');
    }

    public function destroy(Request $request)
    {
        $data = Loket::find($request->loket);
        if (empty($data)) {
            # code...
            return back()->with('galat', 'Loket Tidak Tersedia');
        }

        $data->delete();
        return back()->with('success', 'Loket berhasil dihapus');
    }
}
