<?php
use yii\helpers\Url;
?>
<?php
$this->title = $article->title;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="#"><img src="<?= $article->getImage();?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$article->id])?>"><?= $article->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $article->content?>
                        </div>
                        <div class="decoration">
                            <?foreach($tags as $id => $tag):?>
                            <a href="<?= Url::toRoute(['site/tag','id'=>$id])?>" class="btn btn-default"><?=$tag;?></a>
                            <? endforeach;?>
                        </div>

                        <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">By <?= $article->author->name;?> On <?= $article->getDate();?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="https://www.facebook.com/profile.php?id=100013417203059&ref=bookmarks"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="https://twitter.com/PinkGreese"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="https://plus.google.com/109956056868817918395?hl=ru"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="https://www.linkedin.com/in/%D0%B0%D0%BB%D0%B5%D0%BA%D1%81%D0%B0%D0%BD%D0%B4%D1%80-%D0%BC%D1%83%D1%80%D0%B0%D1%82%D0%BE%D0%B2-898485151/?trk=uno-choose-ge-no-intent&dl=no"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="https://www.instagram.com/chickassasin/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <div class="row"><!--blog next previous-->
<?php if(isset($articlePrev)):?>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="<?= Url::toRoute(['site/view','id'=>$articlePrev->id])?>">
                                <img src="<?= $articlePrev->getImage();?>" alt="">

                                <div class="overlay">

                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5><?= $articlePrev->title;?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
<?php endif;?>
<?php if(isset($articleNext)):?>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="<?= Url::toRoute(['site/view','id'=>$articleNext->id])?>">
                                <img src="<?= $articleNext->getImage();?>" alt="">

                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-right fa fa-angle-right"></i></p>
                                        <h5><?= $articleNext->title;?></h5>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
<?php endif;?>
                </div><!--blog next previous end-->
                <?= $this->render('/partials/comment', [
                    'article'=>$article,
                    'comments'=>$comments,
                    'commentForm'=>$commentForm
                ])?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->
<?=$this->render('/partials/footer', [
    'random'=>$random,
])?>