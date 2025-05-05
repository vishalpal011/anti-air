<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video_ads extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

    protected $fillable = ['client_id','vendor_id','title','video','start_date','end_date','description','status'];

    public function client()
    {
        return $this->hasOne(Client::class, "id", "client_id");
    }

    public function courier()
    {
        return $this->hasOne(Courier::class, "id","vendor_id");
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('videos');
    }
}
