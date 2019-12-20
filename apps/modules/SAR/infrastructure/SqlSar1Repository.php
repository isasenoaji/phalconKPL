<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\SarAssigments;
use KPL\SAR\Domain\Model\SarSupportAssigments;
use KPL\SAR\Domain\Model\Sar1;
use KPL\SAR\Domain\Model\SasaranSarValue;

class SqlSar1Repository implements SarRepository {
    protected $di;
    protected $tipe;
    public function __construct(DiInterface $di) {
        $this->di = $di;
        $this->tipe = 1;
    }

    public function save(Sar $sar) {
        // TODO: Implement save() method.
    }

    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?SarAssigments {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar1.id, sar1.id_jenjang, sar1.id_periode, sar1.capaian, sar1.sasaran, sar1.nip,sar1.locked, periode.nama as nama_periode,
                        sar1.Isaccess as IsAccess
                FROM sar1,periode,jenjang
                WHERE sar1.nip = :nip and periode.id = sar1.id_periode and periode.status = 1 and jenjang.id = sar1.id_jenjang";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
        
      
        if ($result) {
            $SarAssigments = new SarAssigments($this->getTipe(),$nip);
            foreach($result as $row){
                $sar = new Sar1 (
                                $row['id'],
                                $row['nama_jenjang'],
                                $row['nama_periode'],
                                $row['capaian'],
                                $row['sasaran'],
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

    public function getAllSarSupport($Param=null): ?SarSupportAssigments {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar1.id, sar1.id_jenjang, sar1.id_periode, sar1.capaian, sar1.sasaran, sar1.nip,sar1.locked, periode.nama as nama_periode
        FROM sar1,periode,jenjang
        WHERE periode.id = sar1.id_periode and periode.status = 1 and jenjang.id = sar1.id_jenjang";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        
      
        if ($result) {
            $SarSupportAssigments = new SarSupportAssigments($this->getTipe());
            foreach($result as $row){
                $sar = new Sar1 (
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
        
        $sql = "UPDATE sar1 SET sasaran=:sasaran
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
        
        $sql = "UPDATE sar1 SET locked=1
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
                FROM sar1
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

    public function setOpenAccess($nip, $idSar){}
    
}