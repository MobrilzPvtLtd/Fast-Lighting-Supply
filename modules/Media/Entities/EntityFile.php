<?php

namespace Modules\Media\Entities;

use Modules\Support\Eloquent\Model;

class EntityFile extends Model
{
    protected $table = 'entity_files';
    protected $fillable = ['file_id', 'entity_type', 'entity_id', 'zone'];
}
