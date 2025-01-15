<?php
namespace App\Repositories;

use App\Models\Model;

class ModelRepository
{
    public function getAll()
    {
        return Model::with('category')->get();
    }

    public function findById($id)
    {
        return Model::with('category')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Model::create($data);
    }

    public function update($id, array $data)
    {
        $model = Model::findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        Model::destroy($id);
    }
}
