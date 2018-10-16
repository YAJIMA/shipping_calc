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