<?php 

namespace KPL\SAR\Infrastructure;

use Phalcon\DiInterface;

use KPL\SAR\Domain\Model\UserRepository;
use KPL\SAR\Domain\Model\Users;

class SqlUserRepository implements UserRepository
{
    protected $di;

    public function __construct(DiInterface $di) 
    {
        $this->di = $di;
    }

    public function byId($nip)
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT nip, nama, id_jurusan, password
                FROM users 
                WHERE nip = :nip";

        $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip
        ]);

        if ($result) {
            $user = new Users(
                $result['nip'],
                $result['nama'],
                $result['id_jurusan'],
                $result['password']
            );
            $sql = "SELECT u.id_jabatan, u.id_user, j.nama as nama_jabatan
                FROM users_jabatan as u, jabatan as j
                WHERE u.id_user = :nip and j.id = u.id_jabatan";

            $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [ 
                'nip' => $nip
            ]);
            
            foreach($result as $row) {
                $user->addJabatan($row['nama_jabatan']);
            }

            return $user;
        }

        return null;
    }

    
    
}