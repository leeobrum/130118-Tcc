<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if($existe){
        	$paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();        	
        } else {
        	$paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Empresa Madeireira Brum";
        $paginaSobre->descricao = "Descrição breve sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa..";
        $paginaSobre->imagem = "img/sobre.jpg";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13990.521636842728!2d-51.62041599871827!3d-28.76044980454839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x38ba1cd02d051755!2sMadeireira+Brum!5e0!3m2!1spt-BR!2sbr!4v1506646831352" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();
        echo "Pagina Sobre Criada com sucesso!";

        
    }
}
