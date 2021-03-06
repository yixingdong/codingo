<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as VoyagerCategory;

class Category extends VoyagerCategory
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }


}
