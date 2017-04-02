<?php

/**
 * Chinmaya Registration Sevak (http://www.chinmayacloud.com)
 *
 * @link      https://github.com/chinmaya.regsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 * @license   https://github.com/chinmaya.regsevak/blob/master/licenses/UserFrosting.md (MIT License)
 */

namespace UserFrosting\Sprinkle\Chinmaya\Controller;

use Carbon\Carbon;
use UserFrosting\Sprinkle\Admin\Controller\AdminController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Account\Model\Group;
use UserFrosting\Sprinkle\Account\Model\User;
use UserFrosting\Sprinkle\Account\Model\Role;
use UserFrosting\Sprinkle\Core\Model\Version;
use UserFrosting\Sprinkle\Core\Util\EnvironmentInfo;
use UserFrosting\Sprinkle\Chinmaya\Controller\DTUserReportController;
use UserFrosting\Sprinkle\SnUtilities\Controller\SnUtilities as SnUtil;

/**
 * AdminController Class
 *
 * Controller class for /admin URL.  Handles admin-related activities
 *
 * @author Alex Weissman
 * @link http://www.userfrosting.com/navigating/#structure
 */
class ChinmayaAdminController extends AdminController {

    /**
     * Renders the admin panel dashboard
     *
     */
    public function pageDashboard($request, $response, $args) {
        //** @var UserFrosting\Sprinkle\Account\Authorize\AuthorizationManager */
        $authorizer = $this->ci->authorizer;

        /** @var UserFrosting\Sprinkle\Account\Model\User $currentUser */
        $currentUser = $this->ci->currentUser;

        // Access-controlled page
        if (!$authorizer->checkAccess($currentUser, 'uri_dashboard')) {
            throw new ForbiddenException();
        }

        // Probably a better way to do this
        $users = User::orderBy('created_at', 'desc')
                ->take(8)
                ->get();

        // Transform the `create_at` date in "x days ago" type of string
        $users->transform(function ($item, $key) {
            $item->registered = Carbon::parse($item->created_at)->diffForHumans();
            return $item;
        });

        /** @var Config $config */
        $config = $this->ci->config;

        /** @var Config $config */
        $cache = $this->ci->cache;

        // Load some system info from cache. If not present in cache, we cache them
        $ufVersion = $cache->rememberForever('uf_version', function () {
            return Version::where('sprinkle', 'core')->first()->version;
        });

        $sprinkles = $cache->rememberForever('uf_sprinklesVersion', function() {
            $sprinkles = array();
            foreach ($this->ci->sprinkleManager->getSprinkles() as $sprinkle) {

                // Get sprinkle db version number
                if ($sprinkleVersion = Version::where('sprinkle', $sprinkle)->first()) {
                    $version = $sprinkleVersion->version;
                } else {
                    $version = null;
                }

                $sprinkles[] = [
                    'name' => $sprinkle,
                    'version' => $version
                ];
            }
            return $sprinkles;
        });


        $lproperties = ['htmlid' => 'cmrep_dt_3', 'dtjsvar' => 'cmrepDT3', 'role' => 'admin'];
        $reportcontroller = new DTUserReportController($this->ci);
        $reportcontroller->setupDatatable($lproperties);
//        $thisdtController->setDatatableOption('ajax_url', '/listdata/active');
//        $thisdtController->setWhereCriteria($var_filter);
        $reportcontroller->createDatatableHTMLJS();
        $cmreport = $reportcontroller->getDatatableArray();
        
        $gproperties = ['htmlid' => 'grprep_dt_3', 'dtjsvar' => 'grprepDT3', 'role' => 'admin'];
 
        $groupreportcontroller = new DTGroupReportController($this->ci);
        $groupreportcontroller->setupDatatable($gproperties);
        $groupreportcontroller->createDatatableHTMLJS();
        $grpreport = $groupreportcontroller->getDatatableArray();
        
        $rproperties = ['htmlid' => 'regsvk_dt_3', 'dtjsvar' => 'rsvkrpDT3', 'role' => 'admin'];
        $regsevakuserctl = new DTRegUserReportController($this->ci);
        $regsevakuserctl->setupDatatable($rproperties);
        $regsevakuserctl->createDatatableHTMLJS();
        $rsvkreport = $regsevakuserctl->getDatatableArray();
        
//        SnUtil::logarr($cmreport,"Line 100");
        return $this->ci->view->render($response, "pages/cm-dashboard.html.twig", [
                    'counter' => [
                        'users' => User::count(),
                        'roles' => Role::count(),
                        'groups' => Group::count(),
                    ],
                    'info' => [
                        'version' => [
                            'UF' => $ufVersion,
                            'php' => phpversion(),
                            'database' => EnvironmentInfo::database()
                        ],
                        'database' => [
                            'name' => $config['db.default.database']
                        ],
                        'environment' => $this->ci->environment,
                        'path' => [
                            'project' => \UserFrosting\ROOT_DIR
                        ]
                    ],
                    "cmreport" => $cmreport,"groupreport"=>$grpreport,"rsvkreport"=>$rsvkreport,
                    'sprinkles' => $sprinkles,
                    'users' => $users
        ]);
    }

