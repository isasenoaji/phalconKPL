<?php
namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Model\Sar2;

class SqlSar2Repository implements SarRepository {
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

            $sql = "SELECT jenjang.nama as nama_jenjang, sar.id, sar.id_fakultas,
                          sar.id_jenjang, sar.id_periode, sar.capaian, 
            sar.sasaran, sar.nip, sar.locked, periode.nama as nama_periode, fakultas.nama as fakultas
            FROM sar2 sar,periode,jenjang, fakultas 
            WHERE sar.nip =:nip and periode.id = sar.id_periode 
            and periode.status = 1 AND jenjang.id = sar.id_jenjang AND fakultas.id = sar.id_fakultas";
                 

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
                                $row['fakultas'],
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

    public function getAllSarSupport($Param): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar.id,sar.id_fakultas,
                sar.id_jenjang, sar.id_periode, sar.capaian, 
                sar.sasaran, sar.nip,sar.locked, periode.nama as nama_periode
                FROM sar2 sar,periode,jenjang
                WHERE periode.id = sar.id_periode and periode.status = 1 AND jenjang.id = sar.id_jenjang AND
                sar.id_fakultas = (
                                    SELECT fakultas.id 
                                    FROM jurusan,fakultas 
                                    WHERE jurusan.id_fakultas = fakultas.id AND jurusan.id =:id_jurusan
                                    )
               ";

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

}