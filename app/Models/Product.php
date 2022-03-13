<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type_product_id',
        'category_id',
        'supplier_id',
        'description',
        'slug',
        'origin',
        'material',
        'size',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'status',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
