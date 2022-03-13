<?php

namespace App\Services;

use App\Models\Image;

class ImageService implements ImageServiceInterface
{
    protected $image;

    /**
     * Undocumented function
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function Create($params)
    {
        $this->image->create($params);
    }

    public function Delete($id)
    {
        $this->image->findOrFail($id)->delete();
    }

    public function DeleteByProductId($productId)
    {
        $this->image->where('product_id', $productId)->delete();
    }
}