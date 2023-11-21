<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'News';
    protected
    $fillable = array(
        'summary',
        'short_description',
        'full_text',
        'imagesPath',
    );
    public $timestamps = false;

}
