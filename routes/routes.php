<?php
/**
 * Chinmaya Registration Sevak (http://www.chinmayacloud.com)
 *
 * @link      https://github.com/chinmaya.regsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

$app->group('/chinmaya', function () {
    $this->get('/dashboard','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaAdminController:pageDashboard');
    $this->post('/userreport','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaAdminController:userReportData');
    $this->post('/groupreport','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaAdminController:groupData');
    $this->post('/reguserreport','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaAdminController:regsevakUserData');
});

$app->group('/venues', function () {
    $this->get('/dashboard','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaVenueController:pageDashboard');
    $this->post('/venuelong','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaVenueController:venueLongData');
    $this->post('/venueshort','UserFrosting\Sprinkle\Chinmaya\Controller\ChinmayaVenueController:venueShortData');
});