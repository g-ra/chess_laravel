<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Chess;

class ChessModels extends Model
{
    protected $table = '';

    protected $fillable = ['id','game_id', 'board'];
    
    public function __construct($fen=null) {
       
        $this-> ChessBoard = new Chess($fen);
        $this->fen = $this-> ChessBoard->fen();
      
    }
    protected function newGame() {
        

    }
    //получение клетки шахматной позиции по клетке
    public function getPiece($square) {
        return $this->ChessBoard->get($square);

    }
    // запись новой шахматной позиции

    //изменение существующей шахматной позиции
    public function moveTo($from, $to) {
        return $this->ChessBoard->move(['from'=> $from, 'to' => $to]);
    }
   

        public function _seeFen($fen=null) {
            
            return $this->ChessBoard->fen();
        }

    public function seeBoard($str) {
        $this->ChessBoard->load($str);
        return $this->ChessBoard->ascii($str);
    }
    public function remove($square){
        return $this->ChessBoard->remove($square);
    }
    public function putTo($type,$color,$square){
        return $this->ChessBoard->put($type,$color,$square);
    }
    public function fen(){
        return $this->ChessBoard->fen();
    }

       

}
