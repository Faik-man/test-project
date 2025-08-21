<?php

declare(strict_types=1);

namespace App\Model;

final class Database
{
    private $db;

    function __construct() {
        $mysqli = new \mysqli('db', 'bitrix', 'password', 'bitrix');
        $mysqli->set_charset('utf8mb4');
        $this->db = $mysqli;

    }

    public function getNews(): array {
        $result = $this->db->query("SELECT * FROM `news` ORDER BY date DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDetailNews(int $id): array {
        $result = $this->db->query("SELECT * FROM `news` WHERE id = {$id}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
