<?php
/**
 * RegSevak User Report Datatable controller 
 *
 * @link      https://github.com/ssnukala/ufsprinkle-chinmaya
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

namespace UserFrosting\Sprinkle\Chinmaya\Controller;

use Carbon\Carbon;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Core\Util\EnvironmentInfo;
use UserFrosting\Sprinkle\SnDatatables\Controller\SnDatatablesFFController;
use UserFrosting\Sprinkle\SnUtilities\Controller\SnUtilities as SnUtil;


class DTRegUserReportController extends SnDatatablesFFController {

    public function setupDatatable($properties = []) {
        $properties['source'] = 'crsvk_cmreg_member';
        $properties['source_type'] = 'db';
        $properties['sortable'] = true;
        $properties['show_detail'] = 'Y';
        $properties['ajax_detail'] = 'N';
        $properties['dbtable'] = "crsvk_cmreg_member";
        $this->_data_route = 'chinmaya';
        $this->_process_route = 'chinmaya';
//SnUtil::logarr($properties,"Line 27 User Report");
        parent::setupDatatable($properties);
        $this->_datatable['options']["ajax_url"] = "/chinmaya/reguserreport";
        $this->_datatable['options']["process_url"] = "/chinmaya";
        $this->_datatable['options']['_dt_rowid'] = " concat('cmrep_',id) ";
//SnUtil::logarr($this->_datatable['options'],"Line 32 the html id is ".$this->_htmlid);        
    }

    public function getColumnDefinitions() {
        $cur_ff_table = parent::getColumnDefinitions();
        return $cur_ff_table;
        // will be used by the child classes to set the formatters for various columns
    }

    public function setFormatters() {
        parent::setFormatters();

//        error_log("Line 90 checking user role");
        $this->_formatters['first_name'] = function( $d, $row ) {

            $var_contactdetails = $this->ci->view->fetch('components/datatable/contact-info.html.twig', ['row' => $row]);
            
            return $var_contactdetails;
        };

    }

    public function getDataFromSource($getparam, $par_nondbcols = 'none', $par_where = '', $par_filter = '', $par_order = '') {
        $par_where = $this->_where_criteria;
        $par_order = $this->_order_by;
        error_log("Line 96 the where criteria is $par_where, order by is $par_order");
        parent::getDataFromSource($getparam, $par_nondbcols, $par_where, $par_filter, $par_order);
    }

}
