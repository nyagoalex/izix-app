<?php

namespace App\Domain\Vistor\Models;

use Database\Factories\VistorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistor extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return VistorFactory::new();
    }
}
