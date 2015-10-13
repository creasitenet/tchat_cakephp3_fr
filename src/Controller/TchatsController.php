<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Network\Exception\BadRequestException;
//use Cake\Filesystem\Folder;
//use Cake\Filesystem\File;

class TchatsController extends AppController 
{
  		
  	public function beforeFilter(Event $event) 
  	{
        parent::beforeFilter($event);
        $this->Auth->allow(['getAjaxRefresh']); //'postAjaxAdd',
		$this->tchats = TableRegistry::get('Tchats');
		$this->users = TableRegistry::get('Users');
		$this->set('user', $this->Auth->user());
    }

    public function index() 
    {			
    	$messages = $this->tchats->find('all', [
    		'order' => ['Tchats.created' => 'ASC'],
    		'contain' => ['user']
		]);	//debug($messages); die();
        $this->set('messages', $messages);
		$users =  $this->users->find('all', [
       		'order' => ['created' => 'DESC']
        ]);  
        $this->set('users', $users);
    }
	
	// Ajouter un message // Appel Ajax
	public function postAjaxAdd() 
	{
    	if(!$this->request->is('ajax')) {
	        throw new BadRequestException();
	    }
		$this->autoRender = false;	
    	if(!$this->request->is('post')) {
	        throw new BadRequestException();
	    }
        if ($this->request->is('post')) {
        	$d['result']= 0;
	            $text = $_POST['value'];
	            if ($text=='') {
	            	$d['message'] = "Votre commentaire ne peut pas être vide.";
	            } else {
	            	$u = $this->Auth->user();
					//debug($u); die();
	            	// update user last_login
	            	$user = $this->users->get($u['id']);
					$this->users->touch($user, 'Users.last_login');
					$this->users->save($user);
					// save message
            		$e = $this->tchats->newEntity(); 
					$e->user_id = $u['id'];
	                $e->text = $text;
	                if ($this->tchats->save($e)) {
						$d['result'] = 1;
						$d['message'] = "";
						// Pour le refresh
						$d['url'] = 'tchats/getAjaxRefresh';
			            $d['data'] = '';
						$d['div'] = '#tchat_messages';
	                } else {
	                    $d['message'] =  "Impossible d'ajouter le commentaire.";
	                }
	            }
	        //}
		}
		// Retour json
		$this->set('_serialize', $d);
		echo json_encode($d);
	}
	
	// Get Ajax Refresh de la liste des photos, retour html
	public function getAjaxRefresh() 
	{
    	if(!$this->request->is('ajax')) {
	        throw new BadRequestException();
	    }
		$this->autoRender = false;	
	    $this->layout = 'empty'; 
    	$messages = $this->tchats->find('all', [
    		'order' => ['Tchats.created' => 'ASC'],
    		'contain' => ['user']
		]);	//debug($messages); die();
        $this->set('messages', $messages);
        $this->render('_messages');
    }
		
	// Post Delete pour l'admin
	public function postAjaxDelete($id) 
	{
    	if(!$this->request->is('ajax')) {
	        throw new BadRequestException();
	    }
		$this->autoRender = false;	
		
    	if(!$this->request->is('post')) {
	        throw new BadRequestException();
	    }
        if ($this->request->is('post')) {
        	$d=array();
            $id = $_POST['value'];
			$e = $this->tchats->get($id);
            if ($this->tchats->delete($e)) {
                $d['result'] =  1;
                $d['message'] =  "Le message a été supprimé.";
            } else {
                $d['result'] =  0;
                $d['message'] = "Impossible de supprimer le message.";
            }
        } 
		// Retour json
		$this->set('_serialize', $d);
		echo json_encode($d);
	}
	
	
}
