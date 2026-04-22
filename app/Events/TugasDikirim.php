<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TugasDikirim implements ShouldBroadcastNow
{
    public $nama;
    public $tugas;

    public function __construct($nama, $tugas)
    {
        $this->nama = $nama;
        $this->tugas = $tugas;
    }

    public function broadcastOn()
    {
        return new Channel('notifikasi');
    }
}