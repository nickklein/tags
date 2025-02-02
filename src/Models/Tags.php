<?php

namespace NickKlein\Tags\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NickKlein\Habits\Models\HabitTime;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'tag_id';
    public $timestamps = false;


    protected $fillable = [
        'tag_name',
    ];

    public function habitTimes()
    {
        return $this->belongsToMany(HabitTime::class, 'habit_times_tags', 'tag_id', 'habit_time_id');
    }
}
