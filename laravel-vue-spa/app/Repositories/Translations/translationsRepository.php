<?php

namespace App\Repositories\Translations;

use App\Repositories\BaseRepository;
use Carbon\Carbon;

class translationsRepository extends BaseRepository implements translationsRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Translations::class;
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
    public function createData($request){
        $data = [
            'assignee_id'        => $request->assignee_id??0,
            'created_by'         => $request->created_by??0,
            'updated_by'         => $request->updated_by??0,
            'title'              => $request->title??"None",
            'content_default'    => $request->content_default??"None",
            'content_translated' => $request->content_translated??"None",
            'status'             => $request->status??0,
            'type'               => $request->type??0,
            'start_date'         => $request->start_date??Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            'end_date'           => $request->end_date??Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            'created_at'         => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at'         => Carbon::now('Asia/Ho_Chi_Minh'),
        ];
        $create = $this->model->create($data);
        return $create;
    }
}
