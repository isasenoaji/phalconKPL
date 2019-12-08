<?php  

namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use KPL\SAR\Domain\Model\Users;

class UsersController extends Controller {  

   public function indexAction() {  
      $this->view->pick('SAR/login');
   }  

   public function loginAction() { 

      if ($this->session->has("auth")) {
         $this->flashSession->error("You've been logged! "); 
         return $this->dispatcher->forward(array( 
         'controller' => 'sar', 'action' => 'index' 
          )); 
      } 
      if ($this->request->isPost()) { 
         $user = Users::findFirst(array( 
            'nip = :nip: and password = :password:', 'bind' => array( 
               'nip' => $this->request->getPost("nip"), 
               'password' => $this->request->getPost("password") 
            ) 
         ));  
         if ($user === false) { 
            $this->flashSession->error("Incorrect credentials"); 
            return $this->dispatcher->forward(array( 
               'controller' => 'users', 'action' => 'index' 
            )); 
         } 
         $this->session->set('auth', array(
            'nip' => $users->nip,
            'nama' => $users->nama,
            'id_fakultas' => $users->id_fakultas,
            'id_jurusan' => $users->id_jurusan,
         )); 
         $this->flashSession->success("You've been successfully logged in"); 
      } 
      return $this->dispatcher->forward(array( 
         'controller' => 'sar', 'action' => 'index' 
      )); 
      
   }  
   public function logoutAction() { 
      $this->session->remove('auth'); 
      $this->flashSession->success("You've been successfully logged out"); 
      return $this->dispatcher->forward(array( 
         'controller' => 'users', 'action' => 'index' 
      )); 
   } 
}