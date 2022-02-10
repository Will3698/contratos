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
}
