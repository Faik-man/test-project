<?php

declare(strict_types=1);

namespace App\Controller;

final class MainController extends BaseController {

    const NEWS_PER_PAGE = 4;

    private static function initializePagination(int $count): array {
        $result = [];
        for ($i = 1; $i <= $count; $i++) {
            $result[] = $i;
        }

        return $result;
    }

    private static function getPage(array $news, int $page): array {
        return array_slice($news, self::NEWS_PER_PAGE * ($page - 1), self::NEWS_PER_PAGE);
    }

    public function index() {
        $rows = $this->model->getNews();

        $bannerNews = array_reduce($rows, function($carry, $item) {
            return ($carry === null || $item['id'] > $carry['id']) ? $item : $carry;
        });

        $page = intval(isset($_GET['page']) ? $_GET['page'] : 1);

        $pages = intval(count($rows) / self::NEWS_PER_PAGE) + intval(count($rows) % self::NEWS_PER_PAGE > 0);
        $pagination = self::initializePagination($pages);

        $lastPage = $pages === $page;

        $rows = self::getPage($rows, $page);
        if (empty($rows)) {
            http_response_code(404);
            exit;
        }

        $bannerLayout = $this->view->getBannerLayout(['bannerNews' => $bannerNews]);

        $data = [
            'banner' => $bannerLayout,
            'currentPage' => $page,
            'rows' => $rows,
            'lastPage' => $lastPage,
            'bannerNews' => $bannerNews,
            'pagination' => $pagination
        ];

        $this->view->render($data);
    }
}
