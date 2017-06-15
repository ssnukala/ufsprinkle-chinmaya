<?php

/**
 * SN DB Forms (http://www.srinivasnukala.com)
 *
 * @link      https://github.com/ssnukala/ufsprinkle-autoforms/
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

namespace UserFrosting\Sprinkle\Chinmaya\Database\Migrations\v400;

use UserFrosting\System\Bakery\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use UserFrosting\Sprinkle\AutoForms\Database\Models\Formfields;

/**
 * Formfields table migration
 * Version 4.0.0
 *
 * See https://laravel.com/docs/5.4/migrations#tables
 * @extends Migration
 * @author Alex Weissman (https://alexanderweissman.com)
 */
class FormfieldsTable extends Migration {

    /**
     * {@inheritDoc}
     */
    public function up() {
        if (!$this->schema->hasTable('sevak_formfields')) {
            $this->schema->create('sevak_formfields', function(Blueprint $table) {

                $table->increments('id');
                $table->string('form_prefix', 10);
                $table->string('source', 100);
                $table->integer('seq')->default('0');
                $table->string('db_field', 200);
                $table->char('visible', 1)->default('Y');
                $table->char('orderable', 1)->default('N');
                $table->char('searchable', 1)->default('N');
                $table->decimal('edit_group', 5, 2)->default('0.00');
                $table->char('showin_editform', 1)->default('Y');
                $table->string('label', 200)->nullable();
                $table->string('type', 200);
                $table->integer('size1')->nullable();
                $table->integer('size2')->nullable();
                $table->string('lookup_category', 200)->nullable();
                $table->char('value_type', 1)->nullable();
                $table->char('primary_key', 1)->default('N');
                $table->string('message', 255)->nullable();
                $table->string('validation_json', 1000)->nullable();
                $table->string('default', 255)->nullable();
                $table->char('search_function', 50)->nullable();
                $table->char('status', 1)->default('A');
                $table->string('updated_by', 20)->nullable();
                $table->string('created_by', 20)->nullable();
                $table->timestamps();
                $table->engine = 'InnoDB';
                $table->collation = 'utf8_unicode_ci';
                $table->charset = 'utf8';
            });
        } 
            /*
             * 
             */
            $formfields = [
                        43 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.10", "showin_editform" => "Y", "label" => "Id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "Y", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        44 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "ip_address", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.20", "showin_editform" => "Y", "label" => "Ip address", "type" => "text", "size1" => "45", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        45 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "user_id", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.30", "showin_editform" => "Y", "label" => "User id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        46 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "type", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.40", "showin_editform" => "Y", "label" => "Type", "type" => "text", "size1" => "255", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        47 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "occurred_at", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.50", "showin_editform" => "Y", "label" => "Occurred at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        48 => new Formfields(["form_prefix" => "sact_", "source" => "activities", "seq" => "0", "db_field" => "description", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.60", "showin_editform" => "Y", "label" => "Description", "type" => "text", "size1" => "65535", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        49 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.10", "showin_editform" => "Y", "label" => "Id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        50 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "ip_address", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.20", "showin_editform" => "Y", "label" => "Ip address", "type" => "text", "size1" => "45", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        51 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "user_name", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.70", "showin_editform" => "Y", "label" => "User name", "type" => "text", "size1" => "50", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        52 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "user_id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.30", "showin_editform" => "Y", "label" => "User id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        53 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "type", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.40", "showin_editform" => "Y", "label" => "Type", "type" => "text", "size1" => "255", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        54 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "occurred_at", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.50", "showin_editform" => "Y", "label" => "Occurred at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        55 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "description", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.60", "showin_editform" => "Y", "label" => "Description", "type" => "text", "size1" => "65535", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        56 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "email", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.80", "showin_editform" => "Y", "label" => "Email", "type" => "text", "size1" => "254", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        57 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "first_name", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "4.90", "showin_editform" => "Y", "label" => "First name", "type" => "text", "size1" => "20", "size2" => "20", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        58 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "last_name", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "5.00", "showin_editform" => "Y", "label" => "Last name", "type" => "text", "size1" => "30", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        59 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "locale", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "5.10", "showin_editform" => "Y", "label" => "Locale", "type" => "text", "size1" => "10", "size2" => "10", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        60 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "theme", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.20", "showin_editform" => "Y", "label" => "Theme", "type" => "text", "size1" => "100", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        61 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "group_id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.30", "showin_editform" => "Y", "label" => "Group id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        62 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "flag_verified", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.40", "showin_editform" => "Y", "label" => "Flag verified", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        63 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "flag_enabled", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "7.50", "showin_editform" => "Y", "label" => "Flag enabled", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        64 => new Formfields(["form_prefix" => "uact_", "source" => "adm_useractivities", "seq" => "0", "db_field" => "created_at", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "7.60", "showin_editform" => "N", "label" => "Created at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        105 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "id", "visible" => "N", "orderable" => "N", "searchable" => "Y", "edit_group" => "1.10", "showin_editform" => "Y", "label" => "Id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "Y", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        106 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "slug", "visible" => "N", "orderable" => "N", "searchable" => "Y", "edit_group" => "1.20", "showin_editform" => "Y", "label" => "Slug", "type" => "text", "size1" => "255", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        107 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "name", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.30", "showin_editform" => "Y", "label" => "Name", "type" => "text", "size1" => "255", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        108 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "description", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.40", "showin_editform" => "Y", "label" => "Description", "type" => "text", "size1" => "65535", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        109 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "icon", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.50", "showin_editform" => "Y", "label" => "Icon", "type" => "text", "size1" => "100", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        110 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "created_at", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.60", "showin_editform" => "N", "label" => "Created at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        111 => new Formfields(["form_prefix" => "sgrp_", "source" => "groups", "seq" => "0", "db_field" => "updated_at", "visible" => "N", "orderable" => "N", "searchable" => "Y", "edit_group" => "3.70", "showin_editform" => "N", "label" => "Updated at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        112 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.10", "showin_editform" => "Y", "label" => "Id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "Y", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        113 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "user_name", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "1.20", "showin_editform" => "Y", "label" => "User name", "type" => "text", "size1" => "50", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        114 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "email", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.30", "showin_editform" => "Y", "label" => "Email", "type" => "text", "size1" => "254", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        115 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "first_name", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.40", "showin_editform" => "Y", "label" => "First Name", "type" => "text", "size1" => "20", "size2" => "20", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        116 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "last_name", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "2.50", "showin_editform" => "Y", "label" => "Last Name", "type" => "text", "size1" => "30", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        117 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "locale", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.60", "showin_editform" => "Y", "label" => "Locale", "type" => "text", "size1" => "10", "size2" => "10", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        118 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "theme", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.70", "showin_editform" => "Y", "label" => "Theme", "type" => "text", "size1" => "100", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        119 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "group_id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "3.80", "showin_editform" => "Y", "label" => "Group id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        120 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "flag_verified", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "4.90", "showin_editform" => "Y", "label" => "Flag verified", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        121 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "flag_enabled", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "5.00", "showin_editform" => "Y", "label" => "Enabled", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        122 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "last_activity_id", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "5.10", "showin_editform" => "Y", "label" => "Last activity id", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        123 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "password", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.20", "showin_editform" => "Y", "label" => "Password", "type" => "text", "size1" => "255", "size2" => "25", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        124 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "deleted_at", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.30", "showin_editform" => "Y", "label" => "Deleted at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        125 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "created_at", "visible" => "Y", "orderable" => "Y", "searchable" => "Y", "edit_group" => "6.40", "showin_editform" => "N", "label" => "Created at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"]),
                        126 => new Formfields(["form_prefix" => "uusr_", "source" => "users", "seq" => "0", "db_field" => "updated_at", "visible" => "N", "orderable" => "Y", "searchable" => "Y", "edit_group" => "7.50", "showin_editform" => "N", "label" => "Updated at", "type" => "text", "size1" => "0", "size2" => "0", "lookup_category" => "", "value_type" => "", "primary_key" => "", "message" => "", "validation_json" => "", "default" => "", "search_function" => "", "status" => "A", "updated_by" => "snukala", "created_by" => "snukala"])
            ];
            foreach ($formfields as $id => $ffield) {
                $ffield->save();
            }
    }

    /**
     * {@inheritDoc}
     */
    public function down() {
        $this->schema->drop('sevak_formfields');
    }

}