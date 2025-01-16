<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    use HasFactory;

    //Default Values for form
    protected $attributes = [
        'id' => '1',
        'category' => '',
        'name' => 'test2',
        'photoUrls' => [],
        'tags' => [],
        'status' => 'test5',
    ];

    protected $fillable = [
        'id',
        'category',
        'name',
        'photoUrls',
        'tags',
        'status',
    ];
}
