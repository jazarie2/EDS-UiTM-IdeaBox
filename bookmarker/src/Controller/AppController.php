<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Controller\Controller;
class AppController extends Controller
{
public function initialize()
{
$this->loadComponent('Flash');
$this->loadComponent('Auth', [
'authorize' => 'Controller',
'authenticate' => [
'Form' => [
'fields' => [
'username' => 'email',
'password' => 'password'
]
]
],
'loginAction' => [
'controller' => 'Users',
'action' => 'login'
],
'unauthorizedRedirect' => $this->referer() // If unauthorized, returnthem to page they were just on
]);
// Allow the display action so our pages controller
// continues to work.
$this->Auth->allow(['display']);
}
public function isAuthorized($user)
{
return false;
}

}

