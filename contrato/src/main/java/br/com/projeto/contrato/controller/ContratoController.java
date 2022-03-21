package br.com.projeto.contrato.controller;

import br.com.projeto.contrato.model.Contrato;
import br.com.projeto.contrato.service.ContratoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody
@RequestMapping(path = "/api")
@CrossOrigin(originPatterns = "http://localhost:8080", allowCredentials = "true")
public class ContratoController {
    @Autowired
    ContratoService contratoService;

    @GetMapping(path = "/contrato")
    public ResponseEntity<List<Contrato>> listarContratos(){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findAll());
    }

    @GetMapping(path = "/contrato/{id}")
    public ResponseEntity<Contrato> contratoPorId(@PathVariable Long id){
        Contrato contrato = contratoService.findById(id);
        if(contrato != null){
            return ResponseEntity.status(HttpStatus.OK).body(contrato);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @PostMapping(path = "/contrato/salvar")
    public ResponseEntity<Contrato> salvarContrato(@RequestBody Contrato contrato){
        return ResponseEntity.status(HttpStatus.CREATED).body(contratoService.save(contrato));
    }

    @PutMapping(path = "/contrato/atualizar")
    public ResponseEntity<Contrato> atualizarContrato(@RequestBody Contrato contrato){
        if(contratoService.findById(contrato.getId()) != null){
            Contrato contratoAtualizado = contratoService.update(contrato);
            return ResponseEntity.status(HttpStatus.OK).body(contratoAtualizado);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @DeleteMapping(path = "/contrato/deleta/{id}")
    public ResponseEntity<?> deletarContrato(@PathVariable Long id){
        if(contratoService.findById(id) != null){
            contratoService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Contrato deletado com sucesso");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Contrato não existe");
        }
    }

    //retorna contrato proximo a vencer 15
    @GetMapping(path = "/contrato/vencer15")
    public ResponseEntity<List<Contrato>> listaContratoProximoVencer15(){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.listaContratoProximoVencer15());
    }

    //retorna contrato proximo a vencer 30
    @GetMapping(path = "/contrato/vencer30")
    public ResponseEntity<List<Contrato>> listaContratoProximoVencer30(){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.listaContratoProximoVencer30());
    }

    //retorna contrato proximo a vencer 90
    @GetMapping(path = "/contrato/vencer90")
    public ResponseEntity<List<Contrato>> listaContratoProximoVencer90(){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.listaContratoProximoVencer90());
    }

    //lista contrato pago
    @GetMapping(path = "/contrato/pago")
    public ResponseEntity<List<Contrato>> listaContratoPago(){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.listaContratoPago());
    }

    //retorna contrato por cod_contrato
    @GetMapping(path = "/contrato/codContrato/{cod}")
    public ResponseEntity<List<Contrato>> findByCodContrato(@PathVariable String cod){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByCodContrato(cod));
    }

    //retorna contrato pelo nome
    @GetMapping(path = "/contrato/nome/{nome}")
    public ResponseEntity<List<Contrato>> findByNome(@PathVariable String nome){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByNome(nome));
    }

    //retorna contrato pelo cnpj
    @GetMapping(path = "/contrato/cnpj/{cnpj}")
    public ResponseEntity<List<Contrato>> findByCnpj(@PathVariable String cnpj){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByCnpj(cnpj));
    }

    //retorna contrato pelo reponsavel
    @GetMapping(path = "/contrato/responsavel/{resp}")
    public ResponseEntity<List<Contrato>> findByResponsavel(@PathVariable String resp){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByResponsavel(resp));
    }

    //retorna contrato pelo tipo de serviço
    @GetMapping(path = "/contrato/tipoServico/{serv}")
    public ResponseEntity<List<Contrato>> findByServico(@PathVariable String serv){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByServico(serv));
    }

    //retorna contrato pelo situação
    @GetMapping(path = "/contrato/situacao/{sit}")
    public ResponseEntity<List<Contrato>> findBySituacao(@PathVariable String sit){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findBySituacao(sit));
    }

    //retorna contrato pela sla
    @GetMapping(path = "/contrato/sla/{sla}")
    public ResponseEntity<List<Contrato>> findBySla(@PathVariable String sla){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findBySla(sla));
    }

    //retorna contrato pela tipo contrato
    @GetMapping(path = "/contrato/tipoContrato/{con}")
    public ResponseEntity<List<Contrato>> findByTipoContrato(@PathVariable String con){
        return ResponseEntity.status(HttpStatus.OK).body(contratoService.findByTipoContrato(con));
    }
}
