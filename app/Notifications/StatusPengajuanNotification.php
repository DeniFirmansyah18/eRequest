<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusPengajuanNotification extends Notification
{
    use Queueable;

    protected $status;
    protected $message;
    protected $namaAplikasi;

    public function __construct($status, $message, $namaAplikasi)
    {
        $this->status = $status;
        $this->message = $message;
        $this->namaAplikasi = $namaAplikasi;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Status pengajuan Anda telah berubah menjadi: ' . $this->status)
                    ->line($this->message)
                    ->line('Nama Aplikasi: ' . $this->namaAplikasi)
                    ->action('Lihat Perubahan Status', url('/user-opd/daftar-pengajuan'));
    }

    public function toArray($notifiable)
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'nama_aplikasi' => $this->namaAplikasi,
        ];
    }
}