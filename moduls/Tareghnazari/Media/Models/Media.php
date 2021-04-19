<?php


namespace Tareghnazari\Media\Models;


use Illuminate\Database\Eloquent\Model;
use Tareghnazari\Course\Models\Course;
use Tareghnazari\Media\Services\MediaFileService;

class Media extends Model
{
    protected $casts = [
      'file' => 'json'
    ];

    protected static function booted()
    {
        static::deleting(function ($media){

            MediaFileService::delete($media);
        });
    }
    public function getThumbAttribute()
    {
        if (array_key_exists(300,$this->file)) {
            return '/storage/' .  $this->file['300'];
        }
        return null;

    }



}
