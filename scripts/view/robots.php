<?php
    $url_robots = $_SESSION['url_robots'];
    $wrong = $_SESSION['robotsWrong'];
    $status = $_SESSION['robotsStatus'];

	echo '
    <div class="section results grey lighten-3">
    <div class="container">
    <div class="col s12">
    <div class="card horizontal">
    <div class="card-stacked">
    <div class="card-content">
    <h5 class = "left">Robots.txt</h5>
      <a class="modal-trigger right s6" href="#modalRobots"><i class="material-icons text-black  small">info_outline</i></a>
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

    if($status === "!robots") echo '<td>Não possui o robots.txt</td>';
    else echo '<td>Possui o robots.txt</td>';
  
  	echo '
    </tr>
    <tr>
    <td>Link</td>';

  	if(($status === "robots")||($status === "robots_sitemap")||($status == "robots_!sitemap")) { 
    echo '<td>Acesse o <a href="'.$url_robots.'"" target = "_blank">robots.txt</a>';
  	} else { 
    echo '<td>Não possui o robots.txt</td>';
  	} 

   echo '
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
  ';




?>

<div id="modalRobots" class="modal">
    <div class="modal-content">
      <h4>Robots.txt</h4>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok!</a>
    </div>
  </div>