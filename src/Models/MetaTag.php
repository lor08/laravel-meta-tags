<?php

namespace Fawest\MetaTags\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property string title
 * @property string h1
 * @property string description
 * @property string keywords
 * @property string robots
 */
class MetaTag extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['title', 'h1', 'description', 'keywords', 'robots'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function meta_taggable(): MorphTo
    {
        return $this->morphTo();
    }
}
