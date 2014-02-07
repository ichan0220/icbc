<style>
    fieldset.dashboard { text-align:center }
    fieldset.dashboard .coloum1 { width:33%; float:left; text-align:center }
    fieldset.dashboard .coloum2 { width:25%; float:left; text-align:center }
    fieldset.dashboard .coloum3 { width:20%; float:left; text-align:center }
    fieldset.dashboard .coloum4 { width:50%; float:left; text-align:center }
</style>
<fieldset class="dashboard">
    <legend><?php echo l('Dashboard ICBC') ?></legend>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('Culture') ?></legend>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/report-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Culture') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('culture/add', l('Culture Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('culture/listing', l('Culture Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/Files-Folder-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Culture Category') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('culture_category/add', l('Culture Category Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('culture_category/listing', l('Culture Category Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('Area') ?></legend>
     <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/report-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Area') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('area/add', l('Area Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('area/listing', l('Area Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/Files-Folder-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Area Category') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('area_category/add', l('Area Category Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('area_category/listing', l('Area Category Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('Maps') ?></legend>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/explore.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Explore') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('explore/add', l('Explore Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('explore/listing', l('Explore Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
     <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/Files-Folder-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Explore Category') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('explore_category/add', l('Explore Category Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('explore_category/listing', l('Explore Category Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('Activities') ?></legend>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/culture_category.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Activities') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('activities/add', l('Activities Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('activities/listing', l('Activities Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
     <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/Files-Folder-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Activities Category') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('activities_category/add', l('Activities Category Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('activities_category/listing', l('Activities Category Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('Deals') ?></legend>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/partnership.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Deals') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('deals/add', l('Deals Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('deals/listing', l('Deals Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
     <div class="coloum4" >
        <!-- <div class="icon">
            <img src="<?php echo theme_url('img/Files-Folder-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Explore Category') ?></h4>
        </div> -->
        <!-- <div class="btn-group">
            <?php echo xform_anchor('explore_category/add', l('Explore Category Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('explore_category/listing', l('Explore Category Listing'), 'class="btn btn-primary"') ?>
        </div> -->
    </div>
</fieldset>
<fieldset class="dashboard">
    <legend><?php echo l('System') ?></legend>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/user-group-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('User') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('user/add', l('User Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('user/listing', l('User Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
    <div class="coloum4" >
        <div class="icon">
            <img src="<?php echo theme_url('img/companies-icon.png') ?>" width="125" height="125" alt="" />
            <h4><?php echo l('Organization') ?></h4>
        </div>
        <div class="btn-group">
            <?php echo xform_anchor('organization/add', l('Organization Add'), 'class="btn btn-primary"') ?>
            <?php echo xform_anchor('organization/listing', l('Organization Listing'), 'class="btn btn-primary"') ?>
        </div>
    </div>
</fieldset>