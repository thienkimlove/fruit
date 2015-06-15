<?php

namespace App\Invention;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Mini implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(5, 5);
    }
}