<?php 
	$status = $_SESSION['imagesStatus'];
    $wrong = $_SESSION['imagesWrong'];
    $noAltCount = $_SESSION['imagesNoAltCount'];
    $image_count = $_SESSION['imagesImageCount']; 
    $matches = $_SESSION['imagesMatches'];
    $src_matches = $_SESSION['imagesSrcMatches']; 

	echo '
    <div class="section results grey lighten-3">
    <div class="container">
    <div class="col s12">
    <div class="card horizontal">
    <div class="card-stacked">
    <div class="card-content">
    <h5 class = "left">Tags Img</h5>
      <a class="modal-trigger right s6" href="#modalImg"><i class="material-icons text-black  small">info_outline</i></a>
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
    <td>Presença do "alt"</td>';

    if($status === "!alt") echo '<td>Possui '.$no_alt_count.' tags img sem alt</td>';
    else echo '<td>Todas as tags img tem alt</td>';

    echo '
    </tr>
	<tr>
	<td>Links que estão disponíveis das imgs</td>';
	if($status == "alt") echo '<td>Todas as tags img tem alt';
	else {
		echo '<td>
		<ul class="collection">';
		for ($i = 0; $i < $image_count; $i++) { 
			if(!keyword($matches[1][$i], 'alt')){

				preg_match('/src=["\']([^"]+)["\']/i', $matches[1][$i], $src_matches);
				if($src_matches[1]){

					if(!keyword($src_matches[1],".com")) {
						$src_matches[1] = $url .'/' . $src_matches[1];
					}

					if(valida($src_matches[1])) {
						$noAltCount++;
						echo '<li class="collection-item"><a target = "_blank" href = "'.$src_matches[1].'">Imagem '.$noAltCount.'</a></li>';
					}
				}						
			}
		}
		echo '</ul>';
	}

	echo '
	</td>
	</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>';



 ?>

 <div id="modalImg" class="modal">
    <div class="modal-content">
      <h4>Tags Img</h4>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok!</a>
    </div>
  </div>