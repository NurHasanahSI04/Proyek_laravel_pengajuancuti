<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengajuancuti extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_cuti';
    protected $fillable = ['id', 'tanggal_awal', 'tanggal_akhir', 'jumlah', 'ket', 'status', 'pegawai_nip'];

    public $timestamps = false;

    public function Pengajuancuti(): HasMany
    {
        return $this->hasMany(Pengajuancuti::class);
    }
}
