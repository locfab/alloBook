<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public static function moyBookMark($id){
        $marks = Mark::where('book_id', (int)$id)->where('mark', '>', 0)->get();
        if(count($marks) == 0) return 0;

        $moyenne = 0;
        foreach ($marks as $mark)
        {
            $moyenne += $mark->mark;
        }
        return $moyenne/count($marks);
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function marks(){
        return $this->hasMany('App\Mark');
    }
}
