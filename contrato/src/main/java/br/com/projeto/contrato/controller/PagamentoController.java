package br.com.projeto.contrato.controller;

import br.com.projeto.contrato.model.Contrato;
import br.com.projeto.contrato.model.Pagamento;
import br.com.projeto.contrato.service.ContratoService;
import br.com.projeto.contrato.service.PagamentoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody
@RequestMapping(path = "/api")
public class PagamentoController {
    @Autowired
    PagamentoService pagamentoService;

    @GetMapping(path = "/pagamento")
    public ResponseEntity<List<Pagamento>> listarPagamentos(){
        return ResponseEntity.status(HttpStatus.OK).body(pagamentoService.findAll());
    }

    @GetMapping(path = "/pagamento/{id}")
    public ResponseEntity<Pagamento> pagamentoPorId(@PathVariable Long id){
        Pagamento pagamento = pagamentoService.findById(id);
        if(pagamento != null){
            return ResponseEntity.status(HttpStatus.OK).body(pagamento);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @PostMapping(path = "/pagamento/pagar")
    public ResponseEntity<Pagamento> salvarPagamento(@RequestBody Pagamento pagamento){
        return ResponseEntity.status(HttpStatus.CREATED).body(pagamentoService.save(pagamento));
    }

    @PutMapping(path = "/pagamento/atualizar")
    public ResponseEntity<Pagamento> atualizarPagamento(@RequestBody Pagamento pagamento){
        if(pagamentoService.findById(pagamento.getId()) != null){
            Pagamento pagamentoAtualizado = pagamentoService.update(pagamento);
            return ResponseEntity.status(HttpStatus.OK).body(pagamentoAtualizado);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @DeleteMapping(path = "/pagamento/deleta/{id}")
    public ResponseEntity<?> deletarPagamento(@PathVariable Long id){
        if(pagamentoService.findById(id) != null){
            pagamentoService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Pagamento deletado com sucesso");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Pagamento não existe");
        }
    }
}
