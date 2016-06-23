<?php

class ETotalAccess extends CWidget {

    public function init() {
        
    }

    public function run() {
        ?>
        Đang Online  :  <script language="JavaScript">var fhs = document.createElement('script');
            var fhs_id = "5255934";
            var ref = ('' + document.referrer + '');
            var pn = window.location;
            var w_h = window.screen.width + " x " + window.screen.height;
            fhs.src = "//s1.freehostedscripts.net/ocounter.php?site=" + fhs_id + "&e1=&e2=&r=" + ref + "&wh=" + w_h + "&a=1&pn=" + pn + "";
            document.head.appendChild(fhs);
            document.write("<span id='o_" + fhs_id + "'></span>");
        </script>
        | Tổng Truy Cập :  
        <script language="JavaScript">var fhsh = document.createElement('script');
            var fhs_id_h = "3113323";
            fhsh.src = "//s1.freehostedscripts.net/ocount.php?site=" + fhs_id_h + "&name=&a=1";
            document.head.appendChild(fhsh);
            document.write("<span id='h_" + fhs_id_h + "'></span>");
        </script>
        <?php
    }

}
?>