<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoryInterface
{
    /**
     * Find by Id.
     *
     * @param int $id
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find(int $id);

    /**
     * Find or fail by Id.
     *
     * @param int $id
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findOrFail(int $id);

    /**
     * Load relations
     *
     * @param array $relations
     *
     * @return $this
     */
    public function with(...$relations);


    /**
     * Get all.
     *
     * @return Collection
     */
    public function all();

    /**
     * create.
     *
     * @param array $data
     *
     * @return
     */
    public function create(array $data);

    /**
     * Update by Id.
     *
     * @param int $id
     * @param array $data
     *
     * @return Model
     */
    public function update(int $id, array $data);

    /**
     * Destroy by Id
     *
     * @param Collection|array|int $ids
     *
     * @return int
     */
    public function destroy($ids);

    /**
     * Delete
     *
     * @param $id
     */
    public function delete(int $id);

    /**
     * Fields to get
     *
     * @param array $fields
     *
     * @return $this
     */
    public function select(array $fields);

    /**
     * Where Like
     *
     * @param string $field
     * @param string $value
     * @param string $left
     * @param string $right
     *
     * @return $this
     */
    public function whereLike(string $field, string $value, string $left = '%', string $right = '%');

    /**
     * Get sql string
     *
     * @param string $relationName
     * @param closure $callback
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereHas($relationName, $callback);

    /**
     * Get range two date
     * @param string $field
     * @param array $range
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function whereBetween(string $field, array $range);

    /**
     * Get Result
     *
     * @return Collection
     */
    public function get();

    /**
     * Get sql string
     *
     * @return String
     */
    public function toSql();

}
