<?php

namespace App\Models;

use App\Traits\AutoCreatedUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'permissions';
    protected $guarded = ['id'];
}
