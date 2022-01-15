<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $this->createFood('Apel', 'https://i.ibb.co/NsPWbz2/apel.jpg', 'Buah Apel Merah USA Washington Red Delicious Fresh -/+ 1 Kg (900 gr - 1000 gr) Memiliki ciri berkulit merah agak tebal dan memiliki rasa asam manis, apel ini memiliki banyak manfaat bagi yang mengkonsumsinya.', 35000, 150);
        $this->createFood('Pisang', 'https://i.ibb.co/fxhpyT8/ciri-ciri-pisang-matang-sempurna-b-Re-K2-YGBA0.jpg', 'Buah Pisang Amazon  Fresh -/+ 1 Kg (940 gr - 1060 gr) Pisang ini identik dengan warna kuning segar dan kulit manis. Pisang kaya akan kalium dan pektin, yang merupakan serat baik bagi tubuh', 50000, 100);
        $this->createFood('Jeruk', 'https://i.ibb.co/w6Qx7qx/12-03-2021-04-00-42-Jeruk-Sunkist.jpg', 'Buah Jeruk Sunkist -/+ 1 Kg (960 gr - 1000 gr) Jeruk sunkist merupakan jeruk dengan ukuran yang lebih besar dari jeruk mandarin. Kulitnya memiliki karakteristik warna jingga cerah, lebih tebal, dan keras.', 20000, 200);
        $this->createFood('Anggur', 'https://i.ibb.co/n8V4hK0/000000110987-01-800-jpg.webp', 'Buah Anggur Red Globe -/+ 1 Kg (900 gr - 1100 gr) Anggur red globe adalah varietas anggur merah berbiji dengan ukuran yang besar, umum dipakai juga sebagai anggur meja.', 15000, 400);
        $this->createFood('Mangga', 'https://i.ibb.co/F7ZhTsN/mang.jpg', 'Mangga Arum Manis -/+ 1 Kg (900 gr - 1100 gr) Mangga arum manis adalah salah satu varietas lokal yang mempunyai sifat khas dengan warna kulit merah jingga, daging buah kuning menarik serta memiliki rasa dan aroma yang khas sesuai dengan namanya yakni arum manis yang berarti memiliki aroma yang harum dan rasanya yang manis.', 45000, 200);
        $this->createFood('Pear', 'https://i.ibb.co/dcG9Sp3/pir-desktop-home-2x.jpg', 'Pear Madu -/+ 1 Kg (950 gr - 1000 gr) Sweet pear/ pir madu adalah salah satu jenis pir yang mempunyai rasa paling manis di antara pir yang lainya, pir ini mempunyai tekstur buah yang berpasir, banyak air, manis dengan kulit buah yang kasar dan sedikit aga tebal.', 17500, 210);
        $this->createFood('Semangka', 'https://i.ibb.co/mHQKPgx/cc4da4f55be229443dfaec72f86ed6faaa91075d-original.jpg', 'Buah Semangka Kuning -/+ 2 Kg (1900 gr - 2000 gr)<br><br>Buah semangka kuning ini memiliki rasa lebih manis, seperti madu dibandingkan dengan semangka berdaging merah, dengan manfaat yang sama. Buah semangka kuning sekarang banyak tersedia dan merupakan alternatif dari semangka tradisional yang berwarna merah.', 80000, 150);
        $this->createFood('Melon', 'https://i.ibb.co/d7KtHcf/melon-golden-langkawi.jpg', 'Buah Melon Golden -/+ 2 Kg (1900 gr - 2100 gr) Golden melon berbentuk bulat lonjong dengan alur dangkal, dan memiliki kulit halus berwarna kuning. Daging buah melon golden pada umumnya tebal, berwarna putih kekuningan, manis, dan mengandung banyak air.', 65000, 150);
        $this->createFood('Blueberry', 'https://i.ibb.co/44J36Ps/820210529153342.jpg', 'Buah Blueberry -/+ 1 Box (200 gr - 210 gr) Blueberry berwarna biru, dan bentuknya bulat dengan ukuran yang kecil. Rasanya manis dan ada juga yang asam', 45000, 80);
        $this->createFood('Pepaya', 'https://i.ibb.co/qnCv7dM/PEPAYA-CALIFORNIA-E.png', 'Buah Pepaya California -/+ 1 Kg (900 gr - 1200 gr) berkulit hijau tebal dan mulus, berbentuk lonjong, buah matang berwarna kuning, rasanya manis, daging buah kenyal dan tebal.', 30000, 150);
        $this->createFood('Duku', 'https://i.ibb.co/ngwNsKN/manfaat-buah-duku-1.jpg', 'Buah Duku -/+ 1 Kg (950 gr - 1050 gr)  berbentuk jorong, bulat atau bulat memanjang, 2-4(-7) cm × 1,5–5 cm, dengan bulu halus kekuning-kuningan dan daun kelopak yang tidak rontok. Kulit (dinding) buah tipis hingga tebal (kira-kira 6 mm). Berbiji 1–3, pipih, hijau, berasa pahit; biji terbungkus oleh salut biji (arilus) yang putih bening dan tebal, berair, manis hingga masam.', 18000, 120);
        $this->createFood('Nanas', 'https://i.ibb.co/CMVg7bp/nanas.jpg', 'Buah Nanas -/+ 1 Kg (900 gr - 1100 gr) Nanas adalah buah yang tergolong rendah kalori namun memiliki nutrisi yang berlimpah. Nanas juga memiliki kandungan vitamin C, mangan, tembaga, folat, kalium, magnesium, niasin, zat besi, dan vitamin A. Vitamin C sangat penting untuk pertumbuhan dan perkembangan, sistem kekebalan yang sehat dan membantu penyerapan zat besi dari makanan. Sementara mangan adalah mineral alami yang membantu pertumbuhan, menjaga kesehatan metabolisme dan memiliki sifat antioksidan.', 25000, 50);
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
