<?php 
namespace App\Repositories;

use App\Models\Matchs;
use App\Repositories\MatchRepositoryInterface;

class MatchRepository implements MatchRepositoryInterface
{
    protected $model;

    public function __construct(Matchs $model)
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

    public function update($id, array $data)
    {
        $match = $this->model->findOrFail($id);
        $match->update($data);
        return $match;
    }

    public function delete($id)
    {
        $match = $this->model->findOrFail($id);
        $match->delete();
        return $match;
    }
}