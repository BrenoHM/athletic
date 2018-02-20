<?php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
<section class="content-header">
    <h1>Estatísticas</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configuração</li>
    </ol>
</section>
<section class="content">
	<div id="linhas" style="width: 100%; height: 500px;"></div>
</section>
<!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  //montando o array com os dados
        var data = google.visualization.arrayToDataTable([
          ['Dia da Semana', 'Acessos'],
          <?php //if($acessos): foreach($acessos as $valor):?>
          ['<?php //echo $valor['diaDaSemana']; ?>', <?php //echo $valor['porcentagemAcesso'];?>],
        <?php //endforeach; endif?>
        ]);
		//opçoes para o gráfico barras
        
		//instanciando e desenhando o gráfico barras
       
		//opções para o gráfico linhas
		var options1 = {
          title: 'Acessos por dia da semana (%)',
		  hAxis: {title: 'Dias da Semana',  titleTextStyle: {color: 'red'}}//legenda na horizontal
        };
		//instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('linhas'));
        linhas.draw(data, options1);
		
      }
    </script>-->