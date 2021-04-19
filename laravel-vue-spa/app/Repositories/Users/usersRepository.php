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
    public function find($id){
        return $this->model->find($id);
    }
    public function updateData($id, $request){
        $user = $this->find($id);
        $data = [
            'fullname' => $request->fullname??$user->fullname,
            'email' => $request->email??$user->email,
            'password' => $request->password??$user->password,
            'role' => $request->role,
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ];
        $update = $user->update($data);
        return $update;
    }
    public function createData($request){
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ];
        $create = $this->model->create($data);
        return $create;
    }
}
