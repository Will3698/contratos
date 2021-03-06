<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PagamentoController extends BaseController
{
    public function getToken()
    {
        $ch = curl_init('https://contratos-1.herokuapp.com/api/contrato');        
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        print "***1***\r\n";
        print_r($result); 
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
        $cookies = array();
        foreach ($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }
        return $cookies;
    }

    public function pagamento_contrato()
    {    
             
        $dados = $this->request->getPost(null);       
        $idContrato = (int) $dados['id_contrato_pag'];
        $url = "https://contratos-1.herokuapp.com/api/contrato/{$idContrato}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        $contratos = json_decode(curl_exec($ch), true);
        $post['id_contrato_pag'] = $contratos;
        $json = json_encode($post);        
        curl_close($ch);
                
        $cookies = $this->getToken();

        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        $iniciar = curl_init('https://contratos-1.herokuapp.com/api/pagamento/pagar');
        curl_setopt($iniciar, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($iniciar, CURLOPT_POSTFIELDS, $json);
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $iniciar,
            CURLOPT_HTTPHEADER,
            array(
                'Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession',
                'X-XSRF-TOKEN: $token',
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json)
            )
        );
        curl_exec($iniciar);
        curl_close($iniciar);

        return redirect()->to(site_url("contratocontroller/buscar_contrato"));
    }   
}
