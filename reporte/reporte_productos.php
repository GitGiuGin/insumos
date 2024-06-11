<?php
require('../fpdf/fpdf.php');
include_once '../logic/Producto.php';

// Consultar la lista de productos
$productos = Producto::consultar();

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'Lista de Productos', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
        // Cabecera de la tabla
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(23, 6, 'Codigo', 1);
        $this->Cell(80, 6, 'Nombre', 1);
        $this->Cell(25, 6, 'Categoria', 1);
        $this->Cell(20, 6, 'Pais Origen', 1);
        $this->Cell(17, 6, 'P/Compra', 1);
        $this->Cell(15, 6, 'P/Venta', 1);
        $this->Cell(10, 6, 'Cant.', 1);
        $this->Ln();
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Ajuste de texto para celdas largas
    function AjustarCelda($w, $h, $text, $border = 0, $ln = 0, $align = '', $fill = false)
    {
        // Si el texto es muy largo y no estamos en la primera fila, corta y añade "..."
        if ($ln != 0 && strlen($text) > $w / 2) {
            $text = substr($text, 0, $w / 2) . '...';
        }
        $this->Cell($w, $h, $text, $border, $ln, $align, $fill);
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 7);

// Datos de los productos
foreach ($productos as $producto) {
    $pdf->AjustarCelda(23, 6, $producto->codigo, 1);
    $pdf->AjustarCelda(80, 6, $producto->nombre, 1);
    $pdf->Cell(25, 6, $producto->categoria, 1);
    $pdf->Cell(20, 6, $producto->pais, 1);
    $pdf->Cell(17, 6, $producto->precio_compra, 1);
    $pdf->Cell(15, 6, $producto->precio_venta, 1);
    $pdf->Cell(10, 6, $producto->cantidad, 1);
    $pdf->Ln();
}

// Generar el PDF
$pdf->Output();
