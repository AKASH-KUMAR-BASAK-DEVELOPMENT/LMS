<?php

namespace App\Models;

use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use AutoCreatedUpdated;
    
    protected $table = 'banners';
    protected $guarded = ['id'];
}
