<?php

use Fpdf\Fpdf;

// Inicia o buffer de saída para capturar qualquer conteúdo
ob_start();

// Inclui o autoload do Composer (caso use dependencias instaladas por ele)
require_once __DIR__ . "/../../vendor/autoload.php";

class NOVOPDF extends Fpdf
{
    function Header()
    {
        $this->Image('YS.png', 5, 1, 50);
        // Pula 30 pontos abaixo da imagem
        $this->Ln(30);

        // Define a fonte: Arial, Negrito, tam. 15
        $this->SetFont('Arial', 'B', 15);

        // Move o cursor 80 pontos pra direita
        $this->Cell(80);
        $this->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Titulo'), 1, 0, 'C');

        // Pula 20 pontos pra baixo
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);

        $this->SetFont('Arial', 'I', 8);

        // Número da página
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Cria o PDF
$pdf = new NOVOPDF();

// Ativa o uso do {nb} para total de pages no rodapé
$pdf->AliasNbPages();

// Adiciona a primeira página
$pdf->AddPage();

// Nome do Autor
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Aluno: Yohan Siedschlag', 0, 1, 'C');

// Fonte do Corpo - Body
$pdf->SetFont('Times', '', 12);

// Gera 80 linhas com conteúdo simulado
for ($i = 1; $i <= 80; $i++) {
    $pdf->Cell(0, 10, 'Teste de linha' . $i, 0, 1);
}

$pdf->Output("relatorio_produtos.pdf", "I");