<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Teams';
    protected
    $fillable = array(
        'name',
        'emblem',
        'city',
        'name_stadium',
        'coach',
        'photo_coach'
    );
    public $timestamps = false;
    //     public function role()
// {
//     return $this->belongsTo(Matches::class);
// }

    public function users()
    {
        return $this->hasMany(Matches::class);
    }
    public function players()
    {
        return $this->hasMany(Players::class);
    }
    public function Goals()
    {
        return $this->hasMany(Goals::class);
    }
}