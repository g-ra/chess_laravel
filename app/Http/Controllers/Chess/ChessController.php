<?php

namespace App\Http\Controllers\Chess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChessModels;
use Illuminate\Support\Facades\DB;

class ChessController extends Controller
{
    
    public function __construct(Request $request) {
       
     
       $this->boardId = $boardId = $request->input('board_id');

        $this->board = $board = DB::table('boards')->where('game_id', '=', $boardId)->value('board');
        if (!!$board) {
                   
        $this->ChessModels = new ChessModels($board);
        } else {$this->ChessModels = new ChessModels();}
    }
    public function getPiece($square) {
      // получить позицию       
     
     
    
        return response()->json([$this->ChessModels->getPiece($square)], 200);
    }
    public function remove($square) {
        //удалить
        return response()->json([$this->ChessModels->remove($square)], 200);   
    }
    public function putTo($typepop,$color,$square) {


        return response()->json([$this->ChessModels->putTo($typepop,$color,$square)], 200);   
    }
    public function moveTo($from, $to) {
        //передвинуть

        $res = $this->ChessModels->moveTo($from,$to);
        if ($res) {

        
        $fen = $this->ChessModels->fen(); 
        $board = DB::table('boards')->where('game_id', '=', $this->boardId)->update(['board'=>$fen]);
        }
        
        return response()->json([$res], 200);   
    }
    public function getBoard() {
        //посмотреть таблицу
        
        if (true){
          //  $board = DB::table('boards')->where('game_id', '=', $id)->value('board');
            
            
            
          
                    return response($this->ChessModels->seeBoard($this->board), 200);   
        } else {
            
        }
    }
    

}
