<?php

namespace Tareghnazari\Course\Models;

use Tareghnazari\Media\Models\Media;
use Tareghnazari\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $guarded = [];


    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function media()
    {
       return $this->hasOne(Media::class,'id','media_id');
    }

    public function getDuration()
    {
        return gmdate("H:i:s",$this->time*60);

    }

}
