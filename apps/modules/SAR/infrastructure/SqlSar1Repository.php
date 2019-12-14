<?php


namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Models\Sar;
use KPL\SAR\Domain\Models\SarRepository;
use Phalcon\DiInterface;
use KPL\SAR\Domain\Models\Sar1;

class SqlSar1Repository implements SarRepository {
    protected $di;

    public function __construct(DiInterface $di) {
        $this->di = $di;
    }

    public function save(Sar $sar) {
        // TODO: Implement save() method.
    }

    public function All($nip): ?array {
        $db = $this->di->getShared('db');

        $sql = "SELECT sar1.id, sar1.id_jenjang, sar1.id_periode, sar1.capaian, sar1.sasaran, sar1.nip,sar1.locked
                FROM sar1,periode
                WHERE sar1.nip = :nip and periode.id = sar1.id_periode and periode.status = 1";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip,
        ]);
        
      
        if ($result) {
            $SarComponents = [];
            foreach($result as $row){
                $sar = new Sar1 (
                                $row['id'],
                                $row['id_jenjang'],
                                $row['id_periode'],
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
}