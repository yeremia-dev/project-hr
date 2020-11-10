<?php

namespace App\Http\Controllers;

use App\Kontrak;
use App\Reminder;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(auth()->id());
        $kontrak = Kontrak::where('karyawan_id', $user->karyawan->id)
            ->where('is_done', 0)
            ->first();
        return view('user.dashboard', compact('kontrak'));
    }

    public function getKemajuan($id)
    {
        $kontrak = Kontrak::find($id);
        $kemajuans = $kontrak->kemajuan;
        return view('user.kemajuan', compact(['kemajuans', 'kontrak']));
    }

    public function konfirmasi($id)
    {
        $reminder = Reminder::find($id);
        $reminder->is_confirm = 1;
        $reminder->save();

        return redirect()->back()->with('success', 'Anda berhasil melakukan konfirmasi, silahkan mengisi tracking progress');
    }
}
