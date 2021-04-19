<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Products = [
            1 => [
                'Big Mac',
                "La perfección hecha hamburguesa que te hace agua la boca comienza con dos patties de 100% carne y la salsa Big Mac®, todo dentro de un pan con semillas de ajonjolí.",
                10000, 15, 1, 1
            ],
            2 => [
                'Crispy Chicken Sandwich',
                "Ingredientes: Filetes de pechuga de pollo con carne de costilla, agua, harina de trigo, aceite vegetal (aceite de canola, aceite de maíz, aceite de soja, aceite de soja hidrogenado), azúcar, sal, almidón alimenticio modificado, levadura (bicarbonato de sodio, fosfato de sodio y aluminio, ácido sódico).",
                14235, 20, 1, 2
            ],
            3 => [
                'Chocolate Shake',
                "Nuestro suave helado de vainilla deliciosamente cremoso con sirope de chocolate y cubierto con crema batida y una cereza. Disponible en pequeña, mediana, grande.",
                9112, 15, 1, 3
            ],
            4 => [
                'Vainilla Shake',
                "La clásica malteada de vainilla, hecha con nuestro cremoso suave helado de vainilla y cubierta con crema batida y una cereza. Disponible en [pequeña, mediana, grande].",
                7282, 15, 1, 3
            ],
            5 => [
                'Happy Meal con Hamburguesa',
                "Una jugosa hamburguesa acompañada de Papitas Mundialmente Famosas para niños y tu elección de Trocitos de Manzana o Yogurt de Fresa Bajo en Grasa GO-GURT® de Yoplait®. Luego elige tu bebida favorita: Botellita de Leche Baja en Grasa al 1%, Agua DASANI® o Bebida con Jugo Orgánico Honest Kids® Appley Ever After®.",
                14455, 15, 1, 4
            ],
            6 => [
                'Coca-Cola®',
                "Fría y refrescante. Va bien con cualquier opción de nuestro menú. Disponible en pequeña, mediana y grande.",
                3622, 15, 1, 5
            ],
            7 => [
                'Sprite® Pequeño',
                "El refresco de máquina Sprite tiene un delicioso sabor a lima-limón y viene en tamaños Extra Pequeño, Pequeño, Mediano y Grande. Sprite es un refresco sin cafeína que combina a la perfección con cualquier Combo Meal de McDonald’s.",
                2850, 15, 1, 5
            ],
            8 => [
                'Hawaiana',
                "Extraqueso , Jamón y Piña.",
                5000, 15, 2, 6
            ],
            9 => [
                'Fiesta Pepperoni',
                "Doble pepperoni y extraqueso",
                6400, 15, 2, 6
            ],
            10 => [
                'Americana',
                "Maíz tierno y tocineta con un toque picantico de pepperoni",
                7500, 15, 2, 6
            ],
            11 => [
                'Hawaiian Chick',
                "Queso Mozarella, trocitos de pollo, piña, tocineta y salsa B.B.Q",
                8500, 15, 2, 7
            ],
            12 => [
                'Colombiana',
                "Cebolla, maíz tierno, tocineta y chorizo",
                5500, 15, 2, 7
            ],
            13 => [
                'Italiana',
                "Una pizza al mejor estilo italiano: pepperoni, salami, cebolla y tomate",
                9000, 15, 2, 7
            ]

        ];

        foreach ($Products as $id => $Product) {
            Product::create([
                'name' => $Product[0],
                'description' => $Product[1],
                'price' => $Product[2],
                'quantity' => $Product[3],
                'commerce_id' => $Product[4],
                'category_id' => $Product[5],
            ]);
        }
    }
}
