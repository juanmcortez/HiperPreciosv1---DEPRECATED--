<?php

namespace App\Models\Stores;

use App\Models\Stores\CategoryUpdates;
use App\Models\Stores\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_reference_id',
        'name',
        'slug',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'store_reference_id',
        'created_at',
        'deleted_at',
        'updated_at',
    ];


    /**
     * Products per category relationship
     *
     * @return void
     */
    public function productsQuantity()
    {
        return $this->hasMany(CategoryUpdates::class, 'category', 'id')->orderBy('updated_at');
    }
}
