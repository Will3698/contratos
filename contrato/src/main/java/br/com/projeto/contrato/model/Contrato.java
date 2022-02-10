package br.com.projeto.contrato.model;

import lombok.*;

import javax.persistence.*;
import java.util.Date;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder
@Entity
@Table(name = "contratos")
public class Contrato {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;
    @NonNull
    @Column(name = "cod_contrato", nullable = false)
    private String cod_contrato;
    @NonNull
    @Column(name = "nome", nullable = false)
    private String nome;
    @NonNull
    @Column(name = "cnpj", nullable = false)
    private String cnpj;
    @NonNull
    @Column(name = "responsavel", nullable = false)
    private String responsavel;
    @NonNull
    @Column(name = "tipo_servico", nullable = false)
    private String tipo_servico;
    @NonNull
    @Column(name = "situacao", nullable = false)
    private String situacao;
    @NonNull
    @Column(name = "sla", nullable = false)
    private String sla;
    @NonNull
    @Column(name = "tipo_contrato", nullable = false)
    private String tipo_contrato;
    @NonNull
    @Column(name = "data_assinatura", nullable = false)
    private Date data_assinatura;
    @NonNull
    @Column(name = "data_cadastro", nullable = false)
    private Date data_cadastro;
    @NonNull
    @Column(name = "data_venc_fatura", nullable = false)
    private Date data_venc_fatura;
    @NonNull
    @Column(name = "prazo_inicial", nullable = false)
    private Date prazo_inicial;
    @NonNull
    @Column(name = "prazo_final", nullable = false)
    private Date prazo_final;
    @NonNull
    @Column(name = "prazo_garantia", nullable = false)
    private String prazo_garantia;
    @NonNull
    @Column(name = "multa", nullable = false)
    private int multa;
    @NonNull
    @Column(name = "valor_fatura", nullable = false)
    private double valor_fatura;
    @NonNull
    @Column(name = "valor_total", nullable = false)
    private double valor_total;
    @Column(name = "obs")
    private String obs;
    @Column(name = "anexo")
    private String anexo;
}
