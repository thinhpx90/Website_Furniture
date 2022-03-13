<?php

namespace App\Services;

interface SlideServiceInterface
{
    public function GetSlide();

    public function CreateSlide($params);

    public function GetDetail($id);

    public function UpdateSlide($id, $params);

    public function DeleteSlide($id);

    public function GetSlidePublic();
}