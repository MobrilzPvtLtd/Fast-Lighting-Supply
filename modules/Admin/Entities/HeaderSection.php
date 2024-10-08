<?php

namespace Modules\Admin\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;

class HeaderSection extends Model
{
    use Translatable;

    protected $fillable = ['title','is_active'];

    protected $translatedAttributes = [];
}

