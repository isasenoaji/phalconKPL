<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar5;

class SqlSar5Repository implements SarRepository {
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

    public function getAllSarMaster($nip): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT sar5.id,periode.nama AS nama_periode,mkkelas.nama AS nama_mk,
            	mkkelas.kelas AS nama_kelas, M.jjnama AS nama_jenjang,
                M.jsnama AS nama_jurusan,M.rmknama AS nama_rmk,
                M.sar4sasaran as sasaran_rmk,M.sar4capaian as capaian_rmk,sar5.sasaran,sar5.capaian,sar5.nip,sar5.locked
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
                                $row['sasaran'],
                                $row['capaian'],
                                $row['nama_jurusan'],
                                $row['sasaran_rmk'],
                                $row['capaian_rmk'],
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
                                $row['locked']
                );
                array_push($SarComponents,$sar);    
            }
            return $SarComponents;
        }

        return null;
    }

}