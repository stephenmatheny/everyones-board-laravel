<?php

  namespace App\Services\BoardGames;

use App\Models\BoardGame;
use Exception;
use Illuminate\Database\Eloquent\Collection;

  class BoardGamesService
  {
    public function getBoardGames(): Collection
    {
      return BoardGame::all();
    }

    public function getBoardGameById(int $id): BoardGame
    {
      return BoardGame::find($id);
    }

    public function getBoardGameByTitle(string $gameTitle): ?BoardGame
    {
      return BoardGame::where('game_title', '=', $gameTitle)->first();
    }

    public function createBoardGame(
      string $game_title,
      int $category_id,
      int $play_hours,
      int $min_players,
      int $max_players,
    ): BoardGame
    {
      if($this->getBoardGameByTitle($game_title) !== null) {
        throw new Exception('Board Game Title Exists');
      }

      return BoardGame::create([
        'game_title'  => $game_title,
        'category_id' => $category_id,
        'play_hours'  => $play_hours,
        'min_players' => $min_players,
        'max_players' => $max_players,
      ]);
    }
  }
