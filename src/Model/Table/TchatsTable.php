<?php
namespace App\Model\Table;

use App\Model\Entity\Bookmark;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TchatsTable extends Table 
{
	
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tchats');
        $this->displayField('text');
        $this->primaryKey('id');
			
        $this->belongsTo('user', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'propertyName' => 'user',
        ]);	
		
        $this->addBehavior('Timestamp');

		$this->addBehavior('CounterCache', [
            'user' => ['tchat_count']
        ]);
    }
		
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
	
}
