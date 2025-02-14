<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends BaseApiController
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $status = $this->ticketService->create($data);

        return $this->responseSuccess(['message' => 'success', 'status' => $status]);
    }

    public function show($code): \Illuminate\Http\JsonResponse
    {
        $ticket = $this->ticketService->show($code);
        if ($ticket) {
            return $this->responseSuccess(['message' => 'success', 'status' => true, 'ticket' => $ticket]);
        } else {
            return $this->responseSuccess(['message' => 'success', 'status' => false]);
        }
    }

    public function getListTransactions($address)
    {
        $listTransactions = DB::table('transactions')->where('wallet_id', $address)->pluck('ticket_id')->toArray();
        $data = [];

        foreach ($listTransactions as $value) {
            $data[] = [
                'ticketCode' => $value,
                'isValid' => false
            ];
        }
        if ($listTransactions) {
            return $this->responseSuccess(['message' => 'success', 'status' => true, 'tickets' => $data]);
        } else {
            return $this->responseSuccess(['message' => 'success', 'status' => false]);
        }
    }

    public function updateTransaction(Request $request)
    {
        $data = $request->all();
        $transaction = DB::table('transactions')->where('ticket_id', $data['ticket_id'])->update(
            ['wallet_id' => $data['address']]
        );
        if ($transaction) {
            return $this->responseSuccess(['message' => 'success', 'status' => true]);
        } else {
            return $this->responseSuccess(['message' => 'success', 'status' => false]);
        }
    }
}