    public function userReportData($request, $response, $args) {
        
        $reportcontroller = new DTUserReportController($this->ci);
        $var_dtoptions = $reportcontroller->getDatatablePost($request);
//SnUtil::logarr($var_dtoptions, "Line 144 sending the following to populate datatable");
//error_log("Line 144 sending the following to populate datatable");
        $var_dtoptions['htmlid'] = $var_dtoptions['id'];
        $reportcontroller->setupDatatable($var_dtoptions);

//        SnUtil::logarr($var_dtoptions, "Line 133 sending the following to populate datatable");
//        $thisdtController->setWhereCriteria($var_where);
//                    $thisdtController->setDatatableOption('ajax_url', '/listdata/new');
//                    error_log("Line 402 sending the following to populate datatable ({$var_nondbcols}, {$var_where}, {$var_filter})");
        $var_retjson = $reportcontroller->populateDatatable($request, $response, $args);
//        echo $var_retjson;
    }
    public function groupData($request, $response, $args) {
        
        $reportcontroller = new DTGroupReportController($this->ci);
        $var_dtoptions = $reportcontroller->getDatatablePost($request);
SnUtil::logarr($var_dtoptions, "Line 159 sending the following to populate datatable");
        $var_dtoptions['htmlid'] = $var_dtoptions['id'];
        $reportcontroller->setupDatatable($var_dtoptions);

//        SnUtil::logarr($var_dtoptions, "Line 133 sending the following to populate datatable");
//        $thisdtController->setWhereCriteria($var_where);
//                    $thisdtController->setDatatableOption('ajax_url', '/listdata/new');
//                    error_log("Line 402 sending the following to populate datatable ({$var_nondbcols}, {$var_where}, {$var_filter})");
        $var_retjson = $reportcontroller->populateDatatable($request, $response, $args);
//        echo $var_retjson;
    }

    public function regsevakUserData($request, $response, $args) {
        
        $reportcontroller = new DTRegUserReportController($this->ci);
        $var_dtoptions = $reportcontroller->getDatatablePost($request);
//SnUtil::logarr($var_dtoptions, "Line 128 sending the following to populate datatable");
        $var_dtoptions['htmlid'] = $var_dtoptions['id'];
        $reportcontroller->setupDatatable($var_dtoptions);

//        SnUtil::logarr($var_dtoptions, "Line 133 sending the following to populate datatable");
//        $thisdtController->setWhereCriteria($var_where);
//                    $thisdtController->setDatatableOption('ajax_url', '/listdata/new');
//                    error_log("Line 402 sending the following to populate datatable ({$var_nondbcols}, {$var_where}, {$var_filter})");
        $var_retjson = $reportcontroller->populateDatatable($request, $response, $args);
//        echo $var_retjson;
    }
}
