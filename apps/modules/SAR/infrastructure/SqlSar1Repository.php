<?php


namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Models\Sar;
use KPL\SAR\Domain\Models\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Models\Sar1;

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

    public function All($nip): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT jenjang.nama as nama_jenjang,sar1.id, sar1.id_jenjang, sar1.id_periode, sar1.capaian, sar1.sasaran, sar1.nip,sar1.locked, periode.nama as nama_periode
                FROM sar1,periode,jenjang
                WHERE sar1.nip = :nip and periode.id = sar1.id_periode and periode.status = 1";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
        
      
        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar1 (
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