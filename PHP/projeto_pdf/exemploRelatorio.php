<?php

use Fpdf\Fpdf;

// Inicia o buffer de saída para capturar qualquer conteúdo
ob_start();

// Inclui o autoload do Composer (caso use dependencias instaladas por ele)
require_once __DIR__ . "/../../vendor/autoload.php";

// Cria uma nova instancia da classe fpdf
$pdf = new Fpdf("p", "pt", "A4");

// Adiciona uma nova página ao doc
$pdf->addPage();

// Funcao auxiliar para converter textos para ISO-8859-1 (evita problemas com acentos)
function textoPDF($txt)
{
    return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
}

// Define a fonte Arial, Negrito (8), tamanho 18
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 5, textoPDF("RELATÓRIO DE DADOS"), 0, 1, 'C');
$pdf->Cell(0, 5, "", "B", 1, 'C');
$pdf->Ln(20);

$dados = [
    ['Item A', 'Descricao 1', 'Categoria X', 10.50],
    ['Item B', 'Descricao 2', 'Categoria Y', 25.75],
    ['Item C', 'Descricao 3', 'Categoria X', 5.99],
    ['Item D', 'Descricao 4', 'Categoria Z', 100.00],
    ['Item E', 'Descricao 5', 'Categoria Y', 12.30],
    ['Item F', 'Descricao 6', 'Categoria X', 8.20],
    ['Item AG', 'Descricao 7', 'Categoria Z', 55.00],
];

// Nome do Autor
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 40, 'Aluno: Yohan Siedschlag', 0, 1, 'C');

// Cabeçalho da tabela
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 20, textoPDF("Produto"), 1, 0, 'L');
$pdf->Cell(180, 20, textoPDF("Detalhes"), 1, 0, 'L');
$pdf->Cell(100, 20, textoPDF("Categorias"), 1, 0, 'L');
$pdf->Cell(100, 20, textoPDF("Valor"), 1, 1, 'R');

// Preenche a tabela com dados
$pdf->SetFont('Arial', 'B', 10);
foreach ($dados as $linha) {
    $pdf->Cell(100, 20, textoPDF($linha[0]), 1, 0, 'L');
    $pdf->Cell(180, 20, textoPDF($linha[1]), 1, 0, 'L');
    $pdf->Cell(100, 20, textoPDF($linha[2]), 1, 0, 'L');
    $pdf->Cell(100, 20, number_format($linha[3], 2, ',', '.'), 1, 1, "R");
}

// Finaliza PDF
$pdf->Output("relatorio_produtos.pdf", "I");

// I = inline - página web
// D = Download