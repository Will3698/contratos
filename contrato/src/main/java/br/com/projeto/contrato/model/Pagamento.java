package br.com.projeto.contrato.model;

import lombok.*;

import javax.persistence.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder
@Entity
@Table(name = "pagamentos")
public class Pagamento {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private Long id;

    @OneToOne
    @JoinColumn(name = "id_contrato_pag", referencedColumnName = "id")
    private Contrato id_contrato_pag;

    @NonNull
    @Column(name = "registro")
    private String registro;
}
