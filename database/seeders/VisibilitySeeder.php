<?php
namespace Database\Seeders;

use App\Enums\Visibility_Type;
use App\Models\ComplaintCategory;
use Illuminate\Database\Seeder;

class VisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComplaintCategory::create([
            'visibility_type' => Visibility_Type::Private->value,

        ]);

        ComplaintCategory::create([
            'visibility_type' => Visibility_Type::Public->value,
        ]);
    }
}