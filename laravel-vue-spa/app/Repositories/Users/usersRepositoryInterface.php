<?php

namespace App\Repositories\Users;

interface usersRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
    public function getPaginate($paginate);
}
