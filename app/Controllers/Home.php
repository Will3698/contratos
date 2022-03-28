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
        $url = "C:/Users/rafae/Desktop/usuario.json";
        
        $arr = json_decode(file_get_contents($url), true);

        $post = $this->request->getPost(null);

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[0]['email'] === $post['email'] && $arr[0]['senha'] === $post['senha']) {                
                $ch = curl_init("https://contratos-1.herokuapp.com/api/pagamento");
                curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                
                $arr['list'] = json_decode(curl_exec($ch), true);
                return view('pagina_inicial_view', $arr);
                break;
            } else {
                return view("login_view");
            }
        }
    }

    public function home()
    {
        $ch = curl_init("https://contratos-1.herokuapp.com/api/pagamento");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr['list'] = json_decode(curl_exec($ch), true);
        return view('pagina_inicial_view', $arr);
    }



    public function getDados()
    {
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/pago");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr = json_decode(curl_exec($ch), true);


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
        print json_encode($dados);
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to(site_url("home/index"));
    }
}
