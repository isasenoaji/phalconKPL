<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar3;
use KPL\SAR\Domain\Model\SasaranSarValue;

class SqlSar3Repository implements SarRepository {
    protected $di;
    protected $tipe;

    public function __construct(DiInterface $di) {
        $this->di = $di;
        $this->tipe = 3;
    }

    public function save(Sar $sar) {
        // TODO: Implement save() method.
    }

    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT s.*, p.nama as nama_periode, js.nama as nama_jurusan, jj.nama as nama_jenjang
                FROM sar3 s, periode p, jurusan js, jenjang jj
                WHERE s.id_periode = p.id AND p.status = 1 AND s.id_jenjang = jj.id AND s.id_jurusan = js.id AND s.nip = :nip;
                ";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
      
        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar3 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['nama_jurusan'],
                                $row['sasaran'],
                                $row['capaian'],
                                $row['nip'],
                                $row['locked']
                );
                array_push($SarComponents,$sar);    
            }
            return $SarComponents;
        }

        return null;
    }

    public function getAllSarSupport($Param): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar.id, sar.id_jenjang, sar.id_periode, 
                        sar.capaian, sar.sasaran, sar.nip,sar.locked, periode.nama as nama_periode,jurusan.nama as jurusan
                FROM sar3 sar,periode,jenjang,jurusan
                WHERE periode.id = sar.id_periode and 
                      periode.status = 1 AND jenjang.id = sar.id_jenjang
                      and sar.id_jurusan =:id_jurusan  and jurusan.id = sar.id_jurusan
               ";

            $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
                'id_jurusan' => $Param,
            ]);

        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar3 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['capaian'],
                                $row['sasaran'],
                                $row['nip'],
                                $row['locked']
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
        
        $sql = "UPDATE sar3 SET sasaran=:sasaran
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
        
        $sql = "UPDATE sar3 SET locked=1
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
                FROM sar3
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

}