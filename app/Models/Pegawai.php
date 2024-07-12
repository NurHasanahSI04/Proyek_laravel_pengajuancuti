<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = ['id', 'nip', 'nama', 'gender', 'tmp_lahir', 'tgl_lahir', 'telpon', 'alamat', 'divisi_id', 'user_id'];
    public $timestamps = false;

    public function Divisi(): HasMany
    {
        return $this->hasMany(Divisi::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
