<?php

namespace App\Repositories\Clients;


use App\Client;

class ClientsRepository implements ClientsRepositoryInterface
{
    public $items;

    function __construct(Client $items) {
        $this->items = $items;
    }


    public function createIfNotExists(array $clientId, array $attributes)
    {

        return $this->items->firstOrCreate($clientId, $attributes);
    }

    public function getAll()
    {
        return $this->items->getAll();
    }

    public function find($id)
    {
        return $this->items->findItem($id);
    }

}