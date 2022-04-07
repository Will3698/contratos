<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;

class ContratoController extends BaseController
{
    public function getToken()
    {
        $ch = curl_init('https://contratos-1.herokuapp.com/contrato');        
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

    public function cadastrar_contrato()
    {
        $arr['dados'] = null;
        return view('cadastrar_contrato_view', $arr);
    }

    public function salvar()
    {
        $cookies = $this->getToken();

        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        $dados = $this->request->getPost(null);

        if (_v($_FILES["anexo"], "name") != "") {
            $file = $this->request->getFile('anexo');
            $path = 'documentos/';
            $file->move(ROOTPATH . "public/" . $path);
            $dados['anexo'] = $path . $file->getName();
        }

        $json = json_encode($dados);

        $iniciar = curl_init('https://contratos-1.herokuapp.com/api/contrato/salvar');
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

    public function detalhe_contrato()
    {
        $arr['dados'] = null;
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr['cont'] = json_decode(curl_exec($ch), true);

        return view('detalhe_contrato_view', $arr);
    }

    public function editar_contrato()
    {
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr['cont'] = json_decode(curl_exec($ch), true);
        return view('editar_contrato_view', $arr);
    }

    public function atualizar_contrato()
    {
        $cookies = $this->getToken();

        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        $dados = $this->request->getPost(null);
        $json = json_encode($dados);
        $iniciar = curl_init('https://contratos-1.herokuapp.com/api/contrato/atualizar');
        curl_setopt($iniciar, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'PUT');
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

    public function apagar_contrato($id)
    {
        $cookies = $this->getToken();

        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        $dados = "https://contratos-1.herokuapp.com/api/contrato/deleta/$id";
        $iniciar = curl_init($dados);
        curl_setopt($iniciar, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $iniciar,
            CURLOPT_HTTPHEADER,
            array(
                'Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession',
                'X-XSRF-TOKEN: $token'
            )
        );
        curl_exec($iniciar);
        curl_close($iniciar);

        return redirect()->to(site_url("contratocontroller/buscar_contrato"));
    }

    public function buscar_contrato()
    {
        $arr['dados'] = null;
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr['list'] = json_decode(curl_exec($ch), true);
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
                
                $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/codContrato/$cod");
                curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $arr['list'] = json_decode(curl_exec($ch), true);
                
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
                $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/cnpj/$cnpj");
                curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $arr['list'] = json_decode(curl_exec($ch), true);
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

    public function vence_contrato()
    {
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/vencer15");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr['list'] = json_decode(curl_exec($ch), true);

        return view('contrato_vence_view', $arr);
    }

    public function buscar_vence_contrato()
    {
        $arr['list'] = null;
        $val = $this->request->getPost(null);
        $op = (int) $val['dias'];        
        if ($op == 15) {
            $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/vencer15");
            curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $arr['list'] = json_decode(curl_exec($ch), true);
        }

        if ($op == 30) {
            $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/vencer30");
            curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $arr['list'] = json_decode(curl_exec($ch), true);
        }

        if ($op == 90) {
            $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/vencer90");
            curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $arr['list'] = json_decode(curl_exec($ch), true);
        }

        return view('contrato_vence_view', $arr);
    }

    public function pdf_contrato($id)
    {        
        $ch = curl_init("https://contratos-1.herokuapp.com/api/contrato/$id");
        curl_setopt($ch, CURLOPT_USERPWD, "Adiministrador" . ":" . "admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $arr = json_decode(curl_exec($ch), true);

        require_once 'dompdf/autoload.inc.php';

        $inf = $this->request->getPost(null);

        $dompdf = new Dompdf();

        $dompdf->load_html(
            '<h1>CONTRATO</h1><br>            
                <label><b>Cod. Contrato: </b></label>' . $arr['cod_contrato'] . '<br><br>                
                <label><b>Nome/Razão Social: </b></label>' . $arr['nome'] . '<br><br> 
                <label><b>CNPJ: </b></label>' . $arr['cnpj'] . '<br><br> 
                <label><b>Responsável: </b></label>' . $arr['responsavel'] . '<br><br> 
                <label><b>Tipo de Serviço: </b></label>' . $arr['tipo_servico'] . '<br><br>                 
                <label><b>Situação: </b></label>' . $arr['situacao'] . '<br><br>
                <label><b>SLA: </b></label>' . $arr['sla'] . '<br><br>
                <label><b>Tipo de Contrato: </b></label>' . $arr['tipo_contrato'] . '<br><br> 
                <label><b>Data da Assinatura: </b></label>' . date("d-m-Y", strtotime($arr['data_assinatura'])) . '<br><br>
                <label><b>Data de Cadastro: </b></label>' . date("d-m-Y", strtotime($arr['data_cadastro'])) . '<br><br>
                <label><b>Dia de Venc. da Fatura: </b></label>' . $arr['data_venc_fatura'] . '<br><br>
                <label><b>Prazo Inicial: </b></label>' . date("d-m-Y", strtotime($arr['prazo_inicial'])) . '<br><br>
                <label><b>Prazo Final: </b></label>' . date("d-m-Y", strtotime($arr['prazo_final'])) . '<br><br>
                <label><b>Prazo de Garantia: </b></label>' . $arr['prazo_garantia'] . ' <span>Meses</span><br><br>
                <label><b>Multa Por Atraso: </b></label>' . $arr['multa'] . ' <span>%</span><br><br>
                <label><b>Valor da Fatura Mensal: </b><span>R$ </span></label>' . $arr['valor_fatura'] . '<br><br>
                <label><b>Valor Total do Contrato: </b><span>R$ </span></label>' . $arr['valor_total'] . '<br><br>
                <label><b>Status: </b></label>' . $arr['status'] . '<br><br>
                <label><b>Observações: <b></label>' . $arr['obs'] . '<br><br>'
        );

        $dompdf->render();

        $dompdf->stream(
            "Contrato'.pdf",
            array(
                "Attachment" => false
            )
        );
    }
}
