<div class="deals">
    <h2><?php echo $title ?></h2>
    <div class="content-deal" style="border-top: 1px solid red; padding: 10px">
        <div class="pull-left" style="width: 50%">
            <div class="disc" style="color: red; background: #ccc; margin-right: 10px; padding: 10px">
                <?php echo $deals['deals_item'] ?>
            </div>
            <div class="icons" style="float: right; margin-right: 10px;">
                <?php foreach($deals_category as $key => $value): ?>
                    <img src="<?php echo base_url('themes/icbc/img/icons/maps/'.$value.'.png') ?>">
                <?php endforeach; ?>
            </div>
            <div class="thumbnail" style="float: left; margin-top: 20px">
                <img src="<?php echo base_url('data/deals/image/original/'.$deals['deals_thumb']) ?>" width="250" height="100">
            </div>
        </div>
        <div class="pull-right" style="width: 50%;">
            <div class="deal-item">
                <div class="logo" style="float: right">
                    <img src="<?php echo base_url('data/deals/image/original/'.$deals['deals_icon']) ?>" >
                </div>
                <div style="clear: both"></div>
                <div class="address" style="text-align: right; margin: 20px 0;">
                    <?php echo $deals['address'] ?>
                </div>
            </div>
            <div class="description" style="text-align: justify">
                <p>
                    <?php echo $deals['deals_description'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
            
