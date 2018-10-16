<?php
/**
 * Created by PhpStorm.
 * User: yajima
 * Date: 2018-10月-12
 * Time: 11:43
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>?v=<?php echo time(); ?>">
</head>
<body>

<div class="container">
    <!-- 検索フォーム -->
    <div class="row">
        <div class="col-md-12">
            <h1>配送料金検索　<small>中古農機具専門店ライブ</small></h1>
            <p>※検索ボタンを押すと検索結果が下部に表示されます<br>
                ※商品ランクは説明文の「商品の配送について」に記載しています</p>
            <?php echo form_open('', array('class'=>'form-inline')); ?>
            <div id="prefectures_form" class="form-group mb-2">
                <label for="prefecture_id" class="sr-only">お届け先（都道府県）</label>
                <select name="prefecture_id" id="prefecture_id" class="form-control mr-3">
                    <?php foreach ($prefectures as $pref) : ?>
                        <option value="<?php echo $pref['id']; ?>" <?php echo $pref['selected']; ?>><?php echo $pref['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="submit_form" class="form-group mb-2">
                <button type="submit" class="btn btn-primary" >検索</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- /検索フォーム -->
    <!-- 検索結果を表示 -->
    <div class="row">
        <div class="col-md-12 table-responsive-sm">
            <h1><?php echo $prefecture_name . "の送料"; ?></h1>
            <div class="result_table">
                <div class="row">
                    <div class="col-md-9 rank d-none d-md-block">ランク</div>
                    <div class="col-md-3 price d-none d-md-block">送料</div>
                </div>
                <?php foreach ($shipping as $item) : ?>
                    <div class="row">
                        <div class="col-md-9 rank">
                            <?php if ($item['name'] == "A") : ?>A：管理機・小型耕耘機、除雪機 など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "B") : ?>B：大型耕運機、ロータリー、ハロー（2mまで）、籾摺機(3インチまで)　など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "C") : ?>C：籾コンテナ（軽トラ積載）、ハロー（2m以上）、米貯蔵庫　など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "D") : ?>D：田植機4条・5条、コンバイン2条、トラクター18馬力以下、トレーラー(シングル) など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "E") : ?>E：田植機6条、コンバイン3条、トラクター19馬力から29馬力以下 など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "F") : ?>F：田植機8条、コンバイン4条、トラクター30馬力から40馬力以下 など同等サイズ<?php endif; ?>
                            <?php if ($item['name'] == "G") : ?>G：積載車1台分の積載面積　又は　重量2t以上の重機 など同等サイズ<?php endif; ?>
                        </div>
                        <div class="col-md-3 price text-right">
                            <?php if ($item['price'] == "0") : ?>
                                お問い合わせください
                            <?php else : ?>
                                <?php echo number_format($item['price']) . "円"; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- /検索結果を表示 -->
    <!-- 配送についてテキスト -->
    <div class="row">
        <div class="col-md-12">
            <h1>配送について</h1>
            <p>フェリー・港への持込みは可能ですが、フェリーの手配はお客様でお願いします。<br>
                港までの配送料金は、持ち込みする港のある都道府県の料金になります。<br>
                基本的に商品は梱包等は致しません。(業者さんが傷がつかないようには配慮致します)<br>
                ご指定の場所に荷下ろし可能です。<br>
                納期の目安は1週間~4週間くらいになります。</p>
            <p>※遠方、冬季、業者さんの配送状況により納期が異なります。</p>
            <p>商品代金+配送代金の入金確認が取れ次第の正式な配送手配となり、詳しい納期は入金後に確定する形になります。<br>
                お急ぎの方や、予め納期の目安を知りたい方は 直接、混載便業者さんへお問い合わせくださいませ。</p>
            <p>(株)加藤商事　担当：ヨダ まで<br>
                TEL：<a href="tel:08063452588">080-6345-2588</a> MAIL：<a href="mailto:nom65@ezweb.ne.jp">nom65@ezweb.ne.jp</a></p>

        </div>
    </div>
    <!-- /配送についてテキスト -->
</div>

<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>