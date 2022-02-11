<?php

namespace App\Controllers;

class ContratoController extends BaseController
{
    public function cadastrar_contrato()
    {
        $arr['dados'] = null;
        return view('cadastrar_contrato_view', $arr);
    }

    public function listar_contrato()
    {
        $arr['data'] = null;
        $url = "http://localhost:8080/api/contrato";
        $arr['listagem'] = json_decode(file_get_contents($url), true);
        return view('listar_contrato_view', $arr);
    }

    public function salvar()
    {
        $dados = $this->request->getPost(null);
        
        if (_v($_FILES["anexo"], "name") != "") {
            $file = $this->request->getFile('anexo');
            $path = 'documentos/';
            $file->move(ROOTPATH . "public/" . $path);
            $dados['anexo'] = $path . $file->getName();
        }

        
        $json = json_encode($dados);
        //print_r($json);
        //die();
        $iniciar = curl_init('http://localhost:8080/api/contrato/salvar');
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

        return redirect()->to(site_url("contratocontroller/cadastrar_contrato"));
    }

    public function detalhe_contrato()
    {
        $arr['inf'] = null;
        $arr['nome'] = null;
        $url = "http://localhost:8080/api/contrato";
        $arr['cont'] = json_decode(file_get_contents($url), true);
        return view('detalhe_contrato_view', $arr);
    }

    public function editar_contrato()
    {
        $arr['inf'] = null;
        $arr['nome'] = null;
        $url = "http://localhost:8080/api/contrato";
        $arr['cont'] = json_decode(file_get_contents($url), true);
        return view('editar_contrato_view', $arr);
    }

    public function atualizar_contrato()
    {
        $dados = $this->request->getPost(null);
        $json = json_encode($dados);
        //print_r($json);
        //die();
        $iniciar = curl_init('http://localhost:8080/api/contrato/atualizar');
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'PUT');
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

        return redirect()->to(site_url("contratocontroller/listar_contrato"));
    }

    public function apagar_contrato($id)
    {        
        $dados = "http://localhost:8080/api/contrato/deleta/$id";
        
        $iniciar = curl_init($dados);
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);
        curl_exec($iniciar);
        curl_close($iniciar);

        return redirect()->to(site_url("contratocontroller/listar_contrato"));
    }
}
