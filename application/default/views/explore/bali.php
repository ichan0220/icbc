        <section class="content-home detail-slide slide-right collapsed"  id="map-inset-right">
            <div class="padder padder-right">
                <div class="legend-item">
                    <div class="detail-wrap">
                        <div class="list-culture  antiscroll-inner detail-cul">
                            <div class="collapse collapse-right">
                                <div class="legend"></div>
                                <p><?php echo l('LEGEND') ?></p>
                            </div>
                            <div class="content slider legends">
                                <div class="list-legend antiscroll-inner detail-cul">
                                    <h4><?php echo l('LEGEND') ?></h4>
                                    <div class="listing-legend">
                                        <img src="<?php echo base_url('themes/icbc/img/maps/legend-menu.png') ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="title-explore">
            <!-- TITLE -->
        </div>

        <style type="text/css">
            .title-explore{
                position: absolute;
                z-index: 2;
                width: 3%;
                left: 33px;
                margin-top: -50px;
                height: 10%;
                background: #E2E3E3;
            }
            <?php if($lang == 'en_us'): ?>
            /*.slide-right .collapse-right p{}*/
            <?php else : ?>
            .slide-right .collapse-right p{-webkit-transform: none;margin-top: -43px;}
            <?php endif ?>
        </style>

        <!-- google-maps -->
        <?php echo @$map['js']; ?>
        
        <?php echo @$map['html']; ?>
        <!-- google-maps -->

        <script type="text/javascript">
            var a = $("#map_canvas").find('div[title="Zoom in"]').length;
            setInterval(function (){
                if(a == 1){
                    $('.title-explore').css('display','none');
                    $('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('style','width: 38px; height: 16px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; margin-left: 30px');
                    $('div[title="Zoom out"]').attr('style','position: absolute; left: 51px; top: 4px; width: 18px; height: 18px; cursor: pointer;');
                    $('div[title="Zoom in"]').attr('style','position: absolute; left: 29px; top: 4px; width: 18px; height: 18px; cursor: pointer;');
                    $('div[title="Perkecil"]').attr('style','position: absolute; left: 51px; top: 4px; width: 18px; height: 18px; cursor: pointer;');
                    $('div[title="Perbesar"]').attr('style','position: absolute; left: 29px; top: 4px; width: 18px; height: 18px; cursor: pointer;');
                    $('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('src',imgPlus);
                }
                a++
            },2000);

        </script>

        <section class="content-home detail-slide slide-left" id="map-inset-left">
            <div class="padder collapsed">
                <div class="content slider">
                    <!-- <h1 class="visible-phone">MAP INSET</h1> -->
                    <div class="article">
                        <img class="sliders" src="<?php echo base_url('themes/icbc/img/bali-detail-slide.png') ?>">
                    </div>
                </div>
                <div class="collapse hidden-phone collapse-left">
                    <div class="map-inset"></div>
                    <p><?php echo l('MAP INSET') ?></p>
                </div>
            </div>
        </section>

        <div class="info-maps" style="color: red; display: none; position: absolute; text-align: center;margin: auto;width: 100%;top: 50%;font-size: 20px;font-weight: bold;">
          <p><?php echo l('Please visit the full site') ?></p>
        </div>