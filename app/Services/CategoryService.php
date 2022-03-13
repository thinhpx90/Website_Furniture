<?php

namespace App\Services;

use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function GetListCategory($params)
    {
        $query = [];
        if (isset($params['search'])) {
            $query = [
                ['name', 'like', '%' . $params['search'] . '%'],
            ];
        }
        return $this->category->where($query)->paginate();
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function CreateCategory($params)
    {
        $this->category->create($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function DeleteCategory($id)
    {
        $this->category->findOrFail($id)->delete();
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function GetDetailCategory($id)
    {
        return $this->category->findOrFail($id);
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function UpdateCategory($id, $params)
    {
        $this->category->findOrFail($id)->update($params);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetAllCategory()
    {
        return $this->category->orderBy('name', 'ASC')->get();
    }
}
