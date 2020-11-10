<?php

namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reminders = Reminder::where('is_done', 0)->orderBy('created_at', 'desc')->paginate(5);
        $karyawans = DB::table('karyawans')->get();
        return view('admin.dashboard', compact('reminders', 'karyawans'));
//        dd($reminders);
    }

}
