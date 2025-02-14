<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Table
     */
    protected $table;

    /**
     * @var SoftDelete
     */
    protected $softDelete;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->setModel();
        $this->table = $this->model->getTable();
    }

    public abstract function model();

    public function setModel()
    {
        $this->model = app()->make($this->model());
    }

    /**
     * Find by Id.
     *
     * @param int $id
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Find or fail by Id.
     *
     * @param int $id
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Fields to get
     *
     * @param array $relations
     *
     * @return $this
     */
    public function select($fields)
    {
        $this->model = $this->model->select($fields);

        return $this;
    }

    /**
     * Where Like
     *
     * @param string $field
     * @param string $value
     * @param string $left
     * @param string $right
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereLike(string $field, string $value, string $left = '%', string $right = '%')
    {
        $this->model = $this->model->where($field, 'LIKE', $left . $value . $right);

        return $this;
    }

    /**
     * Where Like
     *
     * @param string $field
     * @param string $value
     * @param string $left
     * @param string $right
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function orWhereLike(string $field, string $value, string $left = '%', string $right = '%')
    {
        $this->model = $this->model->orWhere($field, 'LIKE', $left . $value . $right);

        return $this;
    }

    /**
     * Get sql string
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereHas($relationName, $callback)
    {
        $this->model = $this->model->whereHas($relationName, $callback);

        return $this;
    }

    /**
     * Get sql string
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereBetween(string $field, array $range)
    {
        $this->model = $this->model->whereBetween($field, $range);

        return $this;
    }

    /**
     * Where In list item
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereIn(string $field, array $array)
    {
        $this->model = $this->model->whereIn($field, $array);

        return $this;
    }

    /**
     * Load relations
     *
     * @param array $relations
     *
     * @return $this
     */
    public function with(...$relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }


    /**
     * Get all.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * create.
     *
     * @param array $data
     *
     * @return
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Insert
     *
     * @param array $data
     *
     * @return
     */
    public function insert($data)
    {
        return $this->model->insert($data);
    }

    /**
     * Update by Id.
     *
     * @param int $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->findOrFail($id)->update($data);
    }

    /**
     * Delete.
     *
     * @param Collection|array|int $ids
     *
     * @return int
     */
    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * Where
     *
     * @param array $where
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function where(array ...$condition)
    {
        return $this->model->where($condition);
    }

    /**
     * Delete
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $result = $this->model->findOrFail($id);

        return $result->delete();
    }


    /**
     * Get
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Get sql string
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function toSql()
    {
        return $this->model->toSql();
    }


}
