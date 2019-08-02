<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Classlist
 *
 * @property int $class_id
 * @property string $class_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classlist whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classlist whereClassName($value)
 * @mixin \Eloquent
 */
class Classlist extends Model
{
    protected $table = 'classlist';
    protected $guarded = [];

    public function products() {
        return $this->hasMany('App\Product', 'class_id', 'class_id');
    }

}
