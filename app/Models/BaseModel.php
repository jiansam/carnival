<?php
namespace App\Models;


use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasDateTimeFormatter;
    use UID;

    protected $keyType = 'string';

}




trait UID{

    public static function boot()

    {
        parent::boot();

        static::creating(function (Model $model) {

            $model->setKeyType('string');

            $model->setIncrementing(false);

            $model->setAttribute($model->getKeyName(),  uniqid(mt_rand()));
        });
    }
}