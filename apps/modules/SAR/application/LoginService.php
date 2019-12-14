<?php

namespace KPL\SAR\Application;

use KPL\SAR\Domain\Model\UserRepository;
use KPL\SAR\Domain\Model\Users;

class LoginService
{
    private $userRepository;

    public function __construct(
        UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request)
    {
        $user = $this->userRepository->byId($request->nip);
        if ($user->password() === $request->password) {
            return new LoginResponse(
                $user->nip(),
                $user->nama(),
                $user->id_jurusan(),
                $user->jabatan()
            );
        }
        return false;
    }

}