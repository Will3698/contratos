$(document).ready(function () {
	$('#inputCod').hide();
	$('#inputNome').hide();
	$('#inputCnpj').hide();
	$('#inputResp').hide();
	$('#inputServico').hide();
	$('#inputSituacao').hide();
	$('#inputSla').hide();
	$('#inputTipoContrato').hide();
	$('#inputAssinatura').hide();
	$('#inputDatCadastro').hide();
	$('#inputVencFatura').hide();
	$('#inputPrazoIni').hide();
	$('#inputPrazoFin').hide();
	$('#inputMulta').hide();
	$('#inputFaturaMensal').hide();
	$('#inputTotalContrato').hide();

	$('#mySelect').change(function () {
		if ($('#mySelect').val() == 'Cod. Contrato') {
			$('#inputCod').show();
		} else {
			$('#inputCod').hide();
		}

		if ($('#mySelect').val() == 'Nome/Razão Social') {
			$('#inputNome').show();
		} else {
			$('#inputNome').hide();
		}

		if ($('#mySelect').val() == 'CNPJ') {
			$('#inputCnpj').show();
		} else {
			$('#inputCnpj').hide();
		}

		if ($('#mySelect').val() == 'Responsável') {
			$('#inputResp').show();
		} else {
			$('#inputResp').hide();
		}

		if ($('#mySelect').val() == 'Tipo de Serviço') {
			$('#inputServico').show();
		} else {
			$('#inputServico').hide();
		}

		if ($('#mySelect').val() == 'Situação') {
			$('#inputSituacao').show();
		} else {
			$('#inputSituacao').hide();
		}

		if ($('#mySelect').val() == 'SLA') {
			$('#inputSla').show();
		} else {
			$('#inputSla').hide();
		}

		if ($('#mySelect').val() == 'Tipo de Contrato') {
			$('#inputTipoContrato').show();
		} else {
			$('#inputTipoContrato').hide();
		}

		if ($('#mySelect').val() == 'Data de Assinatura') {
			$('#inputAssinatura').show();
		} else {
			$('#inputAssinatura').hide();
		}

		if ($('#mySelect').val() == 'Data de Cadastro') {
			$('#inputDatCadastro').show();
		} else {
			$('#inputDatCadastro').hide();
		}

		if ($('#mySelect').val() == 'Data de Venc da Fatura') {
			$('#inputVencFatura').show();
		} else {
			$('#inputVencFatura').hide();
		}

		if ($('#mySelect').val() == 'Prazo Inicial') {
			$('#inputPrazoIni').show();
		} else {
			$('#inputPrazoIni').hide();
		}

		if ($('#mySelect').val() == 'Prazo Final') {
			$('#inputPrazoFin').show();
		} else {
			$('#inputPrazoFin').hide();
		}

		if ($('#mySelect').val() == 'Multa Por Atraso') {
			$('#inputMulta').show();
		} else {
			$('#inputMulta').hide();
		}

		if ($('#mySelect').val() == 'Valor da Fatura Mensal') {
			$('#inputFaturaMensal').show();
		} else {
			$('#inputFaturaMensal').hide();
		}

		if ($('#mySelect').val() == 'Valor Total do Contrato') {
			$('#inputTotalContrato').show();
		} else {
			$('#inputTotalContrato').hide();
		}
	});
});

$(document).ready(function(){
	$('#cnpj').mask('00.000.000/0000-00', {reverse: true});
	$('#dinheiro').mask('000.000.000.000.000,00' , { reverse : true});
	$('#cnpj').mask('00.000.000-0000-00');
	$('#data').mask('00-00-0000');
	$('#moeda').mask('000.000.000.000.000,00');
});