<?php 
namespace App\Repositories;

use App\Models\Matchs;
use App\Models\tickets;
use App\Repositories\MatchRepositoryInterface;

class TicktesRepostry implements TicketsRepositryIntirface
{
    protected $model;

    public function __construct(tickets $model)
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