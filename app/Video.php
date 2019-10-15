<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JD\Cloudder\Facades\Cloudder;

class Video extends Model
{
    protected $guarded = [];

    public function publication()
    {
        return $this->morphOne(Publication::class, 'publicationable');
    }

    public static function registerFile($file)
    {
        $video = Video::create([]);

//        $image_name = $file->getRealPath();;
//
//        Cloudder::uploadVideo($image_name, null);


        $file->storeAs('public/videos/' . $video->id . '/', $file->getClientOriginalName());

        $video->link = '/storage/videos/' . $video->id . '/' . $file->getClientOriginalName();
        $video->save();

        return $video;
    }
}
