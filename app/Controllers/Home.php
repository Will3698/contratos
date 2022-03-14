<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        //$arr['arr'] = null;
        $url = "http://localhost:8080/api/pagamento";
        $arr['list'] = json_decode(file_get_contents($url), true);
        //print_r($arr['list'][0]['id_contrato_pag']['nome']);
        //die();
        return view('pagina_inicial_view', $arr);
    }   

    public function getDados(){
        $url = "http://localhost:8080/api/contrato/pago";
        $arr = json_decode(file_get_contents($url), true);

        //print($arr);
        //die();
        $cols = [];
        $rows = [];
        $dados = [];

        $cols = [
            [
                'id' => '',
                'label' => 'Nome da Empresa',
                'pattern' => '',
                'type' => 'string'
            ],
            [
                'id' => '',
                'label' => 'Valor Pago',
                'pattern' => '',
                'type' => 'number'   
            ]
        ];

        foreach($arr as $arr){
            $rows[] = [
                'c' => [
                    [
                        'v' => $arr['nome'],
                        'f' => null
                    ],
                    [
                        'v' => (int) $arr['valor_pagar'],
                        'f' => null
                    ]
                ]
            ];
        }

        $dados = [
            'cols' => $cols,
            'rows' => $rows
        ];

        //echo '<pre>';
        print json_encode($dados);        
    }
}
