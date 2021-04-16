<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $arr = [];
        $collection = $this->collection->all();

        foreach ($collection as $user) {
            $arr[] = [
                'id'         => $user->id,
                'fullname'   => $user->fullname,
                'email'      => $user->email,
                'role'       => $this->getRole($user->role),
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        }
        return $arr;
    }
    public function getRole($role)
    {
        if ($role == 1) {
            $role = "Master";
        } elseif ($role == 2) {
            $role = "Manager";
        } elseif ($role == 3) {
            $role = "Leader";
        } else {
            $role = "Member";
        }
        return $role;
    }
}
