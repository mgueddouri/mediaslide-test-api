<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    protected $modelService;

    public function __construct(ModelService $modelService)
    {
        $this->modelService = $modelService;
    }

    public function index()
    {
        return response()->json($this->modelService->getAllModels());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'height' => 'required|integer',
            'shoe_size' => 'required|string|max:10',
            'category_id' => 'required|exists:categories,id',
            'picture' => 'nullable|string',
        ]);
        $model = $this->modelService->createModel($validated);

        return response()->json($model, 201);
    }

    public function show($id)
    {
        return response()->json($this->modelService->getModelById($id), 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'date_of_birth' => 'sometimes|date',
            'height' => 'sometimes|integer',
            'shoe_size' => 'sometimes|string|max:10',
            'category_id' => 'sometimes|exists:categories,id',
            'picture' => 'nullable|string',
        ]);

        $model = $this->modelService->updateModel($id, $validated);

        return response()->json($model, 200);
    }

    public function destroy($id)
    {
        $this->modelService->deleteModel($id);
        return response()->json(null, 204);
    }
}
