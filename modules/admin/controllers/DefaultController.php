<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Article;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $allviews = Article::getAllCount();
        return $this->render('index', [
            'allviews'=>$allviews
        ]);
    }
}
