<?php

/**
 * Custom user Admin controller 
 *
 * @link      https://github.com/ssnukala/ufsprinkle-chinmaya
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

namespace UserFrosting\Sprinkle\Chinmaya\Controller;

use Carbon\Carbon;
use UserFrosting\Sprinkle\Admin\Controller\AdminController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Account\Database\Models\Group;
use UserFrosting\Sprinkle\Account\Database\Models\User;
use UserFrosting\Sprinkle\Account\Database\Models\Role;
//use UserFrosting\Sprinkle\Core\Database\Models\Version;
use UserFrosting\Sprinkle\Core\Util\EnvironmentInfo;
use UserFrosting\Sprinkle\Chinmaya\Controller\DTUserReportController;
use UserFrosting\Sprinkle\SnUtilities\Controller\SnUtilities as SnUtil;

/**
 * ChinmayaAdminController Class
 *
 * Controller class for /admin URL.  Handles admin-related activities
 * Overrides default admin sprinkle functionality to create alternative dashboard etc.
 *
 * @author Srinivas Nukala
 */
class ChinmayaAdminController extends AdminController {
  
    /**
     * Renders the admin panel dashboard
     *
     */
    public function pageDashboard($request, $response, $args) {
        //** @var UserFrosting\Sprinkle\Account\Authorize\AuthorizationManager */
        $authorizer = $this->ci->authorizer;

        /** @var UserFrosting\Sprinkle\Account\Database\Models\User $currentUser */
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

        // Get each sprinkle db version
        $sprinkles = $this->ci->sprinkleManager->getSprinkleNames();
        
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
        return $this->ci->view->render($response, 'pages/dashboard.html.twig', [
            'counter' => [
                'users' => User::count(),
                'roles' => Role::count(),
                'groups' => Group::count(),
            ],
            'info' => [
                'version' => [
                    'UF' => \UserFrosting\VERSION,
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
//SnUtil::logarr($var_dtoptions, "Line 159 sending the following to populate datatable");
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
