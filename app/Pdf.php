<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $fillable = [
        'pdf'
    ];
    protected $table = 'pdf';
}
