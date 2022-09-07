<?php

namespace App\Http\Controllers;

use App\Services\BoardGames\BoardGamesService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardGamesController extends Controller
{
    public function __construct(
        private BoardGamesService $boardGamesService
    )
    {
        
    }

    public function index(Request $request)
    {
        $boardGames = $this->boardGamesService->getBoardGames();

        return new JsonResponse($boardGames);
    }

    public function show(int $id, Request $request)
    {
        $boardGame = $this->boardGamesService->getBoardGameById($id);

        return new JsonResponse($boardGame);
    }

    public function create(Request $request)
    {
        try {
            $boardGame = $this->boardGamesService->createBoardGame(
                $request->input('game_title'),
                $request->input('category_id'),
                $request->input('play_hours'),
                $request->input('min_players'),
                $request->input('max_players'),
            );

            return new JsonResponse($boardGame);

        } catch(Exception $e) {
            return new JsonResponse($e->getMessage(), 422);
        }
    }
}
