<?php

namespace App\Http\Controllers;

use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Requests\MySolutionRequest;
use App\Http\Services\GetSolutionService;

class SolutionController extends Controller
{
    private GetSolutionService $service;
    public function __construct()
    {
        $this->service = new GetSolutionService();
    }

    public function getMySolution(MySolutionRequest $request)
    {
        return response()->json(
          $this->service->getSolution(
              (new GetMySolutionRequestDto($request))
          )->toResponseArray()
        );
    }
}
