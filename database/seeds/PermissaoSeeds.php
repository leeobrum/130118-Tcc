<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    //Permissao Usuário
       	if(!Permissao::where('nome','=','usuario_listar')->count()){
        	Permissao::create([
        			'nome'=>'usuario_listar',
        			'descricao'=>'Listar Usuários'
        		]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_listar')->first();
        	$permissao->update([
        			'nome'=>'usuario_listar',
        			'descricao'=>'Listar Usuários'
        		]);
        }

        if(!Permissao::where('nome','=','usuario_adicionar')->count()){
        	Permissao::create([
        			'nome'=>'usuario_adicionar',
        			'descricao'=>'Adicionar Usuários'
        		]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_adicionar')->first();
        	$permissao->update([
        			'nome'=>'usuario_adicionar',
        			'descricao'=>'Adicionar Usuários'
        		]);
        }

        if(!Permissao::where('nome','=','usuario_editar')->count()){
        	Permissao::create([
        			'nome'=>'usuario_editar',
        			'descricao'=>'Editar Usuários'
        		]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_editar')->first();
        	$permissao->update([
        			'nome'=>'usuario_editar',
        			'descricao'=>'Editar Usuários'
        		]);
        }

        if(!Permissao::where('nome','=','usuario_deletar')->count()){
        	Permissao::create([
        			'nome'=>'usuario_deletar',
        			'descricao'=>'Deletar Usuários'
        		]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_deletar')->first();
        	$permissao->update([
        			'nome'=>'usuario_deletar',
        			'descricao'=>'Deletar Usuários'
        		]);
        }

    //Permissao Papel
        if(!Permissao::where('nome','=','papel_listar')->count()){
            Permissao::create([
                    'nome'=>'papel_listar',
                    'descricao'=>'Listar Papel'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_listar')->first();
            $permissao->update([
                    'nome'=>'papel_listar',
                    'descricao'=>'Listar Papel'
                ]);
        }

        if(!Permissao::where('nome','=','papel_adicionar')->count()){
            Permissao::create([
                    'nome'=>'papel_adicionar',
                    'descricao'=>'Adicionar Papel'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_adicionar')->first();
            $permissao->update([
                    'nome'=>'papel_adicionar',
                    'descricao'=>'Adicionar Papel'
                ]);
        }

        if(!Permissao::where('nome','=','papel_editar')->count()){
            Permissao::create([
                    'nome'=>'papel_editar',
                    'descricao'=>'Editar Papel'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_editar')->first();
            $permissao->update([
                    'nome'=>'papel_editar',
                    'descricao'=>'Editar Papel'
                ]);
        }

        if(!Permissao::where('nome','=','papel_deletar')->count()){
            Permissao::create([
                    'nome'=>'papel_deletar',
                    'descricao'=>'Deletar Papel'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_deletar')->first();
            $permissao->update([
                    'nome'=>'papel_deletar',
                    'descricao'=>'Deletar Papel'
                ]);
        }

    //Permissao Produto
        if(!Permissao::where('nome','=','produto_listar')->count()){
            Permissao::create([
                    'nome'=>'produto_listar',
                    'descricao'=>'Listar Produto'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','produto_listar')->first();
            $permissao->update([
                    'nome'=>'produto_listar',
                    'descricao'=>'Listar Produto'
                ]);
        }

    //Permissao Tipo
        if(!Permissao::where('nome','=','tipo_listar')->count()){
            Permissao::create([
                    'nome'=>'tipo_listar',
                    'descricao'=>'Listar Tipo'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','tipo_listar')->first();
            $permissao->update([
                    'nome'=>'tipo_listar',
                    'descricao'=>'Listar Tipo'
                ]);
        }

    //Permissao Pagina
        if(!Permissao::where('nome','=','pagina_listar')->count()){
            Permissao::create([
                    'nome'=>'pagina_listar',
                    'descricao'=>'Listar Página'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_listar')->first();
            $permissao->update([
                    'nome'=>'pagina_listar',
                    'descricao'=>'Listar Página'
                ]);
        }

    //Permissao Cupom_desconto
        if(!Permissao::where('nome','=','cupom_desconto_listar')->count()){
            Permissao::create([
                    'nome'=>'cupom_desconto_listar',
                    'descricao'=>'Listar Cupom de Desconto'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cupom_desconto_listar')->first();
            $permissao->update([
                    'nome'=>'cupom_desconto_listar',
                    'descricao'=>'Listar Cupom de Desconto'
                ]);
        }

        if(!Permissao::where('nome','=','cupom_desconto_adicionar')->count()){
            Permissao::create([
                    'nome'=>'cupom_desconto_adicionar',
                    'descricao'=>'Adicionar Cupom de Desconto'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cupom_desconto_adicionar')->first();
            $permissao->update([
                    'nome'=>'cupom_desconto_adicionar',
                    'descricao'=>'Adicionar Cupom de Desconto'
                ]);
        }

        if(!Permissao::where('nome','=','cupom_desconto_editar')->count()){
            Permissao::create([
                    'nome'=>'cupom_desconto_editar',
                    'descricao'=>'Editar Cupom de Desconto'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cupom_desconto_editar')->first();
            $permissao->update([
                    'nome'=>'cupom_desconto_editar',
                    'descricao'=>'Editar Cupom de Desconto'
                ]);
        }

        if(!Permissao::where('nome','=','cupom_desconto_deletar')->count()){
            Permissao::create([
                    'nome'=>'cupom_desconto_deletar',
                    'descricao'=>'Deletar Cupom de Desconto'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cupom_desconto_deletar')->first();
            $permissao->update([
                    'nome'=>'cupom_desconto_deletar',
                    'descricao'=>'Deletar Cupom de Desconto'
                ]);
        }

    }
}
