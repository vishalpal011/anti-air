<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video_ad_url extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['client_id','vendor_id','title','link','start_date','end_date','description','status'];

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
