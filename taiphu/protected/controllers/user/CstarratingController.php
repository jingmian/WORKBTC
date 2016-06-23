<?php

class CstarratingController extends Controller {

    public $metakeywords = 'Yii CStarRating, Yii star rating, voting, read only, ajax rating, rating title';
    public $metadescription = 'Bsourcecode: Get the details yii CStarRating and change the properties for Yii CStarRating in Yii and  Yii Demo';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAjax() {
        $RATING = 0;
        if (isset($_POST['star_rating'])) {
            $RATING = $_POST['star_rating'];
        }
        echo "Your rating is " . $RATING;
    }

}
