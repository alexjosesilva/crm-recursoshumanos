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
	
	//exibir data no relatorio
	$data = date("d/m/Y H:i:s");
	$fpdf->Cell(0,05,$data,0,1,'R');

	//dá espaco
	$fpdf->ln(20);
		
	//Até aqui é igual para todos...............
	
	if($_GET['opcao']=='1'){//mostrar todos os FUNCIONARIOS
	

	//configura a fonte
	$fpdf->setFont('arial','B',18);
	$fpdf->Cell(0,5,converte("Relatorio de Todos os funcionarios"),0,1,'C');
	
	//linha abaixo do Titulo relatorio
	$fpdf->Cell(0,5,"",0,1,'C');
	
	//dá espaco
	$fpdf->ln(20);



	//Query: mostrar todos os FUNCIONARIOS
	$sql = "SELECT * FROM tfuncionario order by codigoFuncionario";
	$dados = mysql_query($sql);
	
	//varrendo o banco atras do dados do FUNCIONARIOS
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Codigo:"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['codigoFuncionario'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Nome funcionario"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['nomeFuncionario'],0,1,'L');


		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Funcao"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['funcao'],0,1,'L');



		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Salario"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['salario'],0,1,'L');


		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Data Nascimento"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['dataNascimento'],0,1,'L');

		//dá espaco
		$fpdf->ln(10);
		
	}//while
	
	}
    
    elseif($_GET['opcao']=='2'){//mostrar todos os FUNCIONARIOS por funcao
	

    //configura a fonte
	$fpdf->setFont('arial','B',18);
	$fpdf->Cell(0,5,converte("Relatorio de funcionarios por funcao"),0,1,'C');
	
	//linha abaixo do Titulo relatorio
	$fpdf->Cell(0,5,"",0,1,'C');
	
	//dá espaco
	$fpdf->ln(20);	

	$cont=0;

	//Query: mostrar todos os FUNCIONARIOS
	$sql = "SELECT * FROM tfuncionario order by codigoFuncionario";
	$dados = mysql_query($sql);
	
	//varrendo o banco atras do dados do FUNCIONARIOS
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Funcao"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['funcao'],0,1,'L');

		//armazernar varivel funcao
		$aux = $linha['funcao'];
		
		
		$cont++;

		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("CodigoXXX:"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['codigoFuncionario'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Nome funcionario"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['nomeFuncionario'],0,1,'L');
		

	
	
	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,"Quantidade de funcionarios Listados: ".$cont,0,1,'L');
		//dá espaco
		$fpdf->ln(10);
		$cont = 0;
	}//while
	
	}//else

	if($_GET['opcao']=='3'){//mostrar todos os FUNCIONARIOS por salario
	$cont = 0;
	
	//configura a fonte
	$fpdf->setFont('arial','B',18);
	$fpdf->Cell(0,5,converte("Relatorio de funcionarios por salario"),0,1,'C');
	
	//linha abaixo do Titulo relatorio
	$fpdf->Cell(0,5,"",0,1,'C');
	
	//dá espaco
	$fpdf->ln(20);	


	//Query: mostrar todos os FUNCIONARIOS
	$sql = "SELECT * FROM tfuncionario order by salario";
	$dados = mysql_query($sql);
	
	//varrendo o banco atras do dados do FUNCIONARIOS
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(50,05,converte("Codigo:"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['codigoFuncionario'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(50,05,converte("Nome funcionario: "),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['nomeFuncionario'],0,1,'L');


		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(50,05,converte("Salario: "),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['salario']." R$",0,1,'L');

		//dá espaco
		$fpdf->ln(10);
		$cont++;
		
	}//while

		//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,"Quantidade de funcionarios Listados: ".$cont,0,1,'L');
	
	}//else

	if($_GET['opcao']=='4'){//mostrar todos os FUNCIONARIOS por aniversariante
	$cont = 0;

	//configura a fonte
	$fpdf->setFont('arial','B',18);
	$fpdf->Cell(0,5,converte("Relatorio de funcionarios por aniversariante"),0,1,'C');
	
	//linha abaixo do Titulo relatorio
	$fpdf->Cell(0,5,"",0,1,'C');
	
	//dá espaco
	$fpdf->ln(20);	


	//Query: mostrar todos os FUNCIONARIOS
	$sql = "SELECT * FROM tfuncionario order by salario";
	$dados = mysql_query($sql);
	
	//varrendo o banco atras do dados do FUNCIONARIOS
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Codigo:"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['codigoFuncionario'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Nome funcionario"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['nomeFuncionario'],0,1,'L');


		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Salario"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['salario'],0,1,'L');


		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,05,converte("Data Nascimento"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,05,$linha['dataNascimento'],0,1,'L');

		//dá espaco
		$fpdf->ln(20);
		$cont++;
		
	}//while
	
	//configura a fonte
	$fpdf->setFont('arial','B',12);
	$fpdf->Cell(0,05,"Quantidade de funcionarios Listados: ".$cont,0,1,'L');

	}
		

//Page number
// Go to 1.5 cm from bottom
$fpdf->SetY(270);
// Select Arial italic 8
$fpdf->SetFont('Arial','I',8);
// Print centered page number
$fpdf->Cell(0,05,'Pagina:  '.$fpdf->PageNo(),0,0,'C');
	
$fpdf->Output();	
	

?>