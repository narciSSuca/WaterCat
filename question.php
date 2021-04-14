<?php
	if (!$_SESSION['user']) {
	    header('Location: profile.php');
	};
	
	$_SESSION['idtheme'] = $_GET['id'];
	$idtheme = $_SESSION['idtheme'];
?>  
	<div class="question-part">
		
		<?php 
		$query ="SELECT * FROM theme WHERE id = $idtheme";
		$result = mysqli_query($link, $query) or die( mysqli_error($link) );
	    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	    foreach ($data as $elem) { ?>	
			<div class="theme-card">
				<p class="author-name"><?= $elem['author']?></p>
				<a href="#"><?= $elem['themename']?></a>
			</div>
		<?php } ?>	
		<div class="answer-wrapper">

		<?php
		$query = "SELECT * FROM message WHERE idtheme = $idtheme "; 
        $result = mysqli_query($link, $query) or die( mysqli_error($link) );
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); 
        foreach ($data as $elem) { ?>
        		<div class="answer">
					<p class="answer-author"><?= $elem['sender']?></p>
					<p class="answer-text"><?= $elem['message']?></p>
					<p class="answer-date"><?= $elem['date']?></p>
				</div>
        	<?php } ?> 

        </div>	
        <form action="include/dispatch.php" method="post">
			<input type="text" name="message" required="">
			<button><img src="./img/Add-button.svg"></button>
		</form>
	</div>
		
</body>
</html>