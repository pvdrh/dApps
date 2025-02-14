<?php
namespace App\Repositories\Show;

use App\Repositories\BaseRepositoryInterface;

interface ShowRepositoryInterface extends BaseRepositoryInterface
{
    public function getAll(): mixed;
}
