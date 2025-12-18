<?php
	require 'admin_header.php';
?>
<link rel="stylesheet" href="https://qinowaticket.com/styles/dashboard/cropper.css">

<div style="width:75%; align-content: center;">
		<select required="" id="categorie" class="selection" >
			<option value=""> -- Catégorie -- </option>
			<?php
				foreach ($categories as $categorie) {
					echo "<option value='".$categorie['idCategorie']."'>".$categorie['nomCategorie']."</option>";
				}
			?>
		</select>
		<input required="" placeholder="Titre de l'article" class="selection" type="text" id="titre">
		<br>
		<br>
		<textarea required="" id="contenu" class="selection" placeholder="Saisissez le contenu" rows="10"></textarea>
		<br>
		<br>
		<span style="font-weight: bold;">Définir la photo de couverture : </span> 
		<br>
		<br>
		<input required="" type="file" class="" id="coover-input">
		<br>
		<br>
		<img id="coover-img" style="width:50px">
		<br>
		<input placeholder="Lien Youtube" class="selection" type="text" id="youtube">
		<br><br>

		<span style="font-weight: bold;">Ajoutez d'autres fichiers à la publication (images, vidéos, documents à télécharger)</span><br><br>
		
		<input type="file" id="piecejointe1" onchange="fichierjoint(1, this)"> <br><br>
		<input type="file" id="piecejointe2" onchange="fichierjoint(2, this)"> <br><br>
		<input type="file" id="piecejointe3" onchange="fichierjoint(3, this)"> <br><br>
		<input type="file" id="piecejointe4" onchange="fichierjoint(4, this)"> <br><br>
		<input type="file" id="piecejointe5" onchange="fichierjoint(5, this)"> <br><br>
		<input type="file" id="piecejointe6" onchange="fichierjoint(6, this)"> <br><br>
		<input type="file" id="piecejointe7" onchange="fichierjoint(7, this)"> <br><br>
		<input type="file" id="piecejointe8" onchange="fichierjoint(8, this)"> <br><br>
		<input type="file" id="piecejointe9" onchange="fichierjoint(9, this)"> <br><br>
		<input type="file" id="piecejointe10" onchange="fichierjoint(10, this)">

		<br><br><br>
		<input onclick="crop()" class="" style=" width: 50%; height: 35px; color: black; font-size: 17px; cursor: pointer;" type="submit" value ="Enregistrer et publier">
		<br>
		<br>

<br>
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td><strong>Titre</strong></td>
		<td><strong>Catégorie</strong></td>
		<td><strong>Action</strong></td>
	</tr>
<?php
	foreach($articles as $article){
		echo "
		<tr id='article".$article['idArticle']."'>
			<td>".$article['titre']."</td>
			<td>".$article['nomCategorie']."</td>
			<td>
				<a target='_blank' href='".lien('Article','r/'.$article['idArticle']."/".$urlTitle($article['titre']))."'>Voir</a>
				<a href='".lien('Web','articles/update/').$article['idArticle']."'  style='margin-left:10px;'>Modifier</a>
				<a onclick='deleteFn(".$article['idArticle']."); return false;' href='#' style='margin-left:10px;'>Supprimer</a>
			</td>
		</tr>
		";
	}
?>
</table>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>
<script src="https://qinowaticket.com/js/dashboard/cropper.js"></script>
<style type="text/css">
	.selection{
		width: 90%;
		margin-top: 20px;
		padding: 10px;
	}


