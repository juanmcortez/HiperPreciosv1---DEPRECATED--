<?php

namespace App\Models\Stores;

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
        'last_products_update' => 'datetime:M d, Y H:i',
        'created_at' => 'datetime:M d, Y H:i',
    ];


}
