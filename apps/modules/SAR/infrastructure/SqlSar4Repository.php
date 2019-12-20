<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\SarSupportAssigments;
use KPL\SAR\Domain\Model\SarAssigments;
use KPL\SAR\Domain\Model\SarRepository;
use KPL\SAR\Domain\Model\Sar;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar4;
use KPL\SAR\Domain\Model\SasaranSarValue;

class SqlSar4Repository implements SarRepository {
    protected $di;
    protected $tipe;

    public function __construct(DiInterface $di) {
        $this->di = $di;
        $this->tipe = 4;
    }


    public function getTipe(){
        return $this->tipe;
    }

    public function getAllSarMaster($nip): ?SarAssigments {
        $db = $this->di->getShared('db');

        //SAR 4 ditampilkan bersama SAR 3
        $sql = "SELECT sar4.id,periode.nama AS nama_periode,M.jjnama AS nama_jenjang,M.rmknama AS nama_rmk,
                        sar4.capaian,sar4.sasaran,M.jsnama AS nama_jurusan,M.sar3sasaran AS sasaran_jurusan,
                        M.sar3capaian AS capaian_jurusan, sar4.nip, sar4.locked, sar4.IsAccess as IsAccess
                FROM sar4,periode,(
                                    SELECT rmk.id AS rmkid,jenjang.nama AS jjnama,rmk.nama AS rmknama,jurusan.nama AS jsnama,
                                             sar3.sasaran AS sar3sasaran,sar3.capaian AS sar3capaian
                                    FROM sar3,rmk,jenjang,jurusan
                                    WHERE sar3.id_jurusan = rmk.id_jurusan and sar3.id_jenjang = rmk.id_jenjang and
                                        jenjang.id = sar3.id_jenjang and jenjang.id = rmk.id_jenjang and jurusan.id = rmk.id_jurusan
                                    ) M
                WHERE  sar4.id_periode = periode.id AND periode.status = 1
                        AND M.rmkid = sar4.id_rmk AND sar4.nip =:nip";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
      
        if ($result) {
            $SarAssigments = new SarAssigments($this->getTipe(),$nip);
            foreach($result as $row){
                $sar = new Sar4 (
                                $row['id'],
                                $row['nama_periode'],
                                $row['nama_jenjang'],
                                $row['nama_rmk'],
                                $row['sasaran'],
                                $row['capaian'],
                                $row['nama_jurusan'],
                                $row['sasaran_jurusan'],
                                $row['capaian_jurusan'],
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

        //SAR 4 ditampilkan bersama SAR 3
        $sql = "SELECT sar4.id,periode.nama AS nama_periode,M.jjnama AS nama_jenjang,M.rmknama AS nama_rmk,
                        sar4.capaian,sar4.sasaran,M.jsnama AS nama_jurusan,M.sar3sasaran AS sasaran_jurusan,
                        M.sar3capaian AS capaian_jurusan, sar4.nip, sar4.locked, sar4.IsAccess as IsAccess
                FROM sar4,periode,(
                                    SELECT rmk.id AS rmkid,jenjang.nama AS jjnama,rmk.nama AS rmknama,jurusan.nama AS jsnama,
                                             sar3.sasaran AS sar3sasaran,sar3.capaian AS sar3capaian
                                    FROM sar3,rmk,jenjang,jurusan
                                    WHERE sar3.id_jurusan = rmk.id_jurusan and sar3.id_jenjang = rmk.id_jenjang and
                                        jenjang.id = sar3.id_jenjang and jenjang.id = rmk.id_jenjang and jurusan.id = rmk.id_jurusan
                                    ) M
                WHERE  sar4.id_periode = periode.id AND periode.status = 1
                        AND M.rmkid = sar4.id_rmk ";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
        ]);
      
        if ($result) {
            $SarSupportAssigments = new SarSupportAssigments($this->getTipe());
            foreach($result as $row){
                $sar = new Sar4 (
                                $row['id'],
                                $row['nama_periode'],
                                $row['nama_jenjang'],
                                $row['nama_rmk'],
                                $row['sasaran'],
                                $row['capaian'],
                                $row['nama_jurusan'],
                                $row['sasaran_jurusan'],
                                $row['capaian_jurusan'],
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
        
        $sql = "UPDATE sar4 SET sasaran=:sasaran
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
        
        $sql = "UPDATE sar4 SET locked=1
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
                FROM sar4
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
        
        $sql = "UPDATE sar4 set Isaccess=1 
                WHERE id in
                    (
                    SELECT sar.id
                    FROM sar4 sar,periode
                    WHERE sar.id_periode = periode.id and periode.status = 1 and sar.id_rmk in 
                        (
                        SELECT rmk.id 
                        FROM sar3 sar,rmk 
                        WHERE sar.nip =:nip and sar.id=:idSar AND rmk.id_jurusan = sar.id_jurusan
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