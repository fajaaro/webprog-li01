<?php

use Illuminate\Support\Facades\Storage;
use App\Models\Game;

function formatRupiah($price) {
    return "Rp" . number_format($price, 2, ',', '.');
}

function uploadFile($file, $folder) {
    $fileExtension = $file->guessExtension();
    $fileName =  time() . '.' . $fileExtension;
    $filePath = Storage::putFileAs($folder, $file, $fileName);

    return $filePath;
}

function getFoodImageUrl($imageUrl) {
    return str_starts_with($imageUrl, 'https') ? $imageUrl : Storage::url($imageUrl);
}

function errorMessage($errors, $fieldName) {
    return '<span class="invalid-feedback" role="alert"><strong>' . $errors->first($fieldName) . '</strong></span>';
}

function setNewCookie($name, $data) {
    setcookie($name, $data);
}

function unsetCookie($name) {
    if (isset($_COOKIE['carts'])) {
        unset($_COOKIE['carts']);
        setcookie($name, "", time() - 3600, '/');
    }
}

function getCarts() {
    return isset($_COOKIE['carts']) ? json_decode($_COOKIE['carts']) : [];
}

function getFoodsInCarts() {
    $games = [];

    if (isset($_COOKIE['carts'])) {
        $data = getCarts();

        foreach ($data as $foodId) {
            $game = Food::find($foodId);

            if ($game) array_push($games, $game);
        }
    }

    return $games;
}
