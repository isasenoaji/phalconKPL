<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar5;
use KPL\SAR\Domain\Model\SasaranSarValue;

class SqlSar5Repository implements SarRepository {
    protected $di;
    protected $tipe;

    public function __construct(DiInterface $di) {
        $this->di = $di;
        $this->tipe = 5;
    }
    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT sar5.id,periode.nama AS nama_periode,mkkelas.nama AS nama_mk,
            	mkkelas.kelas AS nama_kelas, M.jjnama AS nama_jenjang,
                M.jsnama AS nama_jurusan,M.rmknama AS nama_rmk,
                M.sar4sasaran as sasaran_rmk,M.sar4capaian as capaian_rmk,sar5.sasaran,sar5.capaian,sar5.nip,sar5.locked, sar5.IsAccess as IsAccess
                FROM sar5,mkkelas,periode,
                    (
                    SELECT sar4.id,rmk.id AS rmkid,rmk.nama AS rmknama, jenjang.nama AS jjnama,
                            jurusan.nama AS jsnama,sar4.sasaran AS sar4sasaran,sar4.capaian AS sar4capaian
                    FROM sar4,rmk,jurusan,jenjang
                    WHERE rmk.id = sar4.id_rmk and
                        rmk.id_jurusan = jurusan.id and
                        rmk.id_jenjang = jenjang.id
                    ) M
                WHERE sar5.id_mkkelas = mkkelas.id AND
                      M.rmkid = mkkelas.id_rmk and
                      sar5.nip =:nip and
                      sar5.id_periode = periode.id and
                      periode.status=1";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
      
        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar5 (
                                $row['id'],
                                $row['nama_periode'],
                                $row['nama_mk'],
                                $row['nama_kelas'],
                                $row['nama_jenjang'],
                                $row['nama_jurusan'],
                                $row['nama_rmk'],
                                $row['sasaran_rmk'],
                                $row['capaian_rmk'],
                                $row['sasaran'],
                                $row['capaian'],
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
        return null;
    }

    public function update($nip,$idSar,$sasaran)
    {
        $db = $this->di->getShared('db');
        
        $sql = "UPDATE sar5 SET sasaran=:sasaran
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
        
        $sql = "UPDATE sar5 SET locked=1
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
                FROM sar5
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
        
        $sql = "UPDATE sar5 set Isaccess =1 
                WHERE id in 
                    (
                    SELECT sar.id 
                    FROM sar5 sar,periode 
                    WHERE sar.id_periode = periode.id AND periode.status = 1 and sar.id_mkkelas in 
                        (
                        SELECT mkkelas.id 
                        FROM sar4 sar,mkkelas 
                        WHERE sar.id =:idSar and sar.nip =:nip and mkkelas.id_rmk = sar.id_rmk 
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