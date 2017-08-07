//varrendo o banco atras do dados do funcoes
	while($linha = mysql_fetch_assoc($dados)){
		
		//configura a fonte Label...........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,10,converte("Nome Funcao"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,10,$linha['descricaoFuncao'],0,1,'L');
		
		//configura a fonte Label.........
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(70,10,converte("Codigo Funcao"),0,0,'L');
	
    	//configura a fonte
		$fpdf->setFont('arial','B',12);
		$fpdf->Cell(0,10,$linha['codigoFuncao'],0,1,'L');
		
		
	}//while