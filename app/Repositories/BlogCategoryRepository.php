<?php

namespace App\Repositories;

use App\Models\BlogCategory;

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

    public function getAllWithPaginate(int $perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }


}
