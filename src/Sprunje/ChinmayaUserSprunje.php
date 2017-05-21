<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Chinmaya\Sprunje;

use Illuminate\Database\Capsule\Manager as Capsule;
use UserFrosting\Sprinkle\Core\Facades\Debug;
use UserFrosting\Sprinkle\Core\Sprunje\Sprunje;

/**
 * UserSprunje
 *
 * Implements Sprunje for the users API.
 *
 * @author Alex Weissman (https://alexanderweissman.com)
 */
class ChinmayaUserSprunje extends Sprunje
{
    protected $name = 'users';

    protected $sortable = [
        'name',
        'last_activity',
        'flag_enabled'
    ];

    protected $filterable = [
        '_any'
    ];

    /**
     * {@inheritDoc}
     */
    protected function baseQuery()
    {
        $query = $this->classMapper->createInstance('user');

        // Join user's most recent activity
        return $query->joinLastActivity()->with('lastActivity');
    }

    /**
     * {@inheritDoc}
     */
    protected function applyTransformations($collection)
    {
        // Exclude password field from results
        $collection->transform(function ($item, $key) {
            unset($item['password']);
            return $item;
        });

        return $collection;
    }

    /**
     * Filter LIKE the first name, last name, or email.
     *
     * @param Builder $query
     * @param mixed $value
     * @return Builder
     */
    protected function filter_any($query, $value)
    {
        // Split value on separator for OR queries
        $values = explode($this->orSeparator, $value);
        return $query->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query = $query->orLike('first_name', $value)
                                ->orLike('last_name', $value)
                                ->orLike('email', $value);
            }
            return $query;
        });
    }
}