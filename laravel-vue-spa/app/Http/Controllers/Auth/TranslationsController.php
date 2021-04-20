<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\findTranslationResource;

use App\Repositories\Translations\translationsRepositoryInterface;

class TranslationsController extends Controller
{
    protected $translationsRepo;
    public function __construct(translationsRepositoryInterface $translationsRepo)
    {
        $this->translationsRepo = $translationsRepo;
    }
    public function store(Request $request)
    {
        $this->translationsRepo->createData($request);
    }
    public function edit($id){
        return new findTranslationResource($this->translationsRepo->find($id));
    }
}
