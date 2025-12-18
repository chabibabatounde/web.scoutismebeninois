<?php
include('header.php');
?>

<h1 class="h3 mb-2 text-gray-800">Cotisations payées</h1>
<p class="mb-4">Vous avez ci-dessous la liste complète des cotisations payées. Cliquez sur la références pour voir plus de détails.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $message_titre; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom et prénom</th>
                        <th>District(Région)</th>
                        <th>Année</th>
                        <th>Montant</th>
                        <th>Référence</th>
                    </tr>
                </thead>
                
                <tbody>
                	<?php
                	$montant = 0;
                	foreach ($cotisations as $cotisation) {
                		$montant += $cotisation['montantNet'];

                	?>
                	<tr>
			<?php
				$date_paiement = explode("-",$cotisation['datePaiement']);
				$date_paiement = $date_paiement[2]."-".$date_paiement[1]."-".$date_paiement[0];
			?>
                        <td><?php echo $cotisation['datePaiement']; ?></td>
                        <td><?php echo $cotisation['nom']." ".$cotisation['prenom'] ?></td>
                        <td><?php echo $cotisation['nomDistrict']." (".$cotisation['nomRegion'].")" ?></td>
                        <td><?php echo $cotisation['annee'] ?></td>
                        <td><?php echo $cotisation['montantNet'] ?> F</td>
                        <td>
                        	<a target="_blank" href="<?php echo lien("Collecte","regen_card?transaction_id=".$cotisation['transactionId']); ?>">
                        		<?php echo substr($cotisation['transactionId'], 0, 13)  ?>...
                        	<a>
                        </td>
                    </tr>
                	<?php
                	}
                	?>
                </tbody>
                <tfoot>

                    <tr>
                        <th>Total</th>
                        <th colspan="5"><?php echo $montant ?> F cfa</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
<script type="text/javascript">
	document.getElementById('montant-sec').innerHTML="<?php echo $montant ?>";
</script>
