<?php

namespace App\Invention;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Big implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(700, 700);
    }
}