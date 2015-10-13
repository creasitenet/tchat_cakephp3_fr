<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Collection\Collection;
	
/**
 * Tchat Entity.
 */
class Tchat extends Entity 
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'text' => true,
        'user' =>true,
    ];
	
	// Date de création
	public function creation_date() {
		return date('d-m-y à H:i:s', strtotime($this->created));
	}

	// Date de création
	public function short_creation_date() {
		return date('d-m-y',  strtotime($this->created));
	}
	
		
	
}
