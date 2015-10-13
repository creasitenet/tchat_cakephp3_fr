<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'role' => true,
        'password' => false,
        'last_login' => true,
        'status' => true,
        'tchats' => true,
    ];
	
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
	
	// Gravatar
	public function gravatar() {
		$hash = md5(strtolower(trim($this->email)));
		return "http://www.gravatar.com/avatar/".$hash;
	}
	
	// Online
	public function is_online() {
        $timestamp20min = time()-1200;	// timestamp il y a 20 minutes
        if(strtotime($this->last_login) > $timestamp20min) { // L'utilisateur a été actif dans les 20 dernières minutes
        	return true;
 		} else { // L'utilisateur n'a été actif dans les 20 dernières minutes
 			return false;
        }
	}
	
	// Online img
	public function is_online_img() {
		$timestamp20min = time()-1200; 	// timestamp il y a 20 minutes
        if(strtotime($this->last_login) > $timestamp20min) {     	// L'utilisateur a été actif dans les 20 dernières minutes
        	return 'online.png';
 		} else {  	// L'utilisateur n'a été actif dans les 20 dernières minutes
 			return 'offline.png';
        }		
	}
	
	// Online img
	public function last_login_ago() {
        return $this->last_login->timeAgoInWords(['accuracy' => ['month' => 'month'], 'end' => '1 year']);	
	}
	
}
