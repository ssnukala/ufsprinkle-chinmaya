<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */

/**
 * Routes for administrative user management.
 */
$app->group('/admin/users', function () {
    $this->get('', 'UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaUserController:pageList')
        ->setName('uri_users');
})->add('authGuard');

$app->group('/api/users', function () {
    $this->get('', 'UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaUserController:getList');
})->add('authGuard');
