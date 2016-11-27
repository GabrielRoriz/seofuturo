<?php
	$status = $_SESSION['linksStatus'];
    $wrong = $_SESSION['linksWrong'];
    $matches = $_SESSION['linksMatches'];
    $index = $_SESSION['linksIndex'];
    $matchesMAX = $_SESSION['linksCountMatches'];

	echo '
	<style>li {word-wrap: break-word;}</style>
    <div class="section results grey lighten-3">
    <div class="container">
    <div class="col s12">
    <div class="card horizontal">
    <div class="card-stacked">
    <div class="card-content">
    <h5 class = "left">Links e nofollow</h5>
      <a class="modal-trigger right s6" href="#modalLinks"><i class="material-icons text-black  small">info_outline</i></a>
    <table  class="striped">
    ';

    if($wrong) echo '<thead class="red lighten-2">';
    else echo '<thead class="green lighten-2">';
    

    echo '
    <tr>
    <th data-field="name">Análise</th>
    <th data-field="price">Comentários</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    </thead>
    <tbody>
    <tr>
    <td>Resultado</td>';

    if($status == "!nofollow") echo '<td>Possui links sem nofollow</td>';
    else echo '<td>Todas os links possuem nofollow</td>';

    echo '
    </tr>
	<tr>
	<td>Links externos sem nofollow</td>';
	if($status != "!nofollow") echo '<td>Todas os links possuem nofollow';
	else {
		echo '<td>
		<ul class="collection">';
		for ($i = 0; $i < $matchesMAX; $i++) { 	
			if((!keyword($matches[1][$i], 'nofollow'))&&($index[$i] == 'ext')) {
				$href_match = array();
				preg_match_all('/href=["\']([^"]+)["\']/i', $matches[1][$i], $href_match);
				echo '<li class="collection-item">'.$href_match[1][0].'</li>';
			}
		}
		echo '</ul>';
	}

	echo '
	</td>
	</tr>
	<tr>
	<td>Links internos sem nofollow</td>';
	if($status != "!nofollow") echo '<td>Todas os links possuem nofollow';
	else {
		echo '<td>
		<ul class="collection">';
		for ($i = 0; $i < $matchesMAX; $i++) {
			if((!keyword($matches[1][$i], 'nofollow'))&&($index[$i] == 'int')) {
				if(preg_match_all('/href=["\']([^"]+)["\']/i', $matches[1][$i], $href_match)){
					echo '<li class="collection-item">'.$href_match[1][0].'</li>';
				}
				
			}
		}
		echo '</ul>';
	}
	echo '
	</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>';

	


?>

<div id="modalLinks" class="modal">
    <div class="modal-content">
      <h4>Links e nofollow</h4>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok!</a>
    </div>
  </div>