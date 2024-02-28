<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRaceRequest;
use App\Models\Race;
use App\Traits\HttpResponses;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Exception;

class RaceController extends Controller
{
    use HttpResponses;

    // Lista todos ou parcialmente os dados de um recurso
    public function index() {
        $races = Race::all();
        return $races;
    }

    public function store(StoreRaceRequest $request)
    {
        try {

            $body = $request->all();

            $race = Race::create($body);

            return $race;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}
