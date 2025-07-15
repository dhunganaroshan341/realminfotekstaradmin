<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'client_id',
        'thumbnail',
        'url',
        'status',
    ];

    /**
     * Relationship: A Gallery Album has many Media items.
     */
    public function galleryMedia()
    {
        return $this->hasMany(GalleryMedia::class, 'gallery_album_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    /**
     * Optional: if you want enum casting (Laravel 10+)
     */
    // protected $casts = [
    //     'type' => GalleryTypeEnum::class,
    //     'status' => AlbumStatusEnum::class,
    // ];
    // In GalleryAlbum.php model

public function getWebsiteThumbnailAttribute()
{
    $firstMedia = $this->galleryMedia->first();

    return $firstMedia && !empty($firstMedia->image_path)
        ? $firstMedia->image_path
        : '/front/images/website-thumbnail.jpg';
}

}
