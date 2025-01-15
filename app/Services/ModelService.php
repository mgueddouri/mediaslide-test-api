<?php

namespace App\Services;

use App\Repositories\ModelRepository;

class ModelService
{
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    public function getAllModels()
    {
        return $this->modelRepository->getAll();
    }

    public function createModel(array $data)
    {
        return $this->modelRepository->create($data);
    }

    public function getModelById($id)
    {
        return $this->modelRepository->findById($id);
    }

    public function updateModel($id, array $data)
    {
        return $this->modelRepository->update($id, $data);
    }

    public function deleteModel($id)
    {
        return $this->modelRepository->delete($id);
    }
}
