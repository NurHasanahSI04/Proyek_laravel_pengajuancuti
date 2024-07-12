<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jatahcuti extends Model
{
    use HasFactory;

    protected $table = 'jatah_cuti';
    protected $fillable = ['id', 'tahun', 'jumlah', 'pegawai_nip'];

    public $timestamps = false;

    public function Pegawai(): BelongsTo
    {
        return $this->Belongsto(Pegawai::class);
    }
}
