<section>
<div class="breadcrumb">
    <a href="/">Главная</a>
    <span>/</span>
    <span class="title"><?= $title ?></span>

</div>
<h1><?= $title ?></h1>
<div class="article-wrap">
    <div class="section-inner">
        <div class="article-info">
            <div class="article-date"><span><?= (new DateTime($row['date']))->format('d.m.Y') ?></span></div>
            <h2 class="article-title"><?= $row['announce'] ?></h2>
            <div class="article-content"><?= $row['content'] ?></div>
            <a href="/" class="btn btn-back"><div class="arrow-back"></div><span>Назад к новостям<span></a>
        </div>
        <div  class="article-image" style="background-image: url(/images/<?= $row['image'] ?>); ">
        </div>
    </div>
</div>
</section>
