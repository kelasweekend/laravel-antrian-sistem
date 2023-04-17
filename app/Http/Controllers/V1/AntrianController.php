<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Loket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $data = Antrian::query()
            ->with('loket')
            ->whereHas('loket', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->whereStatus('active')
            ->whereDate('created_at', Carbon::today())
            ->latest('nomor')->first();


        $loket = Loket::where('user_id', auth()->user()->id)->first();
        
        if (empty($loket)) {
            # code...
            return redirect()->route('v1')->with('galat', 'Kamu tidak terdaftar di loket');
        }

        // dd($loket);
        if ($data == null && $loket != null) {
            # bikinin nomor antrian
            Antrian::create([
                'loket_id' => $loket->id,
                'nomor' => $loket->kode . '001',
                'status' => 'active',
            ]);

            return redirect()->route('v1.antrian')->with('finish', 'panggil');
        }

        return view('backend.antrian.index', compact('data'));
    }

    public function lanjut(Request $request)
    {
        $nomor = strval(str_replace($request->kode, '', $request->antrian));
        $next = $nomor + 1;
        $str_length = 3;

        // hardcoded left padding if number < $str_length
        $str = substr("0000{$next}", -$str_length);

        $last = Antrian::whereNomor($request->antrian)->first();
        $last->update([
            'status' => 'finish'
        ]);

        $loket = Loket::where('user_id', auth()->user()->id)->first();

        Antrian::create([
            'loket_id' => $loket->id,
            'nomor' => $loket->kode . $str,
            'status' => 'active',
        ]);

        return redirect()->route('v1.antrian')->with('finish', 'panggil');

        // dd($str);
    }
}
