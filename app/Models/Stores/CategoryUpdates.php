<?php

namespace App\Models\Stores;

use App\Models\Stores\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryUpdates extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store',
        'category',
        'product_totals',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'category',
        'created_at',
        'deleted_at',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
    ];


    /**
     * Category Relationship
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id')->withDefault();
    }


    /**
     * Store Relationship
     *
     * @return void
     */
    public function storeOwner()
    {
        return $this->belongsTo(Store::class, 'store', 'id')->withDefault();
    }
}
