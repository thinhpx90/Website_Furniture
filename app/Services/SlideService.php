<?php

namespace App\Services;

use App\Models\Slide;

class SlideService implements SlideServiceInterface
{
    protected $slide;

    /**
     * Undocumented function
     */
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetSlide()
    {
        return $this->slide->all();
    }

    /**
     * Undocumented function
     *
     * @param array $params
     * @return void
     */
    public function CreateSlide($params)
    {
        $this->slide->create($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function GetDetail($id)
    {
        return $this->slide->findOrFail($id);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @param array $params
     * @return void
     */
    public function UpdateSlide($id, $params)
    {
        $this->slide->findOrFail($id)->update($params);
    }

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function DeleteSlide($id)
    {
        $this->slide->findOrFail($id)->delete();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function GetSlidePublic()
    {
        return $this->slide->where('status', 1)->get();
    }
}