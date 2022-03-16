<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        return view("login_view");
    }

    public function pagina_inicial()
    {
        $url = "C:/xampp/htdocs/contratos/contratos/usuario.json";
        $arr = json_decode(file_get_contents($url), true);

        $post = $this->request->getPost(null);

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[0]['email'] === $post['email'] && $arr[0]['senha'] === $post['senha']) {
                $url = "http://localhost:8080/api/pagamento";
                $arr['list'] = json_decode(file_get_contents($url), true);
                    
                //$pag = $arr['list']->paginate(3);
                //print_r($pag);
                //die();
                return view('pagina_inicial_view', $arr);
                break;
            } else {
                return view("login_view");
            }
        }
    }

    public function home()
    {
        $url = "http://localhost:8080/api/pagamento";
        $arr['list'] = json_decode(file_get_contents($url), true);
        return view('pagina_inicial_view', $arr);
    }



    public function getDados()
    {
        $url = "http://localhost:8080/api/contrato/pago";
        $arr = json_decode(file_get_contents($url), true);


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

        foreach ($arr as $arr) {
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

    public function logout()
    {
        session_destroy();
        return redirect()->to(site_url("home/index"));
    }
}
