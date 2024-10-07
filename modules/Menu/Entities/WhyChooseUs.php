<?php

namespace Modules\Menu\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;

class WhyChooseUs extends Model
{
    use Translatable;

    protected $fillable = ['icon','title','description','is_active'];

    protected $translatedAttributes = [];
}
