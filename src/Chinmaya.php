<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Chinmaya;

use UserFrosting\Sprinkle\Chinmaya\ServicesProvider\ChinmayaServicesProvider;
use UserFrosting\System\Sprinkle\Sprinkle;
use UserFrosting\Sprinkle\SnUtilities\Controller\SnDBUtilities as SnDbUtil;

/**
 * Bootstrapper class for the 'admin' sprinkle.
 *
 * @author Alex Weissman (https://alexanderweissman.com)
 */
class Chinmaya extends Sprinkle
{
    /**
     * Register Admin services.
     */
    public function init()
    {
        $serviceProvider = new ChinmayaServicesProvider();
        $serviceProvider->register($this->ci);
SnDbUtil::getMigrationDataArray('sevak_formfields');        
    }
}
