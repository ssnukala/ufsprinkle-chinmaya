<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Chinmaya\ServicesProvider;

use UserFrosting\Sprinkle\Core\Facades\Debug;

/**
 * Registers services for the admin sprinkle.
 *
 * @author Alex Weissman (https://alexanderweissman.com)
 */
class ChinmayaServicesProvider
{
    /**
     * Register UserFrosting's admin services.
     *
     * @param Container $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register($container)
    {
        /**
         * Extend the 'classMapper' service to register sprunje classes.
         *
         * Mappings added: 'activity_sprunje', 'group_sprunje', 'permission_sprunje', 'role_sprunje', 'user_sprunje'
         */
        $container->extend('classMapper', function ($classMapper, $c) {
            $classMapper->setClassMapping('chinmaya_user_sprunje', 'UserFrosting\Sprinkle\Chinmaya\Sprunje\ChinmayaUserSprunje');
            return $classMapper;
        });

    }
}
