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

    public static function registerFile($videofile, $thumbnail)
    {
        $video = Video::create([]);

//        $image_name = $videofile->getRealPath();;
//
//        Cloudder::uploadVideo($image_name, null);


        $videofile->storeAs('public/videos/' . $video->id . '/', $videofile->getClientOriginalName());
        $video->link = '/storage/videos/' . $video->id . '/' . $videofile->getClientOriginalName();

        $thumbnail->storeAs('public/videos/' . $video->id . '/', $thumbnail->getClientOriginalName());
        $video->thumbnail = '/storage/videos/' . $video->id . '/' . $thumbnail->getClientOriginalName();

        $video->save();

        return $video;
    }

    public static function updateVideoFiles(Video $video, $videofile, $thumbnail)
    {
        if ( ! is_null($videofile) &&
            $video->link != '/storage/videos/' . $video->id . '/' . $videofile->getClientOriginalName()
        ){
            $videofile->storeAs('public/videos/' . $video->id . '/', $videofile->getClientOriginalName());
            $video->link = '/storage/videos/' . $video->id . '/' . $videofile->getClientOriginalName();
        }

        if ( ! is_null($thumbnail) &&
            $video->thumbnail != '/storage/videos/' . $video->id . '/' . $thumbnail->getClientOriginalName()
        ){
            $thumbnail->storeAs('public/videos/' . $video->id . '/', $thumbnail->getClientOriginalName());
            $video->thumbnail = '/storage/videos/' . $video->id . '/' . $thumbnail->getClientOriginalName();
        }
    }
}
