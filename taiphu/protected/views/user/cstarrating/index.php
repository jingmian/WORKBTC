<h1 class="page-title">CStarRating</h1>
<h2>Star Rating</h2>
<?php
$this->widget('CStarRating', array('name' => 'rating'));
?>
<br /><br />
<hr />
<br />
<h2>Star Rating: Properties</h2>
Default Value   :4<br />
Minimum Rating  :1<br />
Maximum Rating  :10<br />
Star Count      :10<br />
<br />   
<?php
$this->widget('CStarRating', array(
    'name' => 'rating_1',
    'value' => '4',
    'minRating' => 1,
    'maxRating' => 10,
    'starCount' => 10,
));
?>
<br /><br />
<hr />
<br />
<h2>Star Rating: Read Only</h2>
<?php
$this->widget('CStarRating', array(
    'name' => 'rating_2',
    'value' => '3',
    'readOnly' => true,
));
?>
<br /><br />
<hr />
<br />
<h2>Star Rating: Ajax</h2>
<?php
$this->widget('CStarRating', array(
    'name' => 'star_rating_ajax',
    'callback' => '
        function(){
                $.ajax({
                    type: "POST",
                    url: "' . Yii::app()->createUrl('cstarrating/ajax') . '",
                    data: "star_rating=" + $(this).val(),
                    success: function(data){
                                $("#mystar_voting").html(data);
                        }})}'
));
echo "<br/>";
echo "<div id='mystar_voting'></div>";
?>
<br /><br />
<hr />
<br />
<h2>CStarRating: Titles</h2>
<?php
$this->widget('CStarRating', array(
    'name' => 'rating_4',
    'value' => '3',
    'minRating' => 1,
    'maxRating' => 5,
    'titles' => array(
        '1' => 'Normal',
        '2' => 'Average',
        '3' => 'OK',
        '4' => 'Good',
        '5' => 'Excellent'
    ),
));
?>