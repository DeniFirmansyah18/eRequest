<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengajuanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_aplikasi' => $this->nama_aplikasi,
            'gambaran_umum' => $this->gambaran_umum,
            'jenis_pengguna' => $this->jenis_pengguna,
            'detail_aplikasi' => $this->detail_aplikasi,
            'catatan_verifikator' => $this->catatan_verifikator,
            'status' => $this->status,
            'progress' => $this->progress,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'name_opd' => $this->user->name_opd,
                'alamat' => $this->user->alamat,
            ],
        ];
    }
}
