<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class usersRepository extends BaseRepository implements usersRepositoryInterface
{
    use AuthenticatesUsers;
    public function getModel()
    {
        return \App\Models\User::class;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function delete($id){
        return $this->model->find($id)->delete();
    }
}
