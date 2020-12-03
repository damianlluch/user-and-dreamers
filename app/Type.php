<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'category_id', 'user_id', 'order', 'avatar', 'birthDate'];
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->hasOne(Dreamer::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
