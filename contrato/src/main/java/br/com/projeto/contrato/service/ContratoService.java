package br.com.projeto.contrato.service;

import br.com.projeto.contrato.model.Contrato;
import br.com.projeto.contrato.repository.ContratoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ContratoService {
    @Autowired
    ContratoRepository contratoRepository;

    //listar contratos
    public List<Contrato> findAll(){
        return contratoRepository.findAll();
    }

    //listar por id
    public Contrato findById(Long id){
        if(contratoRepository.findById(id).isPresent()){
            return contratoRepository.findById(id).get();
        }else{
            return null;
        }
    }

    //salvar contrato
    public Contrato save(Contrato contrato){
        return contratoRepository.save(contrato);
    }

    //atualizar contrato
    public Contrato update(Contrato contrato){
        return contratoRepository.save(contrato);
    }

    //deletar contrato
    public void delete(Long id){
        contratoRepository.deleteById(id);
    }

}
