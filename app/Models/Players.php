<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Players';
    protected
    $fillable = array(
        'name',
        'photo',
        'position',
        'id_team',
    );
    public $timestamps = false;
    public function playersGol()
    {
        return $this->hasMany(Goals::class);
    }
}
