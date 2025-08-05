<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('id_ID');

        // Mendefinisikan daftar fakultas dan jurusan
        $faculties = [
            'Fakultas Ilmu Komputer',
            'Fakultas Ekonomi dan Sosial',
            'Fakultas Sains dan Teknologi',
            'Program Pasca Sarjana',
        ];

        $majors = [
            'D3 Teknik Informatika',
            'D3 Manajemen Informatika',
            'Informatika',
            'Sistem Informasi',
            'Teknik Komputer',
            'Teknologi Informasi',
            'Akutansi',
            'Ilmu Komunikasi',
            'Ekonomi',
            'Hubungan Internasional',
            'Ilmu Pemerintahan',
            'Kewirausaan',
            'Arsitektur',
            'Perencanaan Wilayah dan Kota',
            'Geografi',
            'Kedokteran Umum',
        ];

        // Pilih fakultas dan jurusan secara acak
        $randomFaculty = $this->faker->randomElement($faculties);
        $randomMajor = $this->faker->randomElement($majors);

        // Generate NIM unik
        static $nimCounter = 5000; // Mulai dari 5000
        $nim = '23.11.' . sprintf('%04d', $nimCounter++);

        return [
            'nim'               => $nim,
            'name'              => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => bcrypt('123'), // Password default
            'phone_number'      => $this->faker->phoneNumber(),
            'profile_picture'   => '', // Kosongkan atau bisa diisi URL placeholder
            'faculty'           => $randomFaculty,
            'major'             => $randomMajor,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}