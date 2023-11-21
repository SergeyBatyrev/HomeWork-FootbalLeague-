<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red_cards extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Red_cards';
    protected
    $fillable = array(
        'id_match',
        'id_player',
        'minuts',
    );
    public $timestamps = false;
}
