<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Presiden extends Model
{
    use HasFactory, Searchable;


    protected $fillable = [
        'nama_tokoh',
        'image',
        'orientasi',
        'peristiwa_penting',
        'reorientasi',
    ];

    public function toSearchableArray()
    {
        return [
            'nama_tokoh' => $this->nama_tokoh
            // 'orientasi' => $this->orientasi,
            // 'peristiwa_penting' => $this->peristiwa_penting,
            // 'reorientasi' => $this->reorientasi
        ];
    }
}