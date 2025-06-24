<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryAlbum;
use App\Models\GalleryMedia;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Albums for clients (client_id: 1 to 10)
        for ($clientId = 1; $clientId <= 10; $clientId++) {
            for ($albumNum = 1; $albumNum <= 10; $albumNum++) {
                $album = GalleryAlbum::create([
                    'title' => "Client{$clientId} Album {$albumNum}",
                    'type' => 'image',
                    'client_id' => $clientId,
                ]);

                $this->seedGalleryMedia($album->id);
            }
        }

        for ($clientId = 1; $clientId <= 10; $clientId++) {
            for ($albumNum = 1; $albumNum <= 10; $albumNum++) {
                $album = GalleryAlbum::create([
                    'title' => "Client{$clientId} Album {$albumNum}",
                    'type' => 'pdf',
                    'client_id' => $clientId,
                ]);

                $this->seedGalleryMedia($album->id);
            }
        }

        // 2. Albums with no client
        for ($albumNum = 1; $albumNum <= 10; $albumNum++) {
            $album = GalleryAlbum::create([
                'title' => "General Album {$albumNum}",
                'type' => 'image',
                // No client_id
            ]);

            $this->seedGalleryMedia($album->id);
        }
    }

    /**
     * Seed 20 media items for each album randomly as jpg or pdf.
     */
    private function seedGalleryMedia($albumId): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $isPdf = rand(0, 1); // 0 for image, 1 for pdf

            $mediaPath = $isPdf
                ? 'uploads/documents/default-document.pdf'
                : 'assets/images/default-gallery.jpg';

            GalleryMedia::create([
                'gallery_album_id' => $albumId,
                'media_path' => $mediaPath,
            ]);
        }
    }
}
