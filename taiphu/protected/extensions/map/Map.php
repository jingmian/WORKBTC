<?php

class Map extends CWidget {

    private $models = array();

    public function init() {
        $this->models = Yii::app()->db->createCommand('select * from `' . MPages::model()->tableName() . '` where `status` = 1 and `homepage`=1 order by `id` ')->queryRow();
    }

    public function run() {
        ?>

        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
            var myCenter = new google.maps.LatLng(10.853846, 106.628363);
            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var marker = new google.maps.Marker({
                    position: myCenter,
                    icon: {
                        url: '<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/marker.png',
                        size: new google.maps.Size(70, 86), //marker image size
                        origin: new google.maps.Point(0, 0), // marker origin
                        anchor: new google.maps.Point(35, 86) // X-axis value (35, half of marker width) and 86 is Y-axis value (height of the marker).
                    }
                });

                marker.setMap(map);
                var infowindow = new google.maps.InfoWindow();
                infowindow.setContent('some content here');
                infowindow.open(map, marker);

            }

            google.maps.event.addDomListener(window, 'load', initialize);

            var myCenter1 = new google.maps.LatLng(10.859828, 106.617953);
            function initialize1() {
                var mapProp = {
                    center: myCenter1,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap1"), mapProp);
                var marker = new google.maps.Marker({
                    position: myCenter1,
                    icon: {
                        url: '<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/marker.png',
                        size: new google.maps.Size(70, 86), //marker image size
                        origin: new google.maps.Point(0, 0), // marker origin
                        anchor: new google.maps.Point(35, 86) // X-axis value (35, half of marker width) and 86 is Y-axis value (height of the marker).
                    }
                });

                marker.setMap(map);
                var infowindow = new google.maps.InfoWindow();
                infowindow.setContent('Thông tin công ty');
                infowindow.open(map, marker);

            }

            google.maps.event.addDomListener(window, 'load', initialize1);

        </script>

        <div id="googleMap" style="width:500px;height:380px;"></div>
        <div id="googleMap1" style="width:500px;height:380px;"></div>

        <?php
        if ($this->models) {
            $link = Yii::app()->createUrl('/bai-viet/' . $this->models['slug']);
            $name = $this->models['des_' . Yii::app()->language];
            $des = $this->models['des_' . Yii::app()->language];
            $content = $this->models['content_' . Yii::app()->language];
            ?>
            <h3><?php echo $des; ?></h3>
            <p>
                <?php echo $content; ?>
            </p>
            <?php
        }
        ?>

        <?php
    }

}
?>