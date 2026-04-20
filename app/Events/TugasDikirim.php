<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TugasDikirim implements ShouldBroadcast
{
    public $namaMahasiswa;
    public $judulTugas;

    public function __construct($namaMahasiswa, $judulTugas)
    {
        $this->namaMahasiswa = $namaMahasiswa;
        $this->judulTugas = $judulTugas;
    }

    public function broadcastOn()
    {
        return new Channel('notifikasi-tugas');
    }
}