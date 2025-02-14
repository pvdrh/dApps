<?php

namespace App\Services;

use App\Repositories\Show\ShowRepositoryInterface;

class ShowService
{
    protected ShowRepositoryInterface $showRepository;

    public function __construct(ShowRepositoryInterface $showRepository)
    {
        $this->showRepository = $showRepository;
    }

    public function getAll()
    {
        return $this->showRepository->getAll();
    }

    public function create($data)
    {
        return $this->showRepository->create($data);
    }

    public function find($id)
    {
        return $this->showRepository->find($id);
    }

    public function delete($id)
    {
        $show = $this->showRepository->find($id);
        return $show->delete($show);
    }
}
