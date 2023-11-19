<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface CrudInterface
{

    public function getAll(): Paginator;

    public function getById(int $id);

    public function createData($request);

    public function updateById($request, int $id);

    public function deleteById(int $id);

    

}