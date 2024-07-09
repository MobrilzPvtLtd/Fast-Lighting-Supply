<?php

namespace Modules\Blog\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Blog\Entities\BlogPost;
use Yajra\DataTables\Exceptions\Exception;

class BlogPostTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function make()
    {
        return $this->newTable()
            ->addColumn('featured_image', function (BlogPost $blogPost) {
                return view('admin::partials.table.image', [
                    'file' => $blogPost->featured_image,
                ]);
            })
            ->addColumn('title', function ($blogPost) {
                return $blogPost->title;
            })
            ->addColumn('user', function ($blogPost) {
                return $blogPost->user->full_name;
            })
            ->addColumn('publish_status', function ($blogPost) {
                return ucfirst($blogPost->publish_status);
            });
    }
}
