<?php 

include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/medifast/Medicalvue/codigo/entidades/FPDFreport.php';
require('../librerias/fpdf.php');
session_start();
require_once 'SQL.php';
require_once '../conn.php';
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('IMG/medifastlogo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reportes de Consultas',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

  
    $conn = new conn();
   
    $objsql= new metodosSQL();
    $id=$_SESSION['id'];
    $nombre=$_SESSION['nombres'];
    $fecha_inicial=(empty($_POST["fecha_inicial"])) ? NULL : $_POST["fecha_inicial"];
    $fecha_final=(empty($_POST["fecha_final"])) ? NULL : $_POST["fecha_final"];
    echo("nombre".$nombre." fecha ".$fecha_inicial);
//Conecto a la base de datos
    if($fecha_inicial && $fecha_final){
            $con=$conn->conectar();
            //Consulta la tabla productos solicitando todos los productos
                $que="SELECT COUNT(*) AS CONSULTAS,CON.fecha_consulta AS FECHA,DAT.tarifa_consulta AS TARIFA,SUM(DAT.tarifa_consulta) AS TOTAL FROM consultas CON, datos_medics DAT, pacientes PAC WHERE DAT.fk_medico=".$id." and PAC.fk_medico=".$id." AND CON.fk_paciente=PAC.id_paciente AND CON.fecha_consulta BETWEEN '".$fecha_inicial."' and '".$fecha_final."' GROUP BY CON.fecha_consulta;";
            
                $array=$objsql->vizualizar($con,$que);
            //$resultado = mysql_query("SELECT * FROM productos", $link);
            
            //Instaciamos la clase para genrear el documento pdf
            $pdf=new FPDF();
            
            //Agregamos la primera pagina al documento pdf
            $pdf->AddPage();
            
            //Seteamos el inicio del margen superior en 25 pixeles
            
            $y_axis_initial = 25;
             // Logo
            
            $pdf->Cell(-10);
            
            $pdf->SetFont('Arial','B',15);
          
           
            $pdf->SetFillColor(195,212,232);
            $pdf->Rect(0,0,250,35, 'F');
            $pdf->Ln(10);
            $pdf->Image('../IMG/medifastlogo.png',10,10,44);
            // Arial bold 15
           
            // Movernos a la derecha
            // Título
            $pdf->Ln(25);
            $pdf->Cell(3);
            $pdf->Cell(190,10,'Reportes de Consultas',1,0,'C');
            // Salto de línea
            $pdf->Ln(20);
            //Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(3);
            $pdf->Cell(100,6,'Nombre del medico: '.utf8_decode($nombre),1,1,'C');
            $pdf->Cell(40,6,'',0,1,'C');
            $pdf->Cell(3);
            $pdf->Cell(150,6,'Reporte de Consultas en el Periodo '.$fecha_inicial." al ".$fecha_final,1,0,'L');
            
            $pdf->Ln(20);
            
            //Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
            $pdf->SetFillColor(32,115,120);
            $pdf->SetTextColor(500);
            $pdf->Cell(30);
           
            $pdf->Cell(30,6,'CONSULTAS',1,0,'C',1);
          
            $pdf->Cell(30,6,'FECHA',1,0,'C',1);
            
            $pdf->Cell(30,6,'TARIFA',1,0,'C',1);
        
            $pdf->Cell(30,6,'TOTAL',1,0,'C',1);
            
            $pdf->Ln(10);
            
            //Comienzo a crear las fiulas de productos según la consulta mysql
            $pdf->SetTextColor(0);
            $total=0.0;
            foreach ($array as $value) {
                $pdf->Cell(30);
                $pdf->Cell(30,10,utf8_decode($value['CONSULTAS']),1,0,'C',0);
                $pdf->Cell(30,10,utf8_decode($value['FECHA']),1,0,'C',0);
                $pdf->Cell(30,10,utf8_decode($value['TARIFA']),1,0,'C',0);
                $pdf->Cell(30,10,utf8_decode($value['TOTAL']),1,1,'C',0);
                $total=$total+(float)$value['TOTAL'];
            //Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
                //$pdf->Cell( 30, 15, $pdf->Image($imagen, $pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false );
            
               // $pdf->Ln(15);
            
            }
            $pdf->Cell(120);
            $pdf->Cell(35,10,"Ingresos: $".$total,0,1,'C',0);
            $con->close();
            //Mostramos el documento pdf
            $pdf->Output();
    }
   

?>