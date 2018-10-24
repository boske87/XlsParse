<?php

namespace App\Repositories\Clients;


interface ClientsRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function createIfNotExists(array $clientId, array $attributes);
}