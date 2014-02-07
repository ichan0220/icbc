<style type="text/css">
    /*div.items {width: 150px}*/
    /*ul.cat li {display: inline; right: 0; list-style: none;text-indent: 99999px;height: 10px;width: 10px;}*/
    .desc p{line-height: 12px}

</style>
<div class="container container-fluid deals">
    <div class="row-fluid">
        <div class="pull-left span2">
            <div class="row row-fluid">
                <div class="deal-left">
                    <h6><?php echo l(@$cat) ?></h6>
                    <h6 class="red-deals"><span style="font-weight: bold"><?php echo l('red') ?></span> * <?php echo l('deals') ?></h6>
                    <ul class="category">
                        <li class="hotel">
                            <p><?php echo l('hotel') ?></p>
                        </li>
                        <li class="restaurant">
                            <p><?php echo l('Restaurant/Cafe') ?></p>
                        </li>
                        <li class="shop">
                            <p><?php echo l('Shop') ?></p>
                        </li>
                        <li class="golf">
                            <p><?php echo l('Golf') ?></p>
                        </li>
                        <li class="others">
                            <p><?php echo l('Others') ?></p>
                        </li>
                    </ul>
                    <div class="sort">
                        <div class="accordion-group area-deals deals-sort">
                              <div class="accordion-heading">
                                <a class="accordion-toggle area-deal-item" data-toggle="collapse" data-parent="#accordion2" href="#sort-deals">
                                  &nbsp; <?php echo l('SORT BY') ?> :
                                </a>
                              </div>
                              <div id="sort-deals" class="accordion-body collapse">
                                <div class="accordion-inner deals-col">
                                    <a class="sub-area-deal-item" href="<?php echo site_url('web/deals') ?>">
                                      <p><?php echo l('(ALL)') ?></p>
                                    </a>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('deals/cat/hotels') ?>">
                                      <p><?php echo l('HOTELS') ?>/<?php echo l('VILLAS') ?></p>
                                    </a>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('deals/cat/restaurant') ?>">
                                        <p><?php echo l('RESTAURANT') ?>/<?php echo l('CAFES') ?></p>
                                    </a>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('deals/cat/shops') ?>">
                                        <p><?php echo l('SHOPS') ?></p>
                                    </a>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('deals/cat/golf') ?>">
                                        <p><?php echo l('GOLF CLUBS') ?></p>
                                    </a>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('deals/cat/others') ?>">
                                        <p><?php echo l('OTHERS') ?></p>
                                    </a>
                                </div>
                              </div>
                        </div>
                        <label><?php echo l('GO TO ANOTHER AREA') ?> :</label>
                        <div class="accordion-group area-deals">
                              <div class="accordion-heading">
                                <a class="accordion-toggle area-deal-item" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                  &nbsp; <?php echo l('PLEASE SELECT') ?>
                                </a>
                              </div>
                              <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner deals-col">
                                <?php if($lang == 'en_us') :?>
                                  <?php foreach ($deals_cat as $key => $value) :?>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('web/deals/'. rawurlencode(strtolower($value['name']))) ?>">
                                      <p><?php echo $value['name'] ?></p>
                                    </a>
                                  <?php endforeach; ?>
                                  <?php else : ?>
                                  <?php foreach ($deals_cat as $key => $value) :?>
                                    <a class="sub-area-deal-item" href="<?php echo site_url('web/deals/'. rawurlencode(strtolower($value['name']))) ?>">
                                      <p><?php echo $value['name_cn'] ?></p>
                                    </a>
                                  <?php endforeach; ?>
                                  <?php endif ?>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="term">
                        <P><?php echo l('READ THE') ?> <a href="#ModalTac" data-toggle="modal"><span style="font-weight: bold"><?php echo l('TERMS AND CONDITIONS') ?></span></a></P>
                    </div>
                    <div id="ModalTac" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel" style="color: #BD3116"><?php echo l('TERMS AND CONDITIONS') ?></h3>
                      </div>
                      <div class="modal-body" style="color: #444">
                        <?php if($lang == 'en_us') :?>
                            <p>• Payment must be made on ICBC</p>
                            <p>• Offers cannot be exchanged for cash and in conjunction with other offers, promotions, privileges, and vouchers.</p>
                            <p>• Offers are valid for direct bookings only.</p>
                            <p>• Dining offers are valid for dine-in only and limited per visit/card/charge/table.</p>
                            <p>• Unless otherwise stated, advance reservations are required for offers under lodging, golf and travel categories. </p>
                            <p>• Rooms, seats and complimentary privileges are subject to availability.</p>
                            <p>• Lodging offers are subject to high season surcharge and/or blackout dates.</p>
                            <p>• USD rates are valid for foreign visitors and IDR rates are valid for Indonesian citizens/ KIMS/ KITAS holders.</p>
                            <p>• Other terms and conditions may apply.</p>
                            <p>•  PT Bank ICBC Indonesia and the business establishments reserve the right to change the terms and conditions at any time without prior notice.</p>
                        <?php else : ?>
                            <p>• 必须使用工商银行信用卡结算付款。</p>
                            <p>• 优惠不能用于兑换现金，不能与其他优惠、促销活动、特权和优惠券组合使用。</p>
                            <p>• 所有优惠仅对直接预定有效。</p>
                            <p>• 餐饮优惠只适用于堂食, 并且受单卡/每次/每桌最低消费限制。</p>
                            <p>• 除特注说明外，住宿，高尔夫 和旅游类优惠需提前预订。</p>
                            <p>• 酒店的客房,餐位和免费的特权视情况而定。</p>
                            <p>• 住宿类优惠需增加旺季附加费及（或）受节假日限制。</p>
                            <p>• 某些优惠可能有其他条件限制。</p>
                            <p>• 中国工商银行印度尼西亚有限公司和特约商户保留随时修改该条款的权利，恕不另行通知。</p>
                            <p>• 所有优惠仅对消费者本人直接预定有效。 </p>
                        <?php endif ?>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-right span10 content-deals">
            <div class="row row-fluid">
            <?php if($lang == 'en_us') :?>
                <?php foreach ($deals as $key => $value) :?>
                <div class="span2 items">
                    <h3><?php echo $value['deals_name'] ?></h3>
                    <p class="name"><?php echo $value['deals_place'] ?></p>
                    <div class="deals-item">
                        <div class='disc'>
                            <h2 <?php if($lang != 'en_us'): ?>style="font-family: 'Advent Pro', sans-serif!important;"<?php endif ?>><?php echo $value['deals_item'] ?></h2>
                            <p><?php echo $value['deals_comment'] ?></p>
                        </div>
                        <ul class="cat">
                            <?php
                                 $cat = explode(",", $value['deals_category']);
                            ?>
                            <?php foreach ($cat as $val) : ?>
                                <li class="<?php echo $val ?>"><?php echo $val ?></li>
                            <?php endforeach ?>
                        </ul>
                        <div class="thumb">
                            <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/deals/image/thumb') ?>/<?php echo $value['deals_thumb'] ?>&w=150&h=100&q=100">
                        </div>
                        <div class="address">
                            <?php echo $value['address'] ?>
                        </div>
                    </div>
                    <div class="more">
                        <a class="btn-modal" href="#myModal<?php echo $key?>" role="button" data-toggle="modal">+</a>
                            <div id="myModal<?php echo $key?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="opacity: 1; margin: -15px -10px 0 0"><img src="<?php echo base_url('themes/icbc/img/close-modal.png') ?> "></button>
                                <div class="items_deals">
                                     <h3><?php echo $value['deals_name'] ?></h3>
                                    <p class="name"><?php echo $value['deals_place'] ?></p>
                                    <div class="deals-item" style="position:relative; height: 300px">
                                        <div class="pull-left names">
                                            <div class='disc'>
                                                <h2><?php echo $value['deals_item'] ?></h2>
                                                <p><?php echo $value['deals_comment'] ?></p>
                                            </div>
                                            <ul class="cat">
                                                <?php
                                                     $cat = explode(",", $value['deals_category']);
                                                ?>
                                                <?php foreach ($cat as $val) : ?>
                                                    <li class="<?php echo $val ?>"><?php echo $val ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                            <div class="address address-modal">
                                                <?php echo $value['address'] ?>
                                            </div>
                                        </div>
                                        <div class="pull-right descri">
                                            <div class="deals_desc">
                                                <div class="modal-body">
                                                    <?php echo $value['deals_description'] ?>
                                                </div>
                                            </div>
                                            <div class="thumb-modal">
                                                <div class="maps-deals">
                                                    <iframe width="235" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?sll=37.0625,-95.677068&amp;sspn=65.42695189579618,85.2596154566908&amp;t=m&amp;q=bali,+indonesia&amp;dg=opt&amp;ie=UTF8&amp;hq=&amp;hnear=Bali,+Indonesia&amp;z=9&amp;ll=<?php if(!empty($value['map_position'])){ echo $value['map_position']; } else { echo '-8.409518,115.188916'; } ?>&amp;output=embed"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="more"></div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="clear"></div>
                <?php endforeach ?>

            <!--for chinese content-->
            <?php else : ?>
                <?php foreach ($deals as $key => $value) :?>
                <div class="span2 items">
                    <h3><?php echo $value['deals_name_cn'] ?></h3>
                    <p class="name"><?php echo $value['deals_place_cn'] ?></p>
                    <div class="deals-item">
                        <div class='disc'>
                            <h2><?php echo $value['deals_item_cn'] ?></h2>
                            <p><?php echo $value['deals_comment_cn'] ?></p>
                        </div>
                        <ul class="cat">
                            <?php
                                 $cat = explode(",", $value['deals_category']);
                            ?>
                            <?php foreach ($cat as $val) : ?>
                                <li class="<?php echo $val ?>"><?php echo $val ?></li>
                            <?php endforeach ?>
                        </ul>
                        <div class="thumb">
                            <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/deals/image/thumb') ?>/<?php echo $value['deals_thumb'] ?>&w=200&h=100&q=100">
                        </div>
                        <div class="address">
                            <?php echo $value['address_cn'] ?>
                        </div>
                    </div>
                    <div class="more">
                        <a class="btn-modal" href="#myModal<?php echo $key?>" role="button" data-toggle="modal">+</a>
                            <div id="myModal<?php echo $key?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="opacity: 1; margin: -15px -10px 0 0"><img src="<?php echo base_url('themes/icbc/img/close-modal.png') ?> "></button>
                                <div class="items_deals">
                                     <h3><?php echo $value['deals_name_cn'] ?></h3>
                                    <p class="name"><?php echo $value['deals_place_cn'] ?></p>
                                    <div class="deals-item" style="position:relative; height: 300px">
                                        <div class="pull-left names">
                                            <div class='disc'>
                                                <h2><?php echo $value['deals_item_cn'] ?></h2>
                                                <p><?php echo $value['deals_comment_cn'] ?></p>
                                            </div>
                                            <ul class="cat">
                                                <?php
                                                     $cat = explode(",", $value['deals_category']);
                                                ?>
                                                <?php foreach ($cat as $val) : ?>
                                                    <li class="<?php echo $val ?>"><?php echo $val ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                            <div class="address address-modal">
                                                <?php echo $value['address_cn'] ?>
                                            </div>
                                        </div>
                                        <div class="pull-right descri">
                                            <div class="deals_desc">
                                                <div class="modal-body">
                                                    <?php echo $value['deals_description_cn'] ?>
                                                </div>
                                            </div>
                                            <div class="thumb-modal">
                                                <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/deals/image/thumb') ?>/<?php echo $value['deals_thumb'] ?>&w=200&h=100&q=100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="more"></div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="clear"></div>
                <?php endforeach ?>
            <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="background background-mobile" data-small-src="<?php echo base_url() ?>themes/icbc/img/bg_white_large.png" data-large-src="<?php echo base_url() ?>themes/icbc/img/bg_white_large.png" /></div>
