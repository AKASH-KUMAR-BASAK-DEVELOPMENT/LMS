<?php

namespace App\Models;

use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'modules';
    protected $guarded = ['id'];
}
