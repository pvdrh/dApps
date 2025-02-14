<?php
namespace App\Repositories\Show;

use App\Models\Show;
use App\Repositories\BaseRepository;

class ShowRepository extends BaseRepository implements ShowRepositoryInterface
{
    public function model(): string
    {
        return Show::class;
    }

    public function getAll(): mixed
    {
        return $this->model::with('categories')->get();
    }
}
