<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;


/**
 * Class Blog
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $text
 */
class Blog extends Model
{
    protected $fillable = ['title', 'text', 'slug', 'parent_id', 'created_by', 'modified_by'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isTheOwner($user)
    {
        return $this->user_id === $user->id;
    }

    public function categories(): MorphMany
    {
        return $this->morphToMany(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug'; // db column name
    }

}
