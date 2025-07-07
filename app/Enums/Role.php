<?php

namespace App\Enums;

enum Role: string {
    case KEMAHASISWAAN = 'KEMAHASISWAAN';
    case DAAK = 'DAAK';
    case SARPRAS = 'SARPRAS';
    case PENGAJARAN = 'PENGAJARAN';
    case PERPUS = 'PERPUS';
    case KEAMANAN = 'KEAMANAN';
    case UPT_LAB = 'UPT_LAB';
    case Mahasiswa                 = 'mahasiswa';
}
