<?php

namespace App\Invention;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Max implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(760, 200);
    }
}