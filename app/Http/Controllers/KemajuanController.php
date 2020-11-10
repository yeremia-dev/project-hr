<?php

namespace App\Http\Controllers;

use App\Kemajuan;
use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KemajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kontrak_id' => 'required',
            'isi_kemajuan' => 'required',
            'tanggal_kemajuan' => 'bail|required|date',
        ],
            [
                'kontrak_id.required' => 'Refresh halaman web terlebih dahulu',
                'isi_kemajuan.required' => 'Isi from progress',
                'tanggal_kemajuan.required' => 'Isi tanggal progress',

            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kemajuan = new Kemajuan([
            'kontrak_id' => $request->kontrak_id,
            'isi_kemajuan' => $request->isi_kemajuan,
            'tanggal_kemajuan' => $request->tanggal_kemajuan
        ]);

        $kemajuan->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kemajuan  $kemajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Kemajuan $kemajuan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kemajuan  $kemajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kemajuan $kemajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kemajuan  $kemajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kemajuan $kemajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kemajuan  $kemajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kemajuan $kemajuan)
    {
        //
    }
}
