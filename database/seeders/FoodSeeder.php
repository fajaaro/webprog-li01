<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $this->createFood('Apel', 'https://i.ibb.co/NsPWbz2/apel.jpg', 'Buah Apel Merah USA Washington Red Delicious Fresh -/+ 1 Kg (900 gr - 1000 gr)<br><br>Memiliki ciri berkulit merah agak tebal dan memiliki rasa asam manis, apel ini memiliki banyak manfaat bagi yang mengkonsumsinya.', 35000, 150);
    }

    private function createFood($name, $imageUrl, $description, $price, $stock)
    {
        $food = new Food();
        $food->name = $name;
        $food->image_url = $imageUrl;
        $food->description = $description;
        $food->price = $price;
        $food->stock = $stock;
        $food->save();
    }
}
