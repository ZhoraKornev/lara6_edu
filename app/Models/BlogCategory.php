<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogCategory extends Model
{
    //
}
