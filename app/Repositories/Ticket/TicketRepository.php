<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\BaseRepository;
class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{
    public function model(): string
    {
        return Ticket::class;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function show(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }

    public function updateOrInsert(array $data)
    {
        return $this->model::updateOrInsert($data);
    }

    public function getByCode(int $code)
    {
        return $this->model->where('code', $code)->first();
    }
}
