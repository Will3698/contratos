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

    //lista contrato proximo a vencer 15 dias
    public List<Contrato> listaContratoProximoVencer15(){
        return contratoRepository.listaContratoProximoVencer15();
    }

    //lista contrato proximo a vencer 30 dias
    public List<Contrato> listaContratoProximoVencer30(){
        return contratoRepository.listaContratoProximoVencer30();
    }

    //lista contrato proximo a vencer 90 dias
    public List<Contrato> listaContratoProximoVencer90(){
        return contratoRepository.listaContratoProximoVencer90();
    }

    //lista contrato pago
    public List<Contrato> listaContratoPago(){
        return contratoRepository.listaContratoPago();
    }

    //lista contrato pelo cod_contrato
    public List<Contrato> findByCodContrato(String cod){
        return contratoRepository.findByCodContrato(cod);
    }

    //lista contrato pelo nome
    public List<Contrato> findByNome(String nome){
        return contratoRepository.findByNome(nome);
    }

    //lista contrato pelo cnpj
    public List<Contrato> findByCnpj(String cnpj){
        return contratoRepository.findByCnpj(cnpj);
    }

    //lista contrato pelo cnpj
    public List<Contrato> findByResponsavel(String resp){
        return contratoRepository.findByResponsavel(resp);
    }

    //lista contrato pelo tipo de serviço
    public List<Contrato> findByServico(String serv){
        return contratoRepository.findByServico(serv);
    }

    //lista contrato pela situação
    public List<Contrato> findBySituacao(String sit){
        return contratoRepository.findBySituacao(sit);
    }

    //lista contrato pela sla
    public List<Contrato> findBySla(String sla){
        return contratoRepository.findBySla(sla);
    }

    //lista contrato pela tipo contrato
    public List<Contrato> findByTipoContrato(String con){
        return contratoRepository.findByTipoContrato(con);
    }
}
