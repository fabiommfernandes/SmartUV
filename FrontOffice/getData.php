<?php 
// content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_line.php');

mysqli_connect("localhost", "root", "");
mysqli_select_db("DB_UV", "root");
$uvData = "SELECT idUV_Praia FROM Dados";
$result_uv = mysqli_query($uvData);
$results = mysqli_num_rows($results);

$data = array($results); 


// Setup the graph
$graph = new Graph(500,300);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($data);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');


$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>