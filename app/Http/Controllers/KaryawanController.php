<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
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
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nrp' => ['required', 'string'],
            'status' => ['required', 'string'],
            'jabatan' => ['required', 'string'],
            'section' => ['required', 'string'],
            'departemen' => ['required', 'string'],
            'nama_nrp_atasan' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
        ],
            [
                'name.required' => 'Isi nama lengkap',
                'email.required' => 'Isi email',
                'nrp.required' => 'Isi NRP',
                'status.required' => 'Isi status',
                'jabatan.required' => 'Isi Jabatan',
                'section.required' => 'Isi Section',
                'departemen.required' => 'Isi Departemen',
                'nama_nrp_atasan.required' => 'Isi Nama dan NRP atasan',
                'no_hp.required' => 'Isi Nomor Handphone',

            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $karyawan->update($request->all());

        return redirect()->back()->with('success','Data karyawan berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
    }
}
