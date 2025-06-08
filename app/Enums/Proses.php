<?php
namespace App\Enums;

enum Proses: string {
    case Diajukan = 'diajukan';
    case Diproses = 'diproses';
    case Selesai  = 'selesai';
    case Ditolak  = 'ditolak';
}
