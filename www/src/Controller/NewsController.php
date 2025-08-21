<?php

declare(strict_types=1);

namespace App\Controller;

class NewsController extends BaseController {

    public function index() {
        $id = intval(isset($_GET['id']) ? $_GET['id'] : 0);

        $rows = $this->model->getDetailNews($id);
        if (empty($rows)) {
            http_response_code(404);
            exit;
        }

        $row = $rows[0];

        $data = [
            'title' => $row['title'],
            'row' => $row,
            'rows' => $rows
        ];

        $this->view->render($data);
    }
}
