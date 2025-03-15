<?php 
namespace App\Repositories;

use App\Models\Stades;

class StadeReposittory implements StadRepositoryInterface
{
    protected $model;

    public function __construct(Stades $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }   

    public function update(array $data, $id)
    {
        $stade = $this->model->findOrFail($id);
        $stade->update($data);
        return $stade;
    }

    
    
    public function delete($id)
    {
        $team = $this->model->findOrFail($id);
        $team->delete();
        return $team;
    }
}