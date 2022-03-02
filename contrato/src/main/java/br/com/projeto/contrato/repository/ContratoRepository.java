package br.com.projeto.contrato.repository;

import br.com.projeto.contrato.model.Contrato;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface ContratoRepository extends JpaRepository<Contrato, Long> {

    @Query(value = "SELECT * FROM contratos WHERE cod_contrato = ?1", nativeQuery = true)
    public List<Contrato> findByCodContrato(String cod_contrato);

    @Query(value = "SELECT * FROM contratos WHERE nome = ?1", nativeQuery = true)
    public List<Contrato> findByNome(String nome);

    @Query(value = "SELECT * FROM contratos WHERE cnpj = ?1", nativeQuery = true)
    public List<Contrato> findByCnpj(String cnpj);

    @Query(value = "SELECT * FROM contratos WHERE responsavel = ?1", nativeQuery = true)
    public List<Contrato> findByResponsavel(String resp);

    @Query(value = "SELECT * FROM contratos WHERE tipo_servico = ?1", nativeQuery = true)
    public List<Contrato> findByServico(String serv);

    @Query(value = "SELECT * FROM contratos WHERE situacao = ?1", nativeQuery = true)
    public List<Contrato> findBySituacao(String sit);

    @Query(value = "SELECT * FROM contratos WHERE sla = ?1", nativeQuery = true)
    public List<Contrato> findBySla(String sla);

    @Query(value = "SELECT * FROM contratos WHERE tipo_contrato = ?1", nativeQuery = true)
    public List<Contrato> findByTipoContrato(String con);
}
