<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{    
    use HasFactory;

    protected $primarykey = 'feedback_ID';
    protected $table = 'feedback';
    protected $fillable = ['name','email','service','suggestion','admin_reply'] ;
    public $timestamps = false;
}
