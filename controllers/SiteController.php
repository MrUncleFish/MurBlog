<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Article::getAll(2);
        $random = Article::getRandomArticle();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        Article::addMetaTagsIndex();

        return $this->render('index', [
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'random'=>$random,
        ]);
    }


    public function actionView($id)
    {
        $article = Article::findOne($id);
        $articleNext = Article::findNext($id);
        $articlePrev = Article::findPrev($id);
        $random = Article::getRandomArticle();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $tags = ArrayHelper::map($article->tags, 'id', 'title');
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        Article::addMetaTagsView($id);

        $article->viewedCounter();


        return $this->render('single', [
            'article'=>$article,
            'articleNext'=>$articleNext,
            'articlePrev'=>$articlePrev,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
            'random'=>$random
        ]);
    }


    public function actionCategory($id, $pageSize = 5)
    {

        $data = Category::getArticlesByCategory($id);
        $random = Article::getRandomArticle();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        Article::addMetaTagsCategory($id);


        return $this->render('category', [
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'random'=>$random
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['site/view', 'id'=>$id]);
            }
        }
    }
}
