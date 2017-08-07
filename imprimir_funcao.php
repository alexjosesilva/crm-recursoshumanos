<?php

	//biblioteca fpdf
	require 'fpdf/fpdf.php';
	require 'conexao.php';
	
	//conectar ao banco
	//mysql_query($con, "SET NAMES 'utf8'");
	
	//funcção para converter caracteres especiais com acentos
	function converte($string){
		return  iconv("UTF-8", "ISO-8859-1",$string);
	}
	//cria um documento PDF
	$fpdf = new FPDF('p','mm','A4');
	
	$fpdf->AddPage(); //adiconar uma página 
	
	
	//endereco da empresa
	$fpdf->setFont('arial','',12);
	$fpdf->Cell(0,05,"W3L - INFORMATICA",0,1,'L');
	$fpdf->Cell(0,05,"Rua Fulano de Tal, s/n, Bairro Industrial",0,1,'L');
	
	//email para contao
	$fpdf->setFont('arial','',12);
	$fpdf->Cell(0,05,"atendimento@empresa.com.br",0,1,'L');
	
	//exibir data no relatorio
	$data = date("d/m/Y H:i:s");
	$fpdf->Cell(0,05,$data,0,1,'R');

	//dá espaco
	$fpdf->ln(20);
	
	//configura a fonte
	$fpdf->setFont('arial','B',14);
	$fpdf->Cell(0,5,converte("Relatorio de Funcoes"),0,1,'C');
	
	//linha abaixo do Titulo relatorio
	$fpdf->Cell(0,5,"",0,1,'C');
	
	//dá espaco
	$fpdf->ln(20);
	
	//Até aqui é igual para todos...............
	
	if($_GET['opcao']=='1'){//mostrar todos as funcoes
	
	//Query: mostrar todos os clientes
	$sql = "SELECT * FROM tfuncoes";
	$dados = mysql_query($sql);
	

	

	//varrendo o banco atras do dados do funcoes
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Descricao  Funcao"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['descricaoFuncao'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Codigo: "),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['codigoFuncao'],0,1,'L');
		
		//dá espaco
		$fpdf->ln(10);
		
	}//while
	
	
$fpdf->Output();	
}

?>