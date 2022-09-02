<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;
    private $relations;

    public function __construct(Model $model, array $relations = [])
    {
        $this->model = $model;
        $this->relations = $relations;
    }

    public function all($sort = [])
    {
        $query = $this->model;
      
        if(!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        if($sort){
            $query = $query->orderBy($sort['field'], $sort['order']);
        }

        return $query->get();
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    public function update($request,$id)
    {
        $model = $this->model->find($id);
        $model->update($request->all());

        return $model;
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }
}