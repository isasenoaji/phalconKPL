<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar2;
use KPL\SAR\Domain\Model\SasaranSarValue;

class SqlSar2Repository implements SarRepository {
    protected $di;
    protected $tipe;
    public function __construct(DiInterface $di) {
        $this->di = $di;
        $this->tipe = 2;
    }

    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?array {
        $db = $this->di->getShared('db');

            $sql = "SELECT jenjang.nama as nama_jenjang,sar.id, sar.id_jenjang, sar.id_periode,fakultas.nama AS nama_fakultas,
                            sar.capaian, sar.sasaran, sar.nip,sar.locked, periode.nama as nama_periode, sar.IsAccess as IsAccess
                    FROM sar2 sar,periode,jenjang,fakultas
                     WHERE sar.nip =:nip and periode.id = sar.id_periode and periode.status = 1 AND jenjang.id = sar.id_jenjang
                    AND fakultas.id = sar.id_fakultas";
                 

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
        
      
        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar2 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['nama_fakultas'],
                                $row['capaian'],
                                $row['sasaran'],
                                $row['nip'],
                                $row['locked'],
                                $row['IsAccess']
                );
                array_push($SarComponents,$sar);    
            }
            return $SarComponents;
        }

        return null;
    }

    public function getAllSarSupport($Param): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar.id, sar.id_jenjang, sar.id_periode,fakultas.nama AS nama_fakultas,
                     sar.capaian, sar.sasaran, sar.nip,sar.locked, periode.nama as nama_periode, sar.IsAccess as IsAccess
                FROM sar2 sar,periode,jenjang,fakultas,jurusan
                WHERE periode.id = sar.id_periode and periode.status = 1 AND jenjang.id = sar.id_jenjang
                AND fakultas.id = sar.id_fakultas and jurusan.id_fakultas = fakultas.id AND jurusan.id =:id_jurusan";

            $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
                'id_jurusan' => $Param,
            ]);

        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar2 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['nama_fakultas'],
                                $row['capaian'],
                                $row['sasaran'],
                                $row['nip'],
                                $row['locked'],
                                $row['IsAccess']
                );
                array_push($SarComponents,$sar);    
            }
            return $SarComponents;
        }

        return null;
    }

    public function update($nip,$idSar,$sasaran)
    {
        $db = $this->di->getShared('db');
        
        $sql = "UPDATE sar2 SET sasaran=:sasaran
                WHERE id=:idSar AND nip=:nip and locked=0";

        $result = $db->query($sql, [
            'idSar' => $idSar,
            'nip' =>$nip,
            'sasaran' => $sasaran,
        ]); 
      
        if($result)
            return True;
        else 
            return False;
    }

    public function lock($nip,$idSar)
    {
        $db = $this->di->getShared('db');
        
        $sql = "UPDATE sar2 SET locked=1
                WHERE id=:idSar AND nip=:nip";

        $result = $db->query($sql, [
            'idSar' => $idSar,
            'nip' =>$nip,
        ]); 
      
        if($result)
            return True;
        else 
            return False;
    }

    public function getSasaran($nip,$idSar)
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT sasaran
                FROM sar2
                WHERE nip=:nip AND id =:idsar 
                ";

        $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC,
        ['nip'=>$nip, 'idsar'=>$idSar]);
        
      
        if ($result) {
            $sasaranValue = new SasaranSarValue($this->getTipe(),$nip,$idSar,$result["sasaran"]);
            return $sasaranValue;
        }

        return null;
    }


    public function setOpenAccess($nip, $idSar)
    {
        $db = $this->di->getShared('db');
        
        $sql = "UPDATE sar2 set Isaccess=1 
                WHERE id in 
                    (select sar.id
                     FROM sar2 sar,periode
                     WHERE sar.id_periode = periode.id AND periode.status = 1 AND sar.id_jenjang =
                        (
                        SELECT sar.id_jenjang 
                        FROM sar1 sar 
                        WHERE sar.id =:idSar and sar.nip=:nip
                        )
                    )
                ";

        $result = $db->query($sql, [
            'idSar' => $idSar,
            'nip' =>$nip,
        ]); 
      
        if($result)
            return True;
        else 
            return False;
    }
    

}