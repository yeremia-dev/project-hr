<?php

namespace App\Console\Commands;

use App\Notifications\ReminderNotification;
use App\Reminder;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim email reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        echo now();

        $reminders = Reminder::where('tanggal_pengingat', now()->format('Y-m-d'))
            ->where('is_sent', 0)
            ->where('is_done', 0)
            ->get();

        if(count($reminders) > 0)
        {
            foreach ($reminders as $reminder)
            {
            echo $reminder->kontrak->karyawan->nama_lengkap;

                $user = User::find($reminder->kontrak->karyawan->user->id);

                $reminder->is_sent = 1;
                $reminder->save();

                Notification::send($user, new ReminderNotification($reminder->id));

            }
        }
        else{
            echo "Tidak ada reminder hari ini";
        }

    }
}
