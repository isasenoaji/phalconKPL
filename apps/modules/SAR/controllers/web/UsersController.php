<?php  

namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use KPL\SAR\Domain\Model\Users;
use KPL\SAR\Application\LoginRequest;
use KPL\SAR\Application\LoginService;

class UsersController extends Controller {  

   public function indexAction() {  
      if ($this->session->has("auth")) {
         return $this->dispatcher->forward(array( 
         'controller' => 'sar', 'action' => 'index' 
          )); 
      }
      $this->view->pick('SAR/login');
   }  

   public function loginAction() { 
      $nip = $this->request->getPost("nip");
      $password = $this->request->getPost("password");

      if ($this->session->has("auth")) {
         return $this->dispatcher->forward(array( 
         'controller' => 'sar', 'action' => 'index' 
          )); 
      } 
      if ($this->request->isPost()) { 
         $request = new LoginRequest($nip, $password);

         $userRepository = $this->di->getShared('sql_users_repository');

         $service = new LoginService($userRepository);

         $response = $service->execute($request);

         if ($response === false) { 
            $this->flashSession->error("Incorrect credentials"); 
            return $this->dispatcher->forward(array( 
               'controller' => 'users', 'action' => 'index' 
            )); 
         } 
         $this->session->set('auth', array(
            'nip' => $response->nip,
            'nama' => $response->nama,
            'id_fakultas' => $response->id_fakultas,
            'id_jurusan' => $response->id_jurusan,
         )); 
      } 
      // $this->view->pick('SAR/warek/kelola sar/index');
      return $this->dispatcher->forward(array( 
         'controller' => 'sar', 'action' => 'index' 
      )); 
      
   }  
   public function logoutAction() { 
      $this->session->remove('auth'); 
      $this->flashSession->success("You've been successfully logged out"); 
      $this->view->pick('SAR/login');
      // return $this->dispatcher->forward(array( 
      //    'controller' => 'users', 'action' => 'index' 
      // )); 
   } 
}