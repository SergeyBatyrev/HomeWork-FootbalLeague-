<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Goals';
    protected
    $fillable = array(
        'id_match',
        'id_player',
        'minuts',
        'assistant',
        'id_com'
    );
    public $timestamps = false;
    public function post()
    {
        return $this->belongsTo(Matches::class, 'id_match', 'id');
    }
    public function league()
    {
        return $this->belongsTo(Matches::class);
    }
    public function league2()
    {
        return $this->belongsTo(Players::class, 'id_player', 'id');
    }

}