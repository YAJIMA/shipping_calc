<?php
/**
 * Created by PhpStorm.
 * User: yajima
 * Date: 2018-10月-15
 * Time: 22:02
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

</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">設定</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('setting/price'); ?>">送料設定</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $title; ?></h1>
            <p>送料の設定を変更します。<br>
                変更する地域・ランクの送料を書き換えて、下の更新ボタンを押してください。<br>
                0円に設定すると「お問い合わせください」の表示になります。</p>
            <div>
                <?php echo form_open('setting/price', NULL, array('update'=>'update')); ?>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>都道府県</th>
                        <th>ランク</th>
                        <th>送料</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($shipping as $item) : ?>
                    <tr>
                        <td>
                            <?php echo $item['prefecture_name']; ?>
                            <input type="hidden" name="prefecture_id[]" value="<?php echo $item['prefecture_id']; ?>">
                        </td>
                        <td>
                            <?php echo $item['name']; ?>
                            <input type="hidden" name="name[]" value="<?php echo $item['name']; ?>">
                        </td>
                        <td>
                            <input type="text" name="price[]" value="<?php echo $item['price']; ?>" class="form-control text-right">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="keyword">合言葉</label>
                    <input type="text" name="keyword" id="keyword" value="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">送料を更新</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>