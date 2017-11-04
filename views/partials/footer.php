<?php
use yii\helpers\Url;
?>
<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="/public/images/logo2.png" alt=""></div>
                    <div class="about-content">Этот блог был написан за 5 дней на yii2, до этого я не представлял, что такое yii2, единственное его назначение-потешить мою бренную душу.
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">Контакты</h4>

                        <p> Актюбинск, Казахстан</p>

                        <p> Phone: +79619067004</p>

                        <p>zzz-korp.3dn.ru</p>
                    </div>
                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Отзывы</h3>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--Indicator-->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>На десяточку сайтец</p>
                                    </div>
                                    <div class="author-id">
                                        <img width="150" class="img-circle" src="https://pp.userapi.com/c638322/v638322530/1a4ab/9mINvUqxHRk.jpg" alt="">

                                        <div class="author-text">
                                            <h4>Тарас</h4>

                                            <h4>Успешный петербуржец</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Топчик</p>
                                    </div>
                                    <div class="author-id">
                                        <img width="150" class="img-circle" src="https://pp.userapi.com/c626719/v626719240/226e2/q0A9RfnVCKw.jpg" alt="">

                                        <div class="author-text">
                                            <h4>Юлер</h4>

                                            <h4>Живёт в Оренбурге, от того страдает</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Будет время, скажу</p>
                                    </div>
                                    <div class="author-id">
                                        <img width="150" class="img-circle" src="https://pp.userapi.com/c841333/v841333274/2e1ce/g-8xU8gxIns.jpg" alt="">

                                        <div class="author-text">
                                            <h4>Святослав</h4>

                                            <h4>Занят</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Рандомный пост</h3>


                    <div class="custom-post">
                        <div>
                            <a href="<?= Url::toRoute(['site/view', 'id'=>$random->id])?>"><img width="300" src="<?=$random->getImage()?>" alt=""></a>
                        </div>
                        <div>
                            <a href="<??>" class="text-uppercase"><?=$random->title?></a>
                            <span class="p-date"><?=$random->getDate()?></span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2017 <a href="https://vk.com/necris20">MurBlog PRO, </a> Built with <i
                            class="fa fa-heart"></i> by <a href="https://vk.com/necris20">Alex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>