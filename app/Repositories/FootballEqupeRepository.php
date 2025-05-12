<?php

namespace App\Repositories;

use App\Models\Equipe;
use App\Models\FootballTeam;

class FootballEqupeRepository implements FootballEqupeRepositoryInterface
{
    protected $model;

    public function __construct(Equipe $model)
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
        $team = $this->model->findOrFail($id);
        $team->update($data);
        return $team;
    }

    public function delete($id)
    {
        $team = $this->model->findOrFail($id);
        $team->delete();
        return $team;
    }
}