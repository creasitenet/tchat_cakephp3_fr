<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	
	public function beforeFilter(Event $event) 
  	{
        parent::beforeFilter($event);
        $this->Auth->allow(['login','logout','getAjaxRefresh']);
		$this->users = TableRegistry::get('Users');
    }
	
    public function login()
    {
    	if(!$this->request->is('post')) {
    		$this->Flash->set("Method $_POST seulement.", ['element' => 'growl_error']);
			return $this->redirect(['controller'=>'Tchats', 'action' => 'index']);
	    }
    	if(empty($this->request->data)) {
			$this->Flash->set("Pas de donnée.", ['element' => 'growl_error']);
			return $this->redirect(['controller'=>'Tchats', 'action' => 'index', 'index']);	
		}	
    	if(!empty($this->request->data)) {
    		//$user = $this->Auth->identify();
			$query = $this->users->find('all')
			    ->where(['Users.username' => $_POST['username']])
			    ->where(['Users.email' => $_POST['email']]);
			$user = $query->first();	
			if ($user) {
				$this->users->touch($user, 'Users.last_login'); 
            	$this->users->save($user);
    			$this->Auth->setUser($user->toArray());
            	return $this->redirect($this->Auth->redirectUrl());
    			$this->Flash->set("Connecté.", ['element' => 'growl_success']);
    		} else {
		        $user = $this->users->newEntity();
				$user->username = $_POST['username'];
	            $user->password = 'nopassword';
				$user->email = $_POST['email'];
				$user->status = 1;
		        if ($this->users->save($user)) {
		        	$this->Auth->setUser($user->toArray());
		            //$this->Flash->success('Connecté.');
       				$this->Flash->set("Connecté.", ['element' => 'growl_success']);     
       				return $this->redirect(['controller'=>'Tchats', 'action' => 'index', 'index']);
		        } else {
       				$this->Flash->set("Impossible d'enregister l'utilisateur.", ['element' => 'growl_error']);
		        }
    		}
    	}
		return $this->redirect(['controller'=>'Tchats', 'action' => 'index', 'index']);
	}

	
    public function logout()
    {
    	$this->redirect($this->Auth->logout());
        $this->Flash->set("Déconnecté.", ['element' => 'growl_success']);
        return $this->redirect(['controller' => 'Tchat','action' => 'index']);
	}
	
    // Refresh // Appel Ajax
    public function getAjaxRefresh() {
    	if(!$this->request->is('ajax')) {
	        throw new BadRequestException();
	    }
	    $this->layout = 'empty'; //$this->viewBuilder()->layout('empty');
		$this->autoRender = false;	
		$users =  $this->users->find('all', [
       		'order' => ['created' => 'DESC']
        ]);  
        $this->set('users', $users);
        $this->render('/Tchats/_users');
    }	
	
}
