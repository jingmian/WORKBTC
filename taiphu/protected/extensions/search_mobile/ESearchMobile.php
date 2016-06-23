<?php

class ESearchMobile extends CWidget {

    private $menuTop = array();
    private $item;

    public function init() {
        $this->item = new MenuItem();
    }

    public function run() {
        ?>
        <form  id="FormSearch" name="FormSearch" action="" method="post" class="formSearch">
            <input name="batdaunhapthongsotimkiem" type="hidden" value="1" />
            <input  name="product_search_name" id="product_search_name"  placeholder="Tìm kiếm..." value="Tìm kiếm..." onFocus="if (this.value == 'Tìm kiếm...') {
                        this.value = '';
                    }" onBlur="if (this.value == '') {
                                this.value = 'Tìm kiếm...';
                            }" type="text" /><a onclick="CheckSearch()" style="cursor:pointer" class="fa fa-search"></a>
        </form>
        <script language="javascript">
            function CheckSearch() {
                with (document.FormSearch) {
                    if ((product_search_name.value == "") || (product_search_name.value == "Tìm kiếm...")) {
                        alert("Bạn phải nhập thông tin tìm kiếm vào.");
                        product_search_name.focus();
                        return false;
                    }
                }
                document.FormSearch.submit();
                return true;
            }
        </script>
        <?php
    }

}
?>