<?php

declare(strict_types=1);

namespace App\Repository\swaggerAPI;

use Illuminate\Support\Facades\Http;

use App\Models\Pets;
use App\Repository\PetsRepository as PetsRepositoryInterface;

class PetsRepository implements PetsRepositoryInterface
{
    public function find(int $id)
    {
        $response  = Http::get(config('swagger.api.route') . 'pet/' . $id);

        switch ($response->status()) {
            case 200:
                $pet = json_decode($response->body());
                $error = null;
                break;
            case 400:
                $pet = null;
                $error = 'Błędny ID.';
                break;
            case 404:
                $pet = null;
                $error = 'Nie znaleziono peta.';
                break;
            default:
                $pet = null;
                $error = 'Błąd servera.';
                break;
        }

        return ['pet' => $pet, 'error' => $error];
    }

    public function find_by_status(string $status)
    {
        return null;
    }

    public function add($data)
    {
        $pet = new Pets;

        $pet->id = 0;
        $pet->category = (object) [
            'id' => $data['cat_id'],
            'name' => $data['cat_name']
        ];
        $pet->name = $data['name'];
        $pet->photoUrls = [$data['photo_url']];
        $pet->tags = [(object) [
            'id' => $data['tags_id'],
            'name' => $data['tags_name']
        ]];
        $pet->status = $data['status'];

        $response = Http::post(config('swagger.api.route') . 'pet', $pet->getAttributes());

        switch ($response->status()) {
            case 200:
                $response_body = json_decode($response->body());
                $id = $response_body->id;
                $mode = 'success';
                $text = 'Poprawnie dodano peta o numerze id = ' . $id . '.';
                break;

            case 405:
                $id = 1;
                $mode = 'error';
                $text = 'Błędne dane wejściowe.';
                break;

            default:
                $id = 1;
                $mode = 'error';
                $text = 'Błąd po stronie servera';
                break;
        }

        return ['id' => $id, 'mode' => $mode, 'text' => $text];
    }

    public function update($data, int $id)
    {
        $pet = new Pets;

        $pet->id = $data['id'];
        $pet->category = (object) [
            'id' => $data['cat_id'],
            'name' => $data['cat_name']
        ];
        $pet->name = $data['name'];
        $pet->photoUrls = [$data['photo_url']];
        $pet->tags = [(object) [
            'id' => $data['tags_id'],
            'name' => $data['tags_name']
        ]];
        $pet->status = $data['status'];

        $response = Http::put(config('swagger.api.route') . 'pet', $pet->getAttributes());

        switch ($response->status()) {
            case 200:
                $mode = 'success';
                $text = 'Poprawnie zaktualizowano peta o numerze id = ' . $id . '.';
                break;
            case 400:
                $mode = 'error';
                $text = 'Błędny ID.';
                break;
            case 404:
                $mode = 'error';
                $text = 'Nie znaleziono peta.';
                break;
            case 405:
                $mode = 'error';
                $text = 'Błąd walidacji.';
                break;
            default:
                $mode = 'error';
                $text = 'Błąd servera.';
                break;
        }
        return ['mode' => $mode, 'text' => $text];
    }

    public function delate(int $id)
    {

        $response = Http::delete(config('swagger.api.route') . 'pet/' . $id);

        switch ($response->status()) {
            case 200:
                $mode = 'success';
                $text = 'Poprawnie usunięto peta o numerze id = ' . $id . '.';
                break;
            case 400:
                $mode = 'error';
                $text = 'Błędny ID.';
                break;
            case 404:
                $mode = 'error';
                $text = 'Nie znaleziono peta.';
                break;
            default:
                $mode = 'error';
                $text = 'Błąd servera.';
                break;
        }
        return ['mode' => $mode, 'text' => $text];
    }

    public function upload_image(int $id)
    {
        return null;
    }

    public function status_types()
    {
        return ['available', 'pending', 'sold'];
    }

    public function bystatus(string $status)
    {
        $response  = Http::get(config('swagger.api.route') . 'pet/findByStatus?status=' . $status);

        if ($response->status() != 200) {
            $pets = null;
        } else {
            $pets = json_decode($response->body());
        }

        return $pets;
    }
}
