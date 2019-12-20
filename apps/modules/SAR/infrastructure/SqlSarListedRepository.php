<?php 

namespace KPL\SAR\Infrastructure;

use Phalcon\DiInterface;
    
use KPL\SAR\Domain\Model\SarListedTipe;
use KPL\SAR\Domain\Model\SarListedRepository;

class SqlSarListedRepository implements SarListedRepository
{
    protected $di;
    public function __construct(DiInterface $di) 
    {
        $this->di = $di;
    }

    public function getList($nip)
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT tipe_sar
                FROM list_sar
                WHERE list_sar.id_user=:nip";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
                'nip' => $nip
            ]);
        $list = [];

        if ($result) {

            foreach($result as $row){
                array_push($list,(int)$row['tipe_sar']);
                }

            $SarListed = new SarListedTipe($list);
            return $SarListed;
        }
        else
        return null;
    }

    
    
}