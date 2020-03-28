<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageCategory extends Model
{
    use SoftDeletes;

    protected $table = 'package_categories';

    protected $fillable =
    [
        'title',
        'discription',
        'creatorid',
    ];



    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function getCategory($id)
    {
        return PackageCategory::where('id', $id)->first();
    }
}
