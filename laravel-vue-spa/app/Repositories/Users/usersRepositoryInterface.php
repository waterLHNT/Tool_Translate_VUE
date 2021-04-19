<?php

namespace App\Repositories\Users;

interface usersRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create($request);
    public function delete($id);
    public function getPaginate($paginate);
    public function updateData($id,$request);
}
