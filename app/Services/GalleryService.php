<?php

namespace App\Services;

use App\Models\GalleryAlbum;
use App\Models\Client;

class GalleryService
{
    public function getAlbumById($id)
    {
        return GalleryAlbum::with(['galleryMedia', 'client'])->find($id);
    }

    public function getAlbumsByClient($clientId)
    {
        return GalleryAlbum::with(['galleryMedia', 'client'])
            ->where('client_id', $clientId)
            ->where('status', 'Active')
            ->get();
    }

    public function getAllAlbums()
    {
        return GalleryAlbum::with(['galleryMedia', 'client'])->get();
    }

    public function getAlbumsWithClients($type = null)
    {
        $query = GalleryAlbum::has('client')->with(['galleryMedia', 'client']);
        if ($type) {
            $query->where('type', $type);
        }
        return $query->get()->groupBy(fn($album) => $album->client->id);
    }

    public function getAlbumsWithNoClients($type = null)
    {
        return GalleryAlbum::doesntHave('client')
            ->when($type, fn($q) => $q->where('type', $type))
            ->with('galleryMedia')
            ->get();
    }
}
