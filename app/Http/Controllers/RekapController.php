<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PDF;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
           $cuti = DB::table('cuti')
                    ->select(
                        'nip', 
                        'name', 
                        'bagian', 
                        'jabatan',
                        DB::raw('SUM(CASE WHEN status = "Disetujui" THEN 1 ELSE 0 END) as count_disetujui'), 
                        DB::raw('SUM(CASE WHEN status = "Pending" THEN 1 ELSE 0 END) as count_pending')
                    )
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('nip', 'name', 'bagian', 'jabatan')
                    ->orderBy('created_at', 'desc')
                    ->get();

            
            return view('rekap.rekap_cuti_admin_view')->with(compact('cuti'));
        }
        if (Auth::user()->role == 'kepala') {
             $cuti = DB::table('cuti')
                    ->select(
                        'nip', 
                        'name', 
                        'bagian', 
                        'jabatan',
                        DB::raw('SUM(CASE WHEN status = "Disetujui" THEN 1 ELSE 0 END) as count_disetujui'), 
                        DB::raw('SUM(CASE WHEN status = "Pending" THEN 1 ELSE 0 END) as count_pending')
                    )
                    ->where('bagian', '=' , Auth::user()->bagian)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('nip', 'name', 'bagian', 'jabatan')
                    ->orderBy('created_at', 'desc')
                    ->get();

            
            return view('rekap.rekap_cuti_kepala_view')->with(compact('cuti'));
        }
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
