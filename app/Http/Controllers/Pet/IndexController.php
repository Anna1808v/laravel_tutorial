<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Hashtag;
use App\Category;
use App\Http\Filters\PetFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Pet\PetResource;
use App\Http\Requests\Pet\FilterRequest;
use App\Http\Controllers\Pet\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends BaseController
{
    use AuthorizesRequests;
    public function __invoke(FilterRequest $request)
    {
        
        //$this->authorize('view', auth()->user());
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PetFilter::class, ['queryParams' => array_filter($data)]);
        $pets = Pet::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        //return view('pet.index', compact('pets'));
        return PetResource::collection($pets);
    }
}
