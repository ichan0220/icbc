<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="utf-8">
        <title><?php echo $CI->_page_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="<?php echo $CI->_page_description; ?>">
        <meta name="keyword" content="<?php echo $CI->_page_keyword; ?>">

        <!-- Le google le webfonts -->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|PT+Sans+Narrow|Nobile:400,700' rel='stylesheet' type='text/css'>

        <!-- Le styles -->
        <link href="<?php echo base_url() ?>themes/icbc/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/plugins.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/web.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/docs.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/apps.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>themes/icbc/css/fonts/stylesheet.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro:300,200' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

        <script src="<?php echo base_url() ?>themes/icbc/js/jquery-1.9.1.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>themes/icbc/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>themes/icbc/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>themes/icbc/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>themes/icbc/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url() ?>themes/icbc/ico/favicon.ico">
        <script type="text/javascript">
            window.imgPlus = '<?php echo base_url('themes/icbc/img') . '/zoom.png' ?>';
        </script>
        <style type="text/css">
        <?php if($lang == 'en_us') :?>
            section.main-nav nav li a {font-weight: bold;}
        <?php else : ?>
            section.main-nav nav li a {font-weight: normal;}
        <?php endif ?>
        </style>


        <script src="<?php echo base_url() ?>themes/icbc/js/jquery-1.9.1.js"></script>
    </head>


    <body class="home">

        <?php
            $style = 'style="background: #bd3116;"';
            $best_of = '<div class="line-hor"></div>
                <p class="mandatory">THE BEST OF
                    <a href="#" class="bali">bali</a>
                </p>
                <div class="line-hor"></div><p class="chinese">最美巴厘</p>';
            $cls = 'best-of';
         ?>



        <header <?php if($this->uri->rsegments[1] == 'web' && $this->uri->rsegments[2]=='index') { echo '';}else{echo $style;} ?>>
            <div class="container-fluid <?php if($this->uri->rsegments[1] == 'web' && $this->uri->rsegments[2]=='index') {echo '';}else{echo $cls;} ?>">
                <div class="header-mandatory">
                    <h1 class="pull-left"><a href="<?php echo base_url() ?>">ICBC</a></h1>
                    <?php if($this->uri->rsegments[1] == 'web' && $this->uri->rsegments[2]=='index') {echo '';}else{echo $best_of;} ?>
                    <nav class="pull-right">
                        <ul class="flat">
                            <li class="lang now en"><a class="en" href="<?php echo site_url('web/set_lang/en_us') ?>">English</a></li>
                            <li class="lang">
                                <a class="ch" href="<?php echo site_url('web/set_lang/zh_cn') ?>">
                                    <div class="lang-chn"></div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <section class="main-nav">
            <div class="container-fluid">
                <?php echo $label; ?>
                <?php if($lang == 'en_us') :?>
                <a href="<?php echo site_url('web/set_lang/zh_cn') ?>">
                    <div class="lang-menu"></div>
                </a>
                <?php else : ?>
                <a href="<?php echo site_url('web/set_lang/en_us') ?>">
                    <div class="lang-menu-en"></div>
                </a>
                <?php endif ?>
                <div class="show-menu hidden-tablet hidden-desktop"><i class="icon-menu"></i></div>
            </div>
            <form action="" method="POST" class="top-search">
                <input class="input" type="text" value="" placeholder="<?php echo l('SEARCH')?>..." />
                <input class="submit" type="submit" value="" />
            </form>
            <?php $url = $this->uri->rsegments[2];?>
            <div class="container-fluid content-nav">
                <div class="middle">
                    <nav>
                        <ul class="menu nav flat" >
                            <li class="has-children dropdown" style="<?php echo @$border; ?>">
                                <a href="<?php echo site_url('web/culture') ?>" style="<?php echo @$color; echo @$devider ?>" <?php if($url == 'culture'){ echo 'class="active"';} ?>> <?php echo l('culture') ?> </a>
                                <ul class="menu dropdown-menu navigation" style="font-size: 12px;">
                                    <li><a href="<?php echo site_url() . '/web/culture/' ?>"><?php echo l('ALL') ?> </a></li>
                                    <?php foreach ($main_cat[$main_cat['culture']['id']] as $r): ?>
                                    <?php if($lang == 'en_us'): ?>
                                        <li><a href="<?php echo site_url() . '/web/culture/' . rawurlencode($r['name']) ?>"><?php echo $r['name'] ?></a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo site_url() . '/web/culture/' . rawurlencode($r['name']) ?>"><?php echo $r['name_cn'] ?></a></li>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="has-children dropdown" style="<?php echo @$border; ?>">
                                <a href="<?php echo site_url() . '/web/areas/' ?>" style="<?php echo @$color; echo @$devider?>" <?php if($url == 'areas'){ echo 'class="active"';} ?>><?php echo l('areas') ?></a>
                                <ul class="menu dropdown-menu navigation" style="font-size: 12px;">
                                    <!-- <li><a href="<?php echo site_url() . '/web/areas/' ?>" >ALL</a></li> -->
                                    <?php foreach ($main_cat[$main_cat['areas']['id']] as $r): ?>
                                    <?php if($lang == 'en_us'): ?>
                                        <li><a href="<?php echo site_url() . '/web/areas/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name'] ?></a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo site_url() . '/web/areas/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name_cn'] ?></a></li>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="has-children dropdown" style="<?php echo @$border; ?>">
                                <a href="<?php echo site_url() . '/web/explore/' ?>" style="<?php echo @$color; echo @$devider ?>" <?php if($url == 'explore'){ echo 'class="active"';} ?>><?php echo l('maps') ?></a>
                                <ul class="menu dropdown-menu navigation" style="font-size: 12px;">
                                    <li><a href="<?php echo site_url() . '/web/explore/' ?>" ><?php echo l('BALI') ?> </a></li>
                                    <?php foreach ($main_cat[$main_cat['maps']['id']] as $r): ?>
                                    <?php if($lang == 'en_us'): ?>
                                        <li><a href="<?php echo site_url() . '/explore/bali/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name'] ?></a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo site_url() . '/explore/bali/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name_cn'] ?></a></li>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="has-children dropdown" style="<?php echo @$border; ?>">
                                <a href="<?php echo site_url() . '/web/activities/' ?>" style="<?php echo @$color; echo @$devider ?>" <?php if($url == 'activities'){ echo 'class="active"';} ?>><?php echo l('activities') ?></a>
                                <ul class="menu dropdown-menu navigation" style="font-size: 12px;">
                                    <!-- <li><a href="<?php echo site_url() . '/web/areas/' ?>" >ALL</a></li> -->
                                    <?php foreach ($main_cat[$main_cat['activities']['id']] as $r): ?>
                                    <?php if($lang == 'en_us'): ?>
                                        <li><a href="<?php echo site_url() . '/web/activities/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name'] ?></a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo site_url() . '/web/activities/' . rawurlencode(strtolower($r['name'])) ?>" ><?php echo $r['name_cn'] ?></a></li>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="has-children dropdown">
                                <a href="<?php echo site_url() . '/web/deals/' ?>" style="<?php echo @$color; echo @$devider?>" <?php if($url == 'deals'){ echo 'class="active"';} ?>><?php echo l('deals') ?></a>
                                <ul class="menu dropdown-menu navigation lastest" style="font-size: 12px;">
                                    <!-- <li><a href="<?php echo site_url() . '/web/areas/' ?>" >ALL</a></li> -->
                                    <?php foreach ($main_cat[$main_cat['deals']['id']] as $r): ?>
                                    <?php if($lang == 'en_us'): ?>
                                        <li><a href="<?php echo site_url() . '/web/deals/' . strtolower($r['name']) ?>" ><?php echo $r['name'] ?></a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo site_url() . '/web/deals/' . strtolower($r['name']) ?>" ><?php echo $r['name_cn'] ?></a></li>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <!-- <li><a href="#" style="<?php echo @$color ?>">contact</a></li> -->
                        </ul>
                    </nav>
                <?php echo $CI->load->view($CI->_view, $CI->_data, true) ?>
                </div>
            </div>

            <!--content here-->
        </section>
        <section class="content-home">
            <div class="padder">
                <div class="collapse hidden-phone">
                    <div></div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <!-- <form action="" method="POST">
                            <input class="input" type="text" value="" />
                            <input class="submit" type="submit" value="SEARCH >" />
                        </form> -->
                    </div>
                    <div class="span6">
                        <nav>
                            <ul class="flat pull-right">
                                <li><a href="<?php echo base_url() ?>"><?php echo l('HOME') ?></a></li>
                                <li><a id="contact" href="#data-contact"><?php echo l('CONTACT') ?></a></li>
                                <li><a id="disclaimer" href="#data"><?php echo l('DISCLAIMERS') ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Disclaimer -->
        <div style="display: none;">
            <div id="data" class="disclaimer">
                <h2><?php echo l('disclaimer') ?></h2>
                <p style="text-align: justify">
                    The information contained in this website is for general information purposes only. The publisher has endeavoured to ensure the correctness of the information published here, however, the publisher makes no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information is strictly at the reader's own risk.
                </p>
                <!--
            <?php if($lang == 'en_us') :?>
                <p>• Payment must be made on ICBC</p>
                <p>• Credit Card.</p>
                <p>• Offers cannot be exchanged for cash and in conjunction with other offers, promotions, privileges, and vouchers.</p>
                <p>• Offers are valid for direct bookings only.</p>
                <p>• Dining offers are valid for dine-in only and limited per visit/card/charge/table.</p>
                <p>• Unless otherwise stated, advance reservations are required for offers under lodging and travel categories.</p>
                <p>• Rooms and seats are subject to availability.</p>
                <p>• Lodging offers are subject to high season surcharge and/or blackout dates.</p>
                <p>• USD rates are valid for foreign visitors and IDR rates are valid for Indonesian citizens/KIMS holders.</p>
                <p>• Unless otherwise stated, most offers are valid until 31 March 2013. </p>
                <p>• Other Terms and Conditions may apply.</p>
                <p>• PT. Bank ICBC Indonesia and the business establishments reserve the right to change the Terms and Conditions at any time without prior notice.</p>
            <?php else : ?>
                <p>• 必须使用中国工商银行信用卡结算付款。</p>
                <p>• 优惠不能用于兑换现金,不能与其他优惠、促销活动、特权和优惠券组合使用。</p>
                <p>• 所有优惠仅对消费者本人直接预定有效。</p>
                <p>• 餐饮优惠只适用于堂食,并且受单卡/每次/每桌最低消费限制。</p>
                <p>• 除特注说明外,住宿和旅游类优惠需提前预订。</p>
                <p>• 酒店的客房和餐位视情况而定。</p>
                <p>• 住宿类优惠需增加旺季附加费及(或)受节假日限制。</p>
                <p>• 外国游客可使用美元支付,印尼公民、短期居留证及劳务居留签证持有者可通过印尼盾支付 。</p>
                <p>• 除特注说明外,大部分优惠有效期至2013年3月31日。</p>
                <p>• 某些优惠可能有其他条件限制。</p>
                <p>• 中国工商银行(印尼)有限公司和特惠商户保留随时修改该条款的权利,恕不另行通知。</p>
                <?php endif ?>
                -->
            </div>
        </div>

        <!-- Contact -->
        <div style="display: none;">
            <div id="data-contact" class="contact">
                <h2><?php echo l('contact') ?></h2>
                <ul class="flat" style="width: 2000%;">
                    <?php
                    if($lang == 'en_us'){
                        foreach ($contact as $key => $value) {
                            echo '<li style="display: table;"><div style="width: 200px">' . $value['contact'] . '</div></li>';
                        }
                    }else{
                        foreach ($contact as $key => $value) {
                            echo '<li><div style="width: 200px">' . $value['contact_cn'] . '</div></li>';
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>

        

        <script type="text/javascript">
            $(document).ready(function() {
            

                /* Using custom settings */

                $("a#disclaimer, a#contact").fancybox({
                    'hideOnContentClick': true,
                    maxWidth    : 800,
                    maxHeight   : 600,
                    fitToView   : false,
                    width       : '45%',
                    height      : '45%',
                    autoSize    : false,
                });

            });
        </script>

        <style type="text/css">
            a.active{color: #BD3116!important;}
        </style>
        <script src="<?php echo base_url() ?>themes/icbc/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>themes/icbc/js/jquery.fancybox.pack.js"></script>
        <script src="<?php echo base_url() ?>themes/icbc/js/plugins.js"></script>
        <script src="<?php echo base_url() ?>themes/icbc/js/web.js"></script>
        <script type="text/javascript">
            window.imgPlus = '<?php echo base_url('themes/icbc/img') . '/zoom.png' ?>';
        </script>
    </body>
</html>
