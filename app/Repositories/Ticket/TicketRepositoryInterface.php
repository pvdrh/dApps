<?php
namespace App\Repositories\Ticket;

use App\Repositories\BaseRepositoryInterface;

interface TicketRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data);

    public function show();

    public function getByCode(int $code);
}
