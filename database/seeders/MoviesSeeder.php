<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $marvelMovies = [
            'Capitão América: O Primeiro Vingador',
            'Capitã Marvel',
            'Homem de Ferro',
            'O Incrível Hulk',
            'Homem de Ferro 2',
            'Thor',
            'Os Vingadores',
            'Homem de Ferro 3',
            'Thor: O Mundo Sombrio',
            'Capitão América 2 - O Soldado Invernal',
            'Guardiões da Galáxia',
            'Guardiões da Galáxia Vol. 2',
            'Vingadores: Era de Ultron',
            'Homem-Formiga',
            'Capitão América: Guerra Civil',
            'Viúva Negra (excluindo cena pós-créditos)',
            'Homem-Aranha: De Volta ao Lar',
            'Doutor Estranho',
            'Pantera Negra',
            'Thor: Ragnarok',
            'Homem-Formiga e a Vespa',
            'Vingadores: Guerra Infinita',
            'Vingadores: Ultimato',
            'WandaVision',
            'Falcão e o Soldado Invernal',
            'Homem-Aranha: Longe de Casa',
            'Homem-Aranha: Sem Volta para Casa',
            'Eternos',
            'Shang-Chi e a Lenda dos Dez Anéis',
            'Gavião Arqueiro ',
            'Cavaleiro da Lua',
        ];

        foreach ($marvelMovies as $movie)
        {
            Movie::create([
                'name' => $movie
            ]);
        }
        
        User::factory(2)->create()->each(function (User $user) {
            
        });
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
