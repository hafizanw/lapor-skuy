<?php

namespace App\Enums;

enum Role: string
{
    case Test                      = 'test';
    case DAAK                      = 'daak';
    case Administrasi_Keuangan     = 'administrasi_keuangan';
    case Hubungan_Internasional    = 'hubungan_internasional';
    case Innovation_Center         = 'innovation_center';
    case LPM                       = 'lpm';
    case Penelitian                = 'penelitian';
    case Resource_Center           = 'resource_center';
    case Unit_Pelayanan_Teknis     = 'unit_pelayanan_teknis';
    case Business_Placement_Center = 'business_placement_center';
    case Direktorat_Kemahasiswaan  = 'direktorat_kemahasiswaan';
    case Hubungan_Masyarakat       = 'hubungan_masyarakat';
    case Pusat_Jaminan_Mutu        = 'pusat_jaminan_mutu';
    case Sarana_Prasarana          = 'sarana_prasarana';
}
