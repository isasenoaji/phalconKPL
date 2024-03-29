<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\SarSupportAssigments;
use KPL\SAR\Domain\Model\SarAssigments;
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

    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?SarAssigments {
        $db = $this->di->getShared('db');

        $sql = "SELECT s.*, p.nama as nama_periode, js.nama as nama_jurusan, jj.nama as nama_jenjang, s.IsAccess as IsAccess
                FROM sar3 s, periode p, jurusan js, jenjang jj
                WHERE s.id_periode = p.id AND p.status = 1 AND s.id_jenjang = jj.id AND s.id_jurusan = js.id AND s.nip = :nip;
                ";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
      
        if ($result) {
            $SarAssigments = new SarAssigments($this->getTipe(),$nip);
            foreach($result as $row){
                $sar = new Sar3 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['nama_jurusan'],
                                $row['sasaran'],
                                $row['capaian'],
                                $row['nip'],
                                $row['locked'],
                                $row['IsAccess']
                );
                $SarAssigments->addComponents($sar);   
            }
            return $SarAssigments;
        }

        return null;
    }

    public function getAllSarSupport($Param): ?SarSupportAssigments {
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
            $SarSupportAssigments = new SarSupportAssigments($this->getTipe());
            foreach($result as $row){
                $sar = new Sar3 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['capaian'],
                                $row['sasaran'],
                                $row['nip'],
                                $row['locked'],
                                $row['IsAccess']
                );
                $SarSupportAssigments->addComponents($sar);
            }
            return $SarSupportAssigments;
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

    public function setOpenAccess($nip, $idSar)
    {
        $db = $this->di->getShared('db');
        
        $sql = "UPDATE sar3 set Isaccess=1 
                WHERE id in
                    (
                    SELECT sar.id
                    FROM sar3 sar,periode,
                        (
                        SELECT jurusan.id as jsid, sar.id_jenjang as jjid
                        FROM sar2 sar,fakultas,jurusan
                        WHERE sar.id_fakultas = fakultas.id and fakultas.id = jurusan.id_fakultas and sar.nip =:nip and sar.id =:idSar
                        ) M
                    WHERE sar.id_periode = periode.id and periode.status = 1 and M.jjid = sar.id_jenjang and sar.id_jurusan = M.jsid
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