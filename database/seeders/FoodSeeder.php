<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $this->createFood('Apel', 'https://i.ibb.co/NsPWbz2/apel.jpg', 'Buah Apel Merah USA Washington Red Delicious Fresh -/+ 1 Kg (900 gr - 1000 gr)<br><br>Memiliki ciri berkulit merah agak tebal dan memiliki rasa asam manis, apel ini memiliki banyak manfaat bagi yang mengkonsumsinya.', 35000, 150);
        $this->createFood('Pisang', 'https://ibb.co/crGFZsb', 'Buah Pisang Amazon  Fresh -/+ 1 Kg (940 gr - 1060 gr)<br><br>Pisang ini identik dengan warna kuning segar dan kulit manis. Pisang kaya akan kalium dan pektin, yang merupakan serat baik bagi tubuh', 50000, 100);
        $this->createFood('Jeruk', 'https://ibb.co/9Y4Ch0C', 'Buah Jeruk Sunkist -/+ 1 Kg (960 gr - 1000 gr)<br><br>Jeruk sunkist merupakan jeruk dengan ukuran yang lebih besar dari jeruk mandarin. Kulitnya memiliki karakteristik warna jingga cerah, lebih tebal, dan keras.', 20000, 200);
        $this->createFood('Anggur', 'https://ibb.co/k6rzYPy', 'Buah Anggur Red Globe -/+ 1 Kg (900 gr - 1100 gr)<br><br>Anggur red globe adalah varietas anggur merah berbiji dengan ukuran yang besar, umum dipakai juga sebagai anggur meja.', 15000, 400);
        $this->createFood('Mangga', 'https://ibb.co/bdw69Hq', 'Mangga Arum Manis -/+ 1 Kg (900 gr - 1100 gr)<br><br>Mangga arum manis adalah salah satu varietas lokal yang mempunyai sifat khas dengan warna kulit merah jingga, daging buah kuning menarik serta memiliki rasa dan aroma yang khas sesuai dengan namanya yakni arum manis yang berarti memiliki aroma yang harum dan rasanya yang manis.', 45000, 200);
        $this->createFood('Pear', 'https://ibb.co/6Zgh2tp', 'Pear Madu -/+ 1 Kg (950 gr - 1000 gr)<br><br>Sweet pear/ pir madu adalah salah satu jenis pir yang mempunyai rasa paling manis di antara pir yang lainya, pir ini mempunyai tekstur buah yang berpasir, banyak air, manis dengan kulit buah yang kasar dan sedikit aga tebal.', 17500, 210);
        $this->createFood('Semangka', 'https://ibb.co/Zhyrb7Z', 'Buah Semangka Kuning -/+ 2 Kg (1900 gr - 2000 gr)<br><br>Buah semangka kuning ini memiliki rasa lebih manis, seperti madu dibandingkan dengan semangka berdaging merah, dengan manfaat yang sama. Buah semangka kuning sekarang banyak tersedia dan merupakan alternatif dari semangka tradisional yang berwarna merah.', 80000, 150);
        $this->createFood('Melon', 'https://ibb.co/3khvPsT', 'Buah Melon Golden -/+ 2 Kg (1900 gr - 2100 gr)<br><br>Golden melon berbentuk bulat lonjong dengan alur dangkal, dan memiliki kulit halus berwarna kuning. Daging buah melon golden pada umumnya tebal, berwarna putih kekuningan, manis, dan mengandung banyak air.', 65000, 150);
        $this->createFood('Blueberry', 'https://ibb.co/ZcN7nWH', 'Buah Blueberry -/+ 1 Box (200 gr - 210 gr)<br><br>Blueberry berwarna biru, dan bentuknya bulat dengan ukuran yang kecil. Rasanya manis dan ada juga yang asam', 45000, 80);
        $this->createFood('Pepaya', 'https://ibb.co/W30LG6W', 'Buah Pepaya California -/+ 1 Kg (900 gr - 1200 gr)<br><br>berkulit hijau tebal dan mulus, berbentuk lonjong, buah matang berwarna kuning, rasanya manis, daging buah kenyal dan tebal.', 30000, 150);

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
