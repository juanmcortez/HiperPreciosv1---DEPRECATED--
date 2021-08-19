<?php

namespace App\Models\Stores;

use App\Models\Stores\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'store_url',
        'is_vtex_store',
        'last_products_update',
        'total_products',
        'total_categories',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'store_url',
        'is_vtex_store',
        'deleted_at',
        'updated_at',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'last_products_update',
        'created_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_products_update' => 'datetime',
        'created_at' => 'datetime',
        'is_vtex_store' => 'boolean',
    ];


    /**
     * Accessor for last_products_update
     *
     * @param date $value
     * @return Date
     */
    public function getLastProductsUpdateAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y - H:i');
    }


    /**
     * Accessor for created_at
     *
     * @param date $value
     * @return Date
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y - H:i');
    }


    /**
     * Accessor for total_products
     *
     * @param integer $value
     * @return string
     */
    public function getTotalProductsAttribute($value)
    {
        return (empty($value)) ? ' --- ' : $value;
    }


    /**
     * Accessor for total_categories
     *
     * @param integer $value
     * @return string
     */
    public function getTotalCategoriesAttribute($value)
    {
        return (empty($value)) ? ' --- ' : $value;
    }


    /**
     * Categories relationship
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'store', 'id')->orderBy('slug');
    }
}
