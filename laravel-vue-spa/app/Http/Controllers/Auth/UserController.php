<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\findUserResource;
use App\Repositories\Users\usersRepositoryInterface;
class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected $usersRepo;
    public function __construct(usersRepositoryInterface $usersRepo)
    {
        $this->usersRepo = $usersRepo;

    }
    public function current(Request $request)
    {
        return response()->json($request->user());
    }

    public function index(){
        return new UserResource($this->usersRepo->getAll());
    }
    public function store(Request $request){
      $this->usersRepo->createData($request);
    }
    public function delete($id){
        $this->usersRepo->delete($id);
        return response()->json(["message" => "Delete successfully"]);
    }
    public function edit($id){
        return new findUserResource($this->usersRepo->find($id));
    }
    public function update(Request $request,$id){
        return $this->usersRepo->updateData($id,$request);
    }
}
