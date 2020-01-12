<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseBlogController as GuestBaseBlogController;

abstract class BaseAdminBlogController extends GuestBaseBlogController
{
    public function __construct()
    {
    }
}
