<?php

namespace Interested;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function events()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Interested\Event')->withTimestamps();
    }

    # Tag.php
    public function getTagsForCheckboxes() {

        $tags = $this->orderBy('name','ASC')->get();

        $tagsForCheckboxes = [];

        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag['id']] = $tag;
        }

        return $tagsForCheckboxes;

    }
}
