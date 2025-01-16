<?php

declare(strict_types=1);

namespace App\Repository;

interface PetsRepository
{
    public function find(int $id);
    public function find_by_status(string $status);
    public function add($data);
    public function update($data, int $id);
    public function delate(int $id);
    public function upload_image(int $id);
    public function status_types();
    public function bystatus(string $status);
}
