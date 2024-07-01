<?php

namespace App\Models;

use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'partners';
    protected $guarded = ['id'];
}
