<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; 
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Article[] $articles
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'articles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
	protected function _setPassword($value)
	{
		if (strlen($value)) {
			$hasher = new DefaultPasswordHasher();
			return $hasher->hash($value);
		}
	}
    protected $_hidden = [
        'password'
    ];
}
