<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yellow_cards extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Yellow_cards';
    protected
    $fillable = array(
        'id_match',
        'id_player',
        'minuts',
    );
    public $timestamps = false;
}
