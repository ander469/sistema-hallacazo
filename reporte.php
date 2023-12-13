<?php

require 'vendor/autoload.php'; //libreria php
require 'con_db.php'; //conexion a bd

//libreria en php
use PhpOffice\PhpSpreadsheet; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//uso de bd
$sql = "SELECT cedula, nombre, apellido, numero_tlf, sector FROM datos";
$resultados = $conex->query($sql);
//nota ya hay una variable con el nomnre "resultado" por eso agregue esa con el nombre "resultados"

//variables
$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Hallacazo 2022");


//seldas que seran utilizadas para extraccion de datos
$hojaActiva->getColumnDimension('A')->setWidth(15);
$hojaActiva->setCellValue('A1', 'cedula');
$hojaActiva->getColumnDimension('B')->setWidth(15);
$hojaActiva->setCellValue('B1', 'nombre');
$hojaActiva->getColumnDimension('C')->setWidth(15);
$hojaActiva->setCellValue('C1', 'apellido');
$hojaActiva->getColumnDimension('D')->setWidth(15);
$hojaActiva->setCellValue('D1', 'numero_tlf');
$hojaActiva->getColumnDimension('E')->setWidth(20);
$hojaActiva->setCellValue('E1', ' sector');

$fila = 2;

while($rows = $resultados->fetch_assoc()){
$hojaActiva->setCellValue('A'.$fila, $rows['cedula']);
$hojaActiva->setCellValue('B'.$fila, $rows['nombre']);
$hojaActiva->setCellValue('C'.$fila, $rows['apellido']);
$hojaActiva->setCellValue('D'.$fila, $rows['numero_tlf']);
$hojaActiva->setCellValue('E'.$fila, $rows['sector']);
$fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="datos.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
?>