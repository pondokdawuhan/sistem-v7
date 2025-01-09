<?php

namespace App\Jobs;

use App\Models\User;
use App\Traits\WablasTrait;
use Illuminate\Bus\Queueable;
use App\Models\JadwalPelajaran;
use App\Models\JadwalPelajaranMa;
use App\Models\JadwalPelajaranSmp;
use App\Models\JadwalPelajaranMadin;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifMengajarJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $hari = date('l', time());
        switch ($hari) {
            case "Sunday":
                $hari = "ahad";
                break;
            case "Monday":
                $hari = "senin";
                break;
            case "Tuesday":
                $hari = "selasa";
                break;
            case "Wednesday":
                $hari = "rabu";
                break;
            case "Thursday":
                $hari = "kamis";
                break;
            case "Friday":
                $hari = "jumat";
                break;
            case "Saturday":
                $hari = "sabtu";
                break;
        }

        $jadwals = JadwalPelajaran::where('hari', $hari)->get();
                
        $array = [];

        foreach ($jadwals as $jadwal) {
            if (!in_array($jadwal->user_id, $array)) {
                array_push($array, $jadwal->user_id);
            };
        }
        
        foreach ($array as $userId) {
          $user = User::find($userId);
          $kumpulan_data = [];
          $data['phone'] = $user->dataUser->no_hp;
          $data['message'] = 'Assalamualaikum Wr.Wb. Selamat pagi, meningatkan kembali bahwa Anda mempunyai jadwal mengajar hari ini, silahkan lihat jadwal di Dashboard sistem. Semoga hari Anda penuh berkah, Aamiin';
          $data['secret'] = false;
          $data['retry'] = false;
          $data['isGroup'] = false;

          array_push($kumpulan_data, $data);
          WablasTrait::sendText($kumpulan_data);
        }
        
    }
}
