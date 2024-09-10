<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\App;

trait CacheHandlerTrait
{

    public static function boot()
    {
        parent::boot();

        if (!App::runningInConsole()) {

            /**
             * Auto create.blade.php created_by field when create.blade.php anything through model
             */
            static::creating(function ($model) {
                $model->fill([
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id()
                ]);
            });

            /**
             * Update cache when user is created
             */
            static::created(function ($model) {
                cache()->forget($model->getTable());
            });


            /**
             * Auto update updated_by field when update anything of the model data
             */
            static::updating(function ($model) {
                $model->fill([
                    'updated_by' => auth()->id()
                ]);
            });

            /**
             * Update cache when user is updated
             */
            static::updated(function ($model) {
                cache()->forget($model->getTable());
            });
        }
    }


    public function scopeUserLog($query)
    {
        return $query->with('created_user', 'updated_user');
    }



    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }



    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
