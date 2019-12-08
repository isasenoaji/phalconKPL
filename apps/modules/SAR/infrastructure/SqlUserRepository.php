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

    public function byId($nip,$password)
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT nip, nama, id_fakultas, id_jurusan, jabatan, password
                FROM users 
                WHERE nip = :nip";

        $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [ 
            'nip' => $nip
        ]);

        if ($result) {
            $user = new Users(
                $result['nip'],
                $result['nama'],
                $result['id_fakultas'],
                $result['id_jurusan'],
                $result['jabatan']
            );

            if($result['password'] === $password){
                return $user;
            }
            return null;
        }

        return null;
    }

    
    
}