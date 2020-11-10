<?php

namespace App\Console\Commands;

use App\Kontrak;
use App\Notifications\ReminderNotification;
use App\Reminder;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk melakukan pengecekan kontrak';

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
        $kontraks = Kontrak::where('tanggal_berakhir', now()->format('Y-m-d'))
            ->where('is_done', 0)
            ->get();

        if(count($kontraks) > 0)
        {
            foreach ($kontraks as $kontrak)
            {
                $reminder = Reminder::where('kontrak_id', $kontrak->id)->first();
                $reminder->is_done = 1;
                $reminder->save();

                $kontrak = Kontrak::find($kontrak->id);
                $kontrak->is_done = 1;
                $kontrak->save();
            }
        }
    }
}
