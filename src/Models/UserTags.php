<?php

namespace NickKlein\Tags\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTags extends Model
{
    use HasFactory;

    protected $table = 'user_tags';
    protected $primaryKey = 'user_tags_id';
    public $timestamps = false;

    protected $fillable = [
        'tag_id',
        'user_id',
    ];

    public function tag()
    {
        return $this->hasOne(Tags::class, 'tag_id', 'tag_id');
    }
}
