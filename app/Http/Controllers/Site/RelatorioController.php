<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPJasper\PHPJasper;

class RelatorioController extends Controller
{
    public function getDatabaseConfig()
    {
        return [
            'driver'   => 'postgres',
            'host'     => 'localhost',
            'port'     => '5432',
            'username' => 'leonardobrum',
            'password' => 'leonardobrum',
            'database' => 'esquadbrum'
        ];  
    }

    public function index(){
    
        return view('admin.relatorios.index');
    }

    public function Rcupom_desconto(){

        $input = public_path() .'/reports/cupom_desconto.jasper';
        $output = public_path() . '/cupom_desconto';
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
            'params' => [],
            'db_connection' => $this->getDatabaseConfig()
        ];

        $jasper = new PHPJasper();

        $jasper->process($input, $output, $options)->execute();
        //dd($jasper);
        $file = $output . '.pdf';
        $path = $file;

        $file = file_get_contents($file);
        unlink($path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="cupom_desconto.pdf"');
    }

    public function produto_status($status){
        $input = public_path() .'/reports/produto_status.jasper';
        $output = public_path() . '/produto_status';
        $options = [
            'format' => ['pdf'],
            'locale' => 'pt_BR',
            'params' => ['status'=>$status],
            'db_connection' => $this->getDatabaseConfig()
        ];

        $jasper = new PHPJasper();

        $jasper->process($input, $output, $options)->execute();
        //dd($jasper);
        $file = $output . '.pdf';
        $path = $file;

        $file = file_get_contents($file);
        unlink($path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="produto_status.pdf"');
    }
}
