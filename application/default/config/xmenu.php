<?php

/**
 * xmenu.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

$config = array();
// $config['xmenu_source'] = 'model:menu:find_admin_panel';

$config['xmenu_source'] = 'inline';

$config['xmenu_items'][0]['title'] = 'Home';
$config['xmenu_items'][0]['uri'] = '/';

// $config['xmenu_items'][1]['title'] = 'System';

// $config['xmenu_items'][1]['children'][0]['title'] = 'User';
// $config['xmenu_items'][1]['children'][0]['uri'] = 'user/listing';
// $config['xmenu_items'][1]['children'][1]['title'] = 'Role';
// $config['xmenu_items'][1]['children'][1]['uri'] = 'role/listing';
// $config['xmenu_items'][1]['children'][2]['title'] = 'Organization';
// $config['xmenu_items'][1]['children'][2]['uri']   = 'organization/listing';
// $config['xmenu_items'][1]['children'][3]['title'] = 'Task Scheduler';
// $config['xmenu_items'][1]['children'][3]['uri']   = 'task_scheduler/listing';
// $config['xmenu_items'][1]['children'][4]['title'] = 'Parameter';
// $config['xmenu_items'][1]['children'][4]['uri']   = 'sysparam/listing';
// $config['xmenu_items'][1]['children'][5]['title'] = 'Module';
// $config['xmenu_items'][1]['children'][5]['uri']   = 'module/listing';

// $config['xmenu_items'][2]['title'] = 'Manage';
// $config['xmenu_items'][2]['children'][0]['title'] = 'Country';
// $config['xmenu_items'][2]['children'][0]['uri'] = 'country/listing';
// $config['xmenu_items'][2]['children'][1]['title'] = 'Province';
// $config['xmenu_items'][2]['children'][1]['uri'] = 'province/listing';
// $config['xmenu_items'][2]['children'][2]['title'] = 'City';
// $config['xmenu_items'][2]['children'][2]['uri'] = 'city/listing';
// $config['xmenu_items'][2]['children'][3]['title'] = 'District';
// $config['xmenu_items'][2]['children'][3]['uri'] = 'district/listing';

$config['xmenu_items'][3]['title'] = 'Main Category';
$config['xmenu_items'][3]['uri'] = 'main_category/listing';

$config['xmenu_items'][4]['title'] = 'Culture';
$config['xmenu_items'][4]['children'][0]['title'] = 'Culture Category';
$config['xmenu_items'][4]['children'][0]['uri'] = 'culture_category/listing';
$config['xmenu_items'][4]['children'][1]['title'] = 'Culture List';
$config['xmenu_items'][4]['children'][1]['uri'] = 'culture/listing';

$config['xmenu_items'][5]['title'] = 'Areas';
$config['xmenu_items'][5]['children'][0]['title'] = 'Area Category';
$config['xmenu_items'][5]['children'][0]['uri'] = 'area_category/listing';
$config['xmenu_items'][5]['children'][1]['title'] = 'Area List';
$config['xmenu_items'][5]['children'][1]['uri'] = 'area/listing';

$config['xmenu_items'][6]['title'] = 'Activities';
$config['xmenu_items'][6]['children'][0]['title'] = 'Activities Category';
$config['xmenu_items'][6]['children'][0]['uri'] = 'activities_category/listing';
$config['xmenu_items'][6]['children'][1]['title'] = 'Activities List';
$config['xmenu_items'][6]['children'][1]['uri'] = 'activities/listing';

$config['xmenu_items'][7]['title'] = 'Explore';
$config['xmenu_items'][7]['children'][0]['title'] = 'Explore Category';
$config['xmenu_items'][7]['children'][0]['uri'] = 'explore_category/listing';
$config['xmenu_items'][7]['children'][1]['title'] = 'Explore Listing';
$config['xmenu_items'][7]['children'][1]['uri'] = 'explore/listing';

$config['xmenu_items'][8]['title'] = 'Deals';
$config['xmenu_items'][8]['children'][0]['title'] = 'Deals Listing';
$config['xmenu_items'][8]['children'][0]['uri'] = 'deals/listing';

$config['xmenu_items'][9]['title'] = 'Contact';
$config['xmenu_items'][9]['children'][0]['title'] = 'Contact Listing';
$config['xmenu_items'][9]['children'][0]['uri'] = 'contact/listing';
$config['xmenu_items'][9]['children'][1]['title'] = 'Add Contact';
$config['xmenu_items'][9]['children'][1]['uri'] = 'contact/add';