</style>
<script type="text/javascript">

	var cooverImg;

	var file1 = "N";
	var file2 = "N";
	var file3 = "N";
	var file4 = "N";
	var file5 = "N";
	var file6 = "N";
	var file7 = "N";
	var file8 = "N";
	var file9 = "N";
	var file10 = "N";
	
    document.querySelector("#coover-img").src = "<?php echo img_url('event/e2.jpg'); ?>"
	$("#coover-input").change(function(){
        readURL(this);
    });

    function fichierjoint(id, input){
		let content = input.files[0]
		if (id == 1) {
			file1 = content;
		}
		if (id == 2) {
			file2 = content;
		}
		if (id == 3) {
			file3 = content;
		}
		if (id == 4) {
			file4 = content;
		}
		if (id == 5) {
			file5 = content;
		}
		if (id == 6) {
			file6 = content;
		}
		if (id == 7) {
			file7 = content;
		}
		if (id == 8) {
			file8 = content;
		}
		if (id == 9) {
			file9 = content;
		}
		if (id == 10) {
			file10 = content;
		}
	}
	function deleteFn(argument) {
		if(confirm("Voulez vous vraiment supprimer l'article?")){
		  	var xhr = new XMLHttpRequest();
			var url="<?php echo lien('Web','articles/delete/')?>"+argument;
			xhr.open('GET', url);
			xhr.send(null);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					swal("Article supprimé !");
					document.getElementById('article'+argument).setAttribute("style","display:none");
				}
			}
		}
	}

	function readURL(input) {
        if (input.files && input.files[0] && input.files[0].size < 6000000 && (input.files[0].type == "image/png" || input.files[0].type == "image/jpg" || input.files[0].type == "image/jpeg" || input.files[0].type == "image/gif")) {
            $("#resize").hide();
            $("#crop-btn").hide();
            $("#imageLoading").show();
            $("#coover-img").cropper('destroy');
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#coover-img').attr('src', e.target.result);
                $("#imageLoading").hide();
                $("#resize").show();
                $("#crop-btn").show();
                $("#coover-img").cropper({
                    aspectRatio: 4032/3024,
                    crop: function(event){}
                });
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            swal("Choisissez une image dont la taille est inférieure à 2MB");
        }
    }

    function crop() {
	    $("#coover-img").cropper('getCroppedCanvas').toBlob(function(blob) {
	        var fd = new FormData();
	        fd.append('categorie', $('#categorie').val());
	        fd.append('couverture', $('#couverture').val());
	        fd.append('contenu', $('.nicEdit-main').html());
	        fd.append('titre', $('#titre').val());
	        fd.append('youtube', $('#youtube').val());
	        fd.append('file1', file1);
	        fd.append('file2', file2);
	        fd.append('file3', file3);
	        fd.append('file4', file4);
	        fd.append('file5', file5);
	        fd.append('file6', file6);
	        fd.append('file7', file7);
	        fd.append('file8', file8);
	        fd.append('file9', file9);
	        fd.append('file10', file10);
	        fd.append('coover-input', blob);
	        /*
	        fd.forEach((value, key) => {
			  console.log(value);
			});
			console.log("<?php echo lien('Web','articles/index')?>");
			*/
			
	        swal("Enregistrement en cours.  Veuillez patienter...");

	        const xhr = new XMLHttpRequest();
			xhr.open(
				'POST', 
				"<?php echo lien('Web','articles/index')?>",
				true
				);
			xhr.send(fd);

            xhr.onload = function() {
                if (xhr.status === 200) {
                	alert('Ok');
                	console.log(xhr.responseText)
                	/*
		            setTimeout(function() {
		                window.location.href = "<?php echo lien('Web','articles/index')?>";
		            }, 3000);
		            */

                } else {
                    alert(xhr.statusText);
                }
            };
            xhr.onerror = function() {
                alert('Request failed');
            };
			
	        /*

			fetch("<?php echo lien('Web','articles/index')?>", {
			  method: 'POST',
			  body: fd,
			})
			.then(response => response.json())
			.then(data => {
			  console.log('Success:', data);
			})
			.catch((error) => {
			  console.error('Error:', error);
			});

	        $.ajax({
	            type: 'POST',
	            url: "<?php echo lien('Web','articles/index')?>",
	            data: fd,
	            processData: false,
	            contentType: false
	        }).done(function(data) {
	        	alert(data);
	            setTimeout(function() {
	                window.location.href = "<?php echo lien('Web','articles/index')?>";
	            }, 20000);
	        });
	        */
	    });
	}
</script>
	<script src="<?php echo js_url('form'); ?>"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);

</script>