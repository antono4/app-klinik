<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = "pendaftaran";

    protected $fillable = [
        'kode',
        'pasien_id',
        'dokter_id',
        'jenis_layanan',
        'status_pembayaran',
        'status_pelayanan',
        'poliklinik_id',
        'tanda_tanda_vital',
        'jenis_pendaftaran',
        'jenis_rujukan',
        'nama_perujuk',
        'no_surat',
        'tanggal_berlaku',
        'penanggung_jawab',
        'hubungan_pasien',
        'alamat_penanggung_jawab',
        'no_hp_penanggung_jawab',
        'pemeriksaan_klinis',
        'metode_pembayaran',
        'total_bayar',
        'user_id_kasir',
        'tindakan_id',
        'keterangan_pembayaran'
    ];

    public function pasien()
    {
        return $this->belongsTo('App\Models\Pasien', 'pasien_id', 'id');
    }

    public function poliklinik()
    {
        return $this->belongsTo('App\Models\Poliklinik', 'poliklinik_id', 'id');
    }

    public function dokter()
    {
        return $this->belongsTo('App\User', 'dokter_id', 'id');
    }

    public function perusahaanAsuransi()
    {
        return $this->belongsTo('App\Models\PerusahaanAsuransi', 'jenis_layanan', 'id');
    }

    public function userKasir()
    {
        return $this->belongsTo('App\User', 'user_id_kasir', 'id');
    }

    public function getTandaTandaVitalAttribute($value)
    {
        return unserialize($value);
    }

    public function getPemeriksaanKlinisAttribute($value)
    {
        return unserialize($value);
    }

    public function feeTindakan()
    {
        return $this->hasMany('App\Models\PendaftaranTindakan');
    }

    public function resep()
    {
        return $this->hasMany('App\Models\PendaftaranResep');
    }

    public function tindakan()
    {
        return $this->belongsTo('App\Models\Tindakan', 'tindakan_id', 'id');
    }
}
