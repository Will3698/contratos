package br.com.projeto.contrato.service;

import br.com.projeto.contrato.model.Contrato;
import br.com.projeto.contrato.model.Pagamento;
import br.com.projeto.contrato.repository.PagamentoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PagamentoService {
    @Autowired
    PagamentoRepository pagamentoRepository;

    @Autowired
    ContratoService contratoService;

    //lista pagamentos
    public List<Pagamento> findAll(){
        return pagamentoRepository.findAll();
    }

    //listar por id
    public Pagamento findById(Long id){
        if(pagamentoRepository.findById(id).isPresent()){
            return pagamentoRepository.findById(id).get();
        }else{
            return null;
        }
    }

    //salvar pagamento
    public Pagamento save(Pagamento pagamento){
        //Contrato contratoSalvo = contratoService.save(pagamento.getId_contrato_pag());
        //pagamento.setId_contrato_pag(contratoSalvo);
        return pagamentoRepository.save(pagamento);
    }

    //atualizar pagamento
    public Pagamento update(Pagamento pagamento){
        return pagamentoRepository.save(pagamento);
    }

    //deletar pagamento
    public void delete(Long id){
        pagamentoRepository.deleteById(id);
    }
}
