<?php

namespace Tareghnazari\Course\Http\Controllers;

use Tareghnazari\Course\Http\Requests\SeasonRequest;
use Tareghnazari\Course\Repositories\SeasonRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    public function store($course, SeasonRequest $request, SeasonRepo $seasonRepo)
    {
        $seasonRepo->store($course, $request);



        return back();
    }
}
