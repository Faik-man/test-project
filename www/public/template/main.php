<?= $banner ?>
<section>
<h1>Новости</h1>
<div class="section-inner">
    <? foreach ($rows as $row) { ?>
        <a href="/news?id=<?= $row['id'] ?>">
            <div class="article">
                <div class="article-date"><span><?= (new DateTime($row['date']))->format('d.m.Y') ?></span></div>
                <h2 class="article-title"><?= $row['title'] ?></h2>
                <div class="article-announce"><?= $row['announce'] ?></div>
                <button class="btn">
                    <span>Подробнее</span>
                    <div class="arrow"></div>
                </button>
            </div>
        </a>
    <? } ?>
</div>
<div class="pagination">
    <? foreach ($pagination as $page) { ?>
        <a href="?page=<?= $page ?>" class="page-btn<? if ($page == $currentPage): ?> current<? endif; ?>"><span><?= $page ?></span></a>
    <? } ?>
    <? if (!$lastPage) { ?>
        <a href="?page=<?= $currentPage + 1 ?>" class="page-btn-next"><div class="arrow-next"></div></a>
    <? } ?>
</div>
</section>

