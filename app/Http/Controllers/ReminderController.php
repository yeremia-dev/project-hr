<?php

namespace App\Http\Controllers;

use App\Kontrak;
use App\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReminderController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        return view('admin.detail-reminder',compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        $tanggal_masuk = Carbon::parse($request->tanggal_masuk);
        $tanggal_berakhir = Carbon::parse($request->tanggal_berakhir);
        $selisih = $tanggal_masuk->diffInDays($tanggal_berakhir);

        $validator = Validator::make($request->all(), [
            'tanggal_masuk' => 'required|date',
            'tanggal_berakhir' => 'bail|required|date|after:tanggal_masuk',
            'pengingat' => 'integer|required|max:'.$selisih
        ],
            [
                'tanggal_masuk.required' => 'Isi tanggal masuk',
                'tanggal_masuk.date' => 'Isi tanggal pada form Tanggal Masuk',
                'tanggal_berakhir.required' => 'Isi tanggal berakhir kontrak',
                'tanggal_berakhir.date' => 'Isi tanggal pada form Tanggal Berakhir',
                'tanggal_berakhir.after' => 'Tanggal Berakhir harus sesudah Tanggal Masuk',
                'pengingat.integer' => 'Pengingat harus angka',
                'pengingat.required' => 'Pengingat harus diisi',
                'pengingat.max' => 'Pengingat maximal H-'.$selisih


            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kontrak = Kontrak::find($reminder->id);

        $kontrak->tanggal_masuk = $request->tanggal_masuk;
        $kontrak->tanggal_berakhir = $request->tanggal_berakhir;

        $kontrak->save();

        $tanggal_pengingat = Carbon::parse($request->tanggal_berakhir)->subDay($request->pengingat);

        $reminder->tanggal_pengingat = $tanggal_pengingat;
        $reminder->batasan_pengingat = $request->pengingat;

        $reminder->save();

        return redirect()->back()->with('success', 'Data Kontrak berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
