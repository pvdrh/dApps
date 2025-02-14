<?php

namespace App\Services;

use App\Repositories\Ticket\TicketRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TicketService
{
    protected TicketRepositoryInterface $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function create($data): bool
    {
        $dataWallet = [];
        $dataWallet['wallet_id'] = $data['wallet_id'];
        $dataWallet['ticket_id'] = $data['code'];
        unset($data['wallet_id']);

        $oldTicket = $this->ticketRepository->getByCode($data['code']);
        if ($oldTicket) {
            return false;
        }

        $this->ticketRepository->updateOrInsert($data);
        DB::table('transactions')->Insert($dataWallet);

        return true;
    }

    public function show($code)
    {
        return $this->ticketRepository->getByCode($code);
    }
}
