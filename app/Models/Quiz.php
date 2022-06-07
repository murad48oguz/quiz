<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = ['title','description','status','finished_at',];
    protected $dates = ['finished_at'];

    public function getFinishedAttribute($date){

        return $date ? Carbon::parse($date) : null;

    }

    public function questions(){


        return $this->hasMany(Question::class);

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
