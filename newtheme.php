<?php 
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	};
?>	
	<div class="themes-wrapper">
		<form action="include/newtheme/scriptnewtheme.php" method="post" >
			<input placeholder="Введите название темы" type="text" name="themename" required="">
			<button>
				<img src="./img/Add-button.svg" class="add">
			</button>
		</form>
	<div class="themes">	 		
		<div class="card-wrapper">
	<?php 
		$query = "SELECT * FROM `theme` WHERE id > 0"; 
        $result = mysqli_query($link, $query) or die( mysqli_error($link) );
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ( array_reverse($data) as $elem) { ?>

            <div class="theme-card">
				<p class="author-name"><?= $elem['author'] ?></p>
				<a href="profilequestion.php?id=<?= $elem['id'] ?>" ><?= substr($elem['themename'], 0, 40) . "..." ?></a>
				<p class="date"> Ответов: <?= searchid($elem['id']) ?></p>
            </div>

    		<?php } ?>         	
    	</div>	
	</div>