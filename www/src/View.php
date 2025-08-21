<?php

declare(strict_types=1);

namespace App;

final class View {
    private $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function render(array $data = []): void {
        extract($data);

        require $_SERVER['DOCUMENT_ROOT'] . '/template/blocks/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/template/' . $this->name . '.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/template/blocks/footer.php';
    }
}
