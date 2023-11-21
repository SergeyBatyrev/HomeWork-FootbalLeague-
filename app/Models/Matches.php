<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matches extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Matches';
    protected
    $fillable = array(
        'id_com1',
        'id_com2',
        'date',
        'win_com',
        'id_city',
    );
    public $timestamps = false;
    //     public function users()
// {
//     return $this->hasMany(Teams::class);
// }

    public function FF(): BelongsTo
    {
        return $this->belongsTo(Teams::class, 'id_com1', 'id');
    }
    public function FF2(): BelongsTo
    {
        return $this->belongsTo(Teams::class, 'id_com2', 'id');
    }
    public function FF3(): BelongsTo
    {
        return $this->belongsTo(Teams::class, 'id_city', 'id');
    }

    public function countGoals()
    {
        return $this->hasMany(Goals::class, 'id_match', 'id')->count();
    }

    public function goals()
    {
        return $this->hasMany(Goals::class);
    }
    public function emblem1()
    {
        return $this->belongsTo(Teams::class, 'id_com1', 'id');
    }
    public function emblem2()
    {
        return $this->belongsTo(Teams::class, 'id_com2', 'id');
    }

}