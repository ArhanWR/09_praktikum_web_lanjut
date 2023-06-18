<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class Mahasiswa extends Model
{
    protected $table='mahasiswas'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey='nim'; // Memanggil isi DB dengan primarykey

    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
    ];

    // relasi dengan kelas
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    // relasi dengan mahasiswa_matakuliah
    public function mahasiswaMataKuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliah::class);
    }

    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')
            ->withPivot('nilai');
    }
}
