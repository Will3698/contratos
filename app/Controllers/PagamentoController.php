<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PagamentoController extends BaseController
{
    public function pagamento_contrato()
    {        
        $dados = $this->request->getPost(null);       
        $idContrato = (int) $dados['id_contrato_pag'];
        $url = "http://localhost:8080/api/contrato/{$idContrato}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $contratos = json_decode(curl_exec($ch), true);
        $post['id_contrato_pag'] = $contratos;
        $json = json_encode($post);        
        //print_r($json);
        //die();
        //$json = json_encode($dados);       
        $iniciar = curl_init('http://localhost:8080/api/pagamento/pagar');
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($iniciar, CURLOPT_POSTFIELDS, $json);
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $iniciar,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json)
            )
        );
        curl_exec($iniciar);
        curl_close($iniciar);

        return redirect()->to(site_url("contratocontroller/buscar_contrato"));
    }   
}
