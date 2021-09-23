<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmpty('email', 'An email is required')
            ->email('email')
            ->notEmpty('password', 'A password is required')
            ->allowEmptyString('role')
            ->add('role', 'inList', [
                'rule' => ['inList', ['owner', 'admin']],
                'message' => 'Please enter a valid role'
            ]);
    }

}