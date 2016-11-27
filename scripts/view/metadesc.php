<?php

    $status = $_SESSION['metaStatus'];
    $wrong = $_SESSION['metaWrong'];

	echo '
    <div class="section results grey lighten-3">
    <div class="container">
    <div class="col s12">
    <div class="card horizontal">
    <div class="card-stacked">
    <div class="card-content">
    <h5 class = "left">Meta description</h5>
      <a class="modal-trigger right s6" href="#modalMetadesc"><i class="material-icons text-black  small">info_outline</i></a>
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
    <td>Presença</td>';

    if($status === "!meta") echo '<td>Não possui a tag meta description</td>';
    else echo '<td>Possui a tag meta description</td>';
  
  	echo '
    </tr>
    <tr>
    <td>Palavra chave</td>';

    if(preg_match('/k/', $status)) echo '<td>Possui palavra chave da descrição</td>';
    else echo '<td>Não possui palavra chave da descrição</td>';

    echo '
    </tr>
    <tr>
    <td>Caracteres</td>';

    if(preg_match('/+/', $status)) echo '<td>A descrição possui mais de 270 caracteres</td>';
    else if (preg_match('/-/', $status))echo '<td>A descrição possui menos de 270 caracteres</td>';
    else  echo '<td>Não possui palavra chave da descrição</td>';

    echo '
	</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>';
 ?>

 <div id="modalMetadesc" class="modal">
    <div class="modal-content">
      <h4>Meta description</h4>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok!</a>
    </div>
  </div>