<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perangkat extends Model
{
    use HasFactory;

    protected $table = 'perangkat';

    protected $fillable = [
        'kode_perangkat',
        'nama_perangkat',
        'lokasi',
        'status',
    ];

    public function aduan(): HasMany
    {
        return $this->hasMany(Aduan::class, 'perangkat_id');
    }

    /**
     * Seed otomatis daftar lab SMKN 5 Surakarta:
     * - Lab RPL 1 (40 PC)
     * - Lab RPL 3 (40 PC)
     * - Lab RPL 4 (40 PC)
     * - Lab ASM 1 (40 PC)
     * - Lab ASM 2 (40 PC)
     * - Lab ASM 3 (40 PC)
     */
    public static function seedDefaultLabs(): void
    {
        $labs = [
            'Lab RPL 1' => 'RPL1',
            'Lab RPL 3' => 'RPL3',
            'Lab RPL 4' => 'RPL4',
            'Lab ASM 1' => 'ASM1',
            'Lab ASM 2' => 'ASM2',
            'Lab ASM 3' => 'ASM3',
        ];

        foreach ($labs as $namaLab => $prefix) {
            for ($i = 1; $i <= 40; $i++) {
                $num = str_pad($i, 2, '0', STR_PAD_LEFT);
                $kode = $prefix . '-PC' . $num;
                self::firstOrCreate(
                    ['kode_perangkat' => $kode],
                    [
                        'nama_perangkat' => 'PC ' . $num,
                        'lokasi'         => $namaLab,
                        'status'         => 'baik',
                    ]
                );
            }

            // Fasilitas Proyektor Lab
            self::firstOrCreate(
                ['kode_perangkat' => $prefix . '-PROYEKTOR'],
                [
                    'nama_perangkat' => 'Proyektor ' . $namaLab,
                    'lokasi'         => $namaLab,
                    'status'         => 'baik',
                ]
            );
        }
    }
}
