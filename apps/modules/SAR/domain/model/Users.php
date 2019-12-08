<?php  

namespace KPL\SAR\Domain\Model;
use \Phalcon\Mvc\Model;

class Users extends Model {

   public $nip; 
   public $nama;   
   public $id_fakultas; 
   public $id_jurusan;
   public $jabatan;

   public function nip() {
      return $this->nip;
   }

   public function nama(){
      return $this->nama;
   }

   
   public static function find($parameters = null) { 
      return parent::find($parameters);
   }  

   public static function findFirst($parameters = null) {
      return parent::findFirst($parameters);
   } 
}