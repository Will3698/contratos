package br.com.projeto.contrato.repository;

import br.com.projeto.contrato.model.Contrato;
import br.com.projeto.contrato.model.Pagamento;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface PagamentoRepository extends JpaRepository<Pagamento, Long> {

}
