<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ComplaintAttachment;
use App\Models\ComplaintCategory;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            VisibilitySeeder::class,
            ComplaintAttachmentSeeder::class,
            ComplaintSeeder::class,
            CommentSeeder::class,
            DepartmentSeeder::class,
            AdminSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
