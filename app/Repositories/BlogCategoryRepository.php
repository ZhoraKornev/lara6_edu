<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return BlogCategory::class;
    }

    /**
     * @param $id
     * @return BlogCategory
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getListForComboBox()
    {
        $columns = implode(',', ['id',
            'CONCAT (id, ". ", title) as title']);
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @param int|null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate(int $perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with('parentCategory:id,title')
            ->paginate($perPage);

        return $result;
    }


}
