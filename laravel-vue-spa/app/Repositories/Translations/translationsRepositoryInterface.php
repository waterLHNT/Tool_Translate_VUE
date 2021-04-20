<?php

namespace App\Repositories\Translations;

interface translationsRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function createData($request);
    public function delete($id);
    public function getPaginate($paginate);
    // public function updateData($id,$request);
}
