<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ContratoController extends BaseController
{
    public function cadastrar_contrato()
    {
        $arr['dados'] = null;
        return view('cadastrar_contrato_view', $arr);
    }

    public function salvar()
    {
        $dados = $this->request->getPost(null);
        //print_r($dados);
        //die();

        if (_v($_FILES["anexo"], "name") != "") {
            $file = $this->request->getFile('anexo');
            $path = 'documentos/';
            $file->move(ROOTPATH . "public/" . $path);
            $dados['anexo'] = $path . $file->getName();
        }


        $json = json_encode($dados);

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
        $arr['dados'] = null;
        $url = "http://localhost:8080/api/contrato";
        $arr['cont'] = json_decode(file_get_contents($url), true);
        /*for ($i = 0; $i < count($arr['cont']); $i++) {
            if (date('d-m-y') > $arr['cont'][$i]['prazo_final']) {
                $arr['cont'][$i]['status'] = 'Finalizado';              
            }
        }

        for ($i = 0; $i < count($arr['cont']); $i++) {
            if ($arr['cont'][$i]['valor_total'] == 0) {
                $arr['cont'][$i]['valor_total'] = $arr['cont'][$i]['valor_fatura'];
                //print($arr['cont'][$i]['valor_total']);
                //die();
            }
        }*/
        return view('detalhe_contrato_view', $arr);
    }

    public function editar_contrato()
    {
        $url = "http://localhost:8080/api/contrato";
        $arr['cont'] = json_decode(file_get_contents($url), true);

        //print_r($arr['cont']);
        //die();     
        return view('editar_contrato_view', $arr);
    }

    public function atualizar_contrato()
    {
        $dados = $this->request->getPost(null);
        $json = json_encode($dados);
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

        return redirect()->to(site_url("contratocontroller/buscar_contrato"));
    }

    public function apagar_contrato($id)
    {
        $dados = "http://localhost:8080/api/contrato/deleta/$id";

        $iniciar = curl_init($dados);
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);
        curl_exec($iniciar);
        curl_close($iniciar);

        return redirect()->to(site_url("contratocontroller/buscar_contrato"));
    }

    public function buscar_contrato()
    {
        // $arr['listagem'] = null;
        $arr['dados'] = null;
        $url = "http://localhost:8080/api/contrato";
        $arr['list'] = json_decode(file_get_contents($url), true);
        return view('busca_contrato_view', $arr);
    }

    public function buscar()
    {
        $arr['dados'] = null;
        $arr['list'] = null;
        $arr['inf'] = $this->request->getPost(null);

        for ($i = 0; $i < count($arr['inf']); $i++) {
            if ($arr['inf']['cod_contrato'] != null) {
                $cod = $arr['inf']['cod_contrato'];
                $url = "http://localhost:8080/api/contrato/codContrato/$cod";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['nome'] != null) {
                $nome = $arr['inf']['nome'];
                $string = preg_replace(array(
                    "/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/",
                    "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/",
                    "/(ñ)/", "/(Ñ)/"
                ), explode(" ", "a A e E i I o O u U n N"), "http://localhost:8080/api/contrato/nome/$nome");
                $url = str_replace(" ", "%20", $string);
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['cnpj'] != null) {
                $cnpj = $arr['inf']['cnpj'];
                $url = "http://localhost:8080/api/contrato/cnpj/$cnpj";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['responsavel'] != null) {
                $resp = $arr['inf']['responsavel'];
                $url = "http://localhost:8080/api/contrato/responsavel/$resp";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['tipo_servico'] != null) {
                $serv = $arr['inf']['tipo_servico'];
                $url = "http://localhost:8080/api/contrato/tipoServico/$serv";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['situacao'] != null) {
                $sit = $arr['inf']['situacao'];
                $sit = str_replace(" ", "%20", $sit);
                $url = "http://localhost:8080/api/contrato/situacao/$sit";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['sla'] != null) {
                $sla = $arr['inf']['sla'];
                $url = "http://localhost:8080/api/contrato/sla/$sla";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
            if ($arr['inf']['tipo_contrato'] != null) {
                $con = $arr['inf']['tipo_contrato'];
                $url = "http://localhost:8080/api/contrato/tipoContrato/$con";
                $arr['list'] = json_decode(file_get_contents($url), true);
                return view('busca_contrato_view', $arr);
            }
        }
    }

    public function getDados(){
        //$dados = ""
        
        echo '{
            "cols": [
                  {"id":"","label":"Topping","pattern":"","type":"string"},
                  {"id":"","label":"Slices","pattern":"","type":"number"}                  
                ],
            "rows": [
                  {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null},{"v":3,"f":null}]},
                  {"c":[{"v":"Onions","f":null},{"v":1,"f":null},{"v":3,"f":null}]},
                  {"c":[{"v":"Olives","f":null},{"v":1,"f":null},{"v":3,"f":null}]},
                  {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null},{"v":3,"f":null}]},
                  {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null},{"v":3,"f":null}]}
                ]
          }';
    }
}
