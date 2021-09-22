<?php

namespace Fawest\MetaTags\Traits;

use Fawest\MetaTags\Models\MetaTag;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait MetaTaggable
{
    public static function getTagClassName(): string
    {
        return MetaTag::class;
    }

    public function meta_tag(): MorphOne
    {
        return $this->morphOne(self::getTagClassName(), 'meta_taggable');
    }
}
