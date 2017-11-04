<?php
	$x_min=isset($_POST['x_min'])?$_POST['x_min']:2375;
	$x_max=isset($_POST['x_max'])?$_POST['x_max']:2700;
	$y_min=isset($_POST['y_min'])?$_POST['y_min']:4500;
	$y_max=isset($_POST['y_max'])?$_POST['y_max']:5375;
	$z_min=isset($_POST['z_min'])?$_POST['z_min']:3000;
	$z_max=isset($_POST['z_max'])?$_POST['z_max']:3500;
	$x=isset($_POST['x'])?$_POST['x']:2500;
	$y=isset($_POST['y'])?$_POST['y']:300;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inference Engine Tsukamoto & Sugeno</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
	</head>
  
	<body>
		<!-- BLOK HEADER -->
		<div id="header">
			<h2>Penentuan Produksi Berdasarkan Permintaan dan Persediaan Mingguan<br/>
			(Studi Kasus: PT. Hui Tong Guo Jii - Aice Tulungagung)
			</h2>
		</div>
		
		<!-- BLOK ISI -->
		<div id="container">
			<!--<h2>Metode Tsukamoto</h2>
			
			<fieldset style='display:none'>
			<legend>Kasus</legend>
			<!-- reserved 
			</fieldset>-->

			<fieldset class="blok2" style="border: double; background-color: #B3B3B3">
				<!--form input-->
				<form method="post">
					<fieldset class="blok2">
						<legend class="blok2">Batasan</legend>
						<table>
							<tr>
								<th>Variabel</th><th>Min Value</th><th>Max Value</th>
								</tr>
							<tr>
								<td>Permintaan (x)</td>
								<td><input type='text' class='inptxt' name='x_min' value='<?=$x_min?>'/></td>
								<td><input type='text' class='inptxt' name='x_max' value='<?=$x_max?>'/></td>
								</tr>
							<tr>
								<td>Persediaan (y)</td>
								<td><input type='text' class='inptxt' name='y_min' value='<?=$y_min?>'/></td>
								<td><input type='text' class='inptxt' name='y_max' value='<?=$y_max?>'/></td>
								</tr>
							<tr>
								<td>Produksi (z)</td>
								<td><input type='text' class='inptxt' name='z_min' value='<?=$z_min?>'/></td>
								<td><input type='text' class='inptxt' name='z_max' value='<?=$z_max?>'/></td>
								</tr>
						</table>
					</fieldset>

					<fieldset class="blok2">
						<legend class="blok2">Input</legend>
						<table>
							<tr>
								<td>Permintaan yang diinginkan (x)</td>
								<td><input type='text' class='inptxt' name='x' value='<?=$x?>' /></td>
								</tr>
							<tr>
								<td>Persediaan di gudang (y)</td>
								<td><input type='text' class='inptxt' name='y' value='<?=$y?>' /></td>
								</tr>
						</table>
					</fieldset>
					
					<input id="submit" type="submit" name="proses" value="Proses"/>
				</form>
			</fieldset>
			
			<?php
				if(isset($_POST["proses"])){
				echo "<br />";
			?>
	
			<!-- BLOK TSUKAMOTO -->
			<fieldset class="blok2" style="border: double; background-color: #B3B3B3">
				<legend class="blok1">Inference Engine Tsukamoto</legend>
					<fieldset class="blok2">
						<legend class="blok2">[1] Pembentukan Himpunan Fuzzy (Fuzzyfication)</legend><br />
						
						<table border='1'>
							<tr>
								<th colspan='4'>Pemintaan</th>
								</tr>
							<tr>
								<td rowspan='3'>&micro;<sub>permintaan NAIK</sub>(x)</td>
								<td>1 , x<<?=$x_min?></td>
								<td rowspan='3'>&micro;<sub>permintaan TURUN</sub>(x)</td>
								<td>0 , x<<?=$x_min?></td>
								</tr>
							<tr>
								<td>(<?=$x_max?>-x)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td>
								<td>(x-<?=$x_min?>)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td>
								</tr>
							<tr>
								<td>0 , x><?=$x_max?></td><td>1 , x><?=$x_max?></td>
								</tr>
							<tr>
								<th colspan='4'>Persediaan</th>
								</tr>
							<tr>
								<td rowspan='3'>&micro;<sub>persediaan BANYAK</sub>(y)</td>
								<td>1 , y<<?=$y_min?></td>
								<td rowspan='3'>&micro;<sub>persediaan SEDIKIT</sub>(y)</td>
								<td>0 , y<<?=$y_min?></td>
								</tr>
							<tr>
								<td>(<?=$y_max?>-y)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td>
								<td>(y-<?=$y_min?>)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td>
								</tr>
							<tr>
								<td>0 , y><?=$y_max?></td><td>1 , y><?=$y_max?></td>
								</tr>
							<tr>
								<th colspan='4'>Produksi</th>
								</tr>
							<tr>
								<td rowspan='3'>&micro;<sub>produksi BERTAMBAH</sub>(z)</td>
								<td>1 , z<<?=$z_min?></td>
								<td rowspan='3'>&micro;<sub>produksi BERKURANG</sub>(z)</td>
								<td>0 , z<<?=$z_min?></td>
								</tr>
							<tr>
								<td>(<?=$z_max?>-z)/<?=($z_max-$z_min)?> , <?=$z_min?> &le; z &le;<?=$z_max?></td>
								<td>(z-<?=$z_min?>)/<?=($z_max-$z_min)?> , <?=$z_min?> &le; z &le;<?=$z_max?></td>
								</tr>
							<tr>
								<td>0 , z><?=$z_max?></td><td>1 , z><?=$z_max?></td>
								</tr>
							<tr>
								<td colspan='4'>
									Permintaan: x = <?=$x?>;<br />
									<?php
										$ux_turun=($x_max-$x)/($x_max-$x_min);
										$ux_naik=($x-$x_min)/($x_max-$x_min);
									?>					
									&micro;<sub>permintaan TURUN</sub>(<?=$x?>) = (<?=$x_max?>-<?=$x?>)/<?=($x_max-$x_min)?> = <b><?=$ux_turun?>;</b><br />
									&micro;<sub>permintaan NAIK</sub>(<?=$x?>) = (<?=$x?>-<?=$x_min?>)/<?=($x_max-$x_min)?> = <b><?=$ux_naik?>;</b><br /><br />
									Persediaan: y = <?=$y?>;<br />
									
									<?php
										$uy_sedikit=($y_max-$y)/($y_max-$y_min);
										$uy_banyak=($y-$y_min)/($y_max-$y_min);
									?>
									&micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>) = (<?=$y_max?>-<?=$y?>)/<?=($y_max-$y_min)?> = <b><?=$uy_sedikit?>;</b><br/>
									&micro;<sub>persediaan BANYAK</sub>(<?=$y?>) = (<?=$y?>-<?=$y_min?>)/<?=($y_max-$y_min)?> = <b><?=$uy_banyak?>;</b><br/>
								</td>
							</tr>
						</table>
					</fieldset>
					
					<fieldset class="blok2">
						<legend class="blok2">[2] Penerapan Fungsi Implikasi</legend>
						
						<p>Nilai &alpha;-predikat dan Z dari setiap aturan</p>
						<p><strong>Rule 1: </strong><em>IF permintaan TURUN and persediaan BANYAK THEN produksi barang BERKURANG</em><br />		
							<?php
								$a_pred1=min($ux_turun,$uy_banyak);
								$z1=$z_max-$a_pred1*($z_max-$z_min);
							?>
							&alpha;-predikat<sub>1</sub> = &micro;<sub>permintaan TURUN</sub> <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub><br />
								= min(&micro;<sub>permintaan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub>(<?=$y?>))<br />
								= min(<?=$ux_turun?>, <?=$uy_banyak?>)<br />
								= <b><?=$a_pred1?></b><br />
							Dari himpunan produksi barang BERKURANG: (<?=$z_max?>-z<sub>1</sub>)/<?=($z_max-$z_min)?> = <?=$a_pred1?><br/>
							diperoleh <strong>z<sub>1</sub></strong> = <?=$z1?>
						</p>
						
						<p><strong>Rule 2: </strong><em>IF permintaan TURUN and persediaan SEDIKIT THEN produksi barang BERKURANG</em><br />
							<?php
								$a_pred2=min($ux_turun,$uy_sedikit);
								$z2=$z_max-$a_pred2*($z_max-$z_min);
							?>
							&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan TURUN</sub> <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub><br />
								= min(&micro;<sub>permintaan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>))<br />
								= min(<?=$ux_turun?>, <?=$uy_sedikit?>)<br />
								= <b><?=$a_pred2?></b><br />
							Dari himpunan produksi barang BERKURANG: (<?=$z_max?>-z<sub>2</sub>)/<?=($z_max-$z_min)?> = <?=$a_pred2?><br/>
							diperoleh <strong>z<sub>2</sub></strong> = <?=$z2?>
						</p>
						
						<p><strong>Rule 3: </strong><em>IF permintaan NAIK and persediaan BANYAK THEN produksi barang BERTAMBAH</em><br />
							<?php
								$a_pred3=min($ux_naik,$uy_banyak);
								$z3=$a_pred3*($z_max-$z_min)-$z_min;
							?>
							&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan NAIK</sub> <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub><br />
								= min(&micro;<sub>permintaan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub>(<?=$y?>))<br />
								= min(<?=$ux_naik?>, <?=$uy_banyak?>)<br />
								= <b><?=$a_pred3?></b><br />
							Dari himpunan produksi barang BERTAMBAH: (z<sub>3</sub>-<?=$z_min?>)/<?=($z_max-$z_min)?> = <?=$a_pred3?><br/>
							diperoleh <strong>z<sub>3</sub></strong> = <?=$z3?>
						</p>
						
						<p><strong>Rule 4: </strong><em>IF permintaan NAIK and persediaan SEDIKIT THEN produksi barang BERTAMBAH</em><br />
							<?php
								$a_pred4=min($ux_naik,$uy_sedikit);
								$z4=$a_pred4*($z_max-$z_min)-$z_min;
							?>
							&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan NAIK</sub> <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub><br />
								= min(&micro;<sub>permintaan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>))<br />
								= min(<?=$ux_naik?>, <?=$uy_sedikit?>)<br />
								= <b><?=$a_pred4?></b><br />
							Dari himpunan produksi barang BERTAMBAH: (z<sub>4</sub>-<?=$z_min?>)/<?=($z_max-$z_min)?> = <?=$a_pred4?><br/>
							diperoleh <strong>z<sub>4</sub></strong> = <?=$z4?>
						</p>
					</fieldset>
					
					<fieldset class="blok2">
						<legend class="blok2">Defuzzyfication</legend>
						<?php
							$n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred4*$z4;
							$d=$a_pred1+$a_pred2+$a_pred3+$a_pred4;
							$z=$n/$d;
						?>
						
						<p>Menghitung z akhir dengan merata-rata semua z berbobot</p>
						<p>z = (&alpha;-predikat<sub>1</sub>*z<sub>1</sub>+&alpha;-predikat<sub>2</sub>*z<sub>2</sub>+&alpha;-predikat<sub>3</sub>*z<sub>3</sub>+&alpha;-predikat<sub>4</sub>*z<sub>4</sub>) / (&alpha;-predikat<sub>1</sub>+&alpha;-predikat<sub>2</sub>+&alpha;-predikat<sub>3</sub>+&alpha;-predikat<sub>4</sub>)<br/>
							= (<?=$a_pred1?>*<?=$z1?>+<?=$a_pred2?>*<?=$z2?>+<?=$a_pred3?>*<?=$z3?>+<?=$a_pred4?>*<?=$z4?>) / (<?=$a_pred1?>+<?=$a_pred2?>+<?=$a_pred3?>+<?=$a_pred4?>)<br/>
							= <?=$n?> / <?=$d?><br/>
							= <?=$z?></p>
						<p>Jadi jumlah yang harus diproduksi (<strong>z</strong>) = <strong><?=$z?></strong></p>
					</fieldset>

					<?php
						// }
						// echo "<br />";
					?>
			</fieldset>
			
			
			<!-- BLOK SUGENO -->
			<br />
			<fieldset  class="blok2" style="border: double; background-color: #B3B3B3">
				<legend class="blok1">Inference Engine Sugeno</legend>
					<fieldset class="blok2">
						<legend class="blok2">[1] Pembentukan Himpunan Fuzzy (Fuzzyfication)</legend><br />
						
						<table border='1'>
							<tr>
								<th colspan='4'>Pemintaan</th>
								</tr>
							<tr>
								<td rowspan='3'>&micro;<sub>permintaan NAIK</sub>(x)</td>
								<td>1 , x<<?=$x_min?></td>
								<td rowspan='3'>&micro;<sub>permintaan TURUN</sub>(x)</td>
								<td>0 , x<<?=$x_min?></td>
								</tr>
							<tr>
								<td>(<?=$x_max?>-x)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td>
								<td>(x-<?=$x_min?>)/<?=($x_max-$x_min)?> , <?=$x_min?> &le; x &le;<?=$x_max?></td>
								</tr>
							<tr>
								<td>0 , x><?=$x_max?></td><td>1 , x><?=$x_max?></td>
								</tr>
							<tr>
								<th colspan='4'>Persediaan</th>
								</tr>
							<tr>
								<td rowspan='3'>&micro;<sub>persediaan BANYAK</sub>(y)</td>
								<td>1 , y<<?=$y_min?></td>
								<td rowspan='3'>&micro;<sub>persediaan SEDIKIT</sub>(y)</td>
								<td>0 , y<<?=$y_min?></td>
								</tr>
							<tr>
								<td>(<?=$y_max?>-y)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td>
								<td>(y-<?=$y_min?>)/<?=($y_max-$y_min)?> , <?=$y_min?> &le; y &le;<?=$y_max?></td>
								</tr>
							<tr>
								<td>0 , y><?=$y_max?></td><td>1 , y><?=$y_max?></td>
								</tr>
							<tr>
								<th colspan='4'>Produksi</th>
								</tr>
							<tr>
								<td colspan='4' align='center'>Produksi tidak mempunyai himpunan fuzzy</td>
								</tr>
							<tr>
								<td colspan='4'>
									Permintaan: x = <?=$x?>;<br />
									<?php
										$ux_turun=($x_max-$x)/($x_max-$x_min);
										$ux_naik=($x-$x_min)/($x_max-$x_min);
									?>
									&micro;<sub>permintaan TURUN</sub>(<?=$x?>) = (<?=$x_max?>-<?=$x?>)/<?=($x_max-$x_min)?> = <b><?=$ux_turun?>;</b><br />
									&micro;<sub>permintaan NAIK</sub>(<?=$x?>) = (<?=$x?>-<?=$x_min?>)/<?=($x_max-$x_min)?> = <b><?=$ux_naik?>;</b><br /><br />
									
									Persediaan: y = <?=$y?>;<br />
									<?php
										$uy_sedikit=($y_max-$y)/($y_max-$y_min);
										$uy_banyak=($y-$y_min)/($y_max-$y_min);
									?>
									&micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>) = (<?=$y_max?>-<?=$y?>)/<?=($y_max-$y_min)?> = <b><?=$uy_sedikit?>;</b><br/>
									&micro;<sub>persediaan BANYAK</sub>(<?=$y?>) = (<?=$y?>-<?=$y_min?>)/<?=($y_max-$y_min)?> = <b><?=$uy_banyak?>;</b><br/>
								</td>
								</tr>
						</table>
					</fieldset>
					
					<fieldset class="blok2">
						<legend class="blok2">[2] Penerapan Fungsi Implikasi</legend>
						
						<p>Nilai &alpha;-predikat dan Z dari setiap aturan</p>
						<p><strong>Rule 1: </strong><em>IF permintaan TURUN and persediaan BANYAK THEN produksi barang = permintaan - persediaan</em><br />
							<?php
								$a_pred1=min($ux_turun,$uy_banyak);
								$z1=$x-$y;
							?>
							&alpha;-predikat<sub>1</sub> = &micro;<sub>permintaan TURUN</sub> <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub><br />
								= min(&micro;<sub>permintaan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub>(<?=$y?>))<br />
								= min(<?=$ux_turun?>, <?=$uy_banyak?>)<br />
								= <b><?=$a_pred1?></b><br />
							Dari konsekuen Rule 1: z<sub>1</sub>) = permintaan - persediaan = <?=$x?>-<?=$y?><br/>
							diperoleh <strong>z<sub>1</sub></strong> = <?=$z1?>
						</p>
						
						<p><strong>Rule 2: </strong><em>IF permintaan TURUN and persediaan SEDIKIT THEN produksi barang = permintaan</em><br />
							<?php
								$a_pred2=min($ux_turun,$uy_sedikit);
								$z2=$x;
							?>
							&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan TURUN</sub> <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub><br />
								= min(&micro;<sub>permintaan TURUN</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>))<br />
								= min(<?=$ux_turun?>, <?=$uy_sedikit?>)<br />
								= <b><?=$a_pred2?></b><br />
							Dari bagian konsekuen Rule 2: z<sub>2</sub>) = permintaan = <?=$x?><br/>
							diperoleh <strong>z<sub>2</sub></strong> = <?=$z2?>
						</p>
						
						<p><strong>Rule 3: </strong><em>IF permintaan NAIK and persediaan BANYAK THEN produksi barang = permintaan</em><br />
							<?php
								$a_pred3=min($ux_naik,$uy_banyak);
								$z3=$x;
							?>
							&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan NAIK</sub> <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub><br />
								= min(&micro;<sub>permintaan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan BANYAK</sub>(<?=$y?>))<br />
								= min(<?=$ux_naik?>, <?=$uy_banyak?>)<br />
								= <b><?=$a_pred3?></b><br />
							Dari himpunan produksi barang BERTAMBAH: z<sub>3</sub> = permintaan = <?=$x?><br/>
							diperoleh <strong>z<sub>3</sub></strong> = <?=$z3?>
							</p>
							
							<p><strong>Rule 4: </strong><em>IF permintaan NAIK and persediaan SEDIKIT THEN produksi barang = 1.25 * permintaan - persediaan</em><br />
								<?php
									$a_pred4=min($ux_naik,$uy_sedikit);
									$z4=1.25 * $x - $y;
								?>
								&alpha;-predikat<sub>2</sub> = &micro;<sub>permintaan NAIK</sub> <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub><br />
									= min(&micro;<sub>permintaan NAIK</sub>(<?=$x?>) <big>&cap;</big> &micro;<sub>persediaan SEDIKIT</sub>(<?=$y?>))<br />
									= min(<?=$ux_naik?>, <?=$uy_sedikit?>)<br />
									= <b><?=$a_pred4?></b><br />
								Dari himpunan produksi barang BERTAMBAH: z<sub>4</sub> = 1.25 * permintaan - persediaan = 1.25 * <?=$x?>-<?=$y?><br/>
								diperoleh <strong>z<sub>4</sub></strong> = <?=$z4?>
							</p>
					</fieldset>
					
					<fieldset class="blok2">
						<legend class="blok2">Defuzzyfication</legend>
						<?php
							$n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred4*$z4;
							$d=$a_pred1+$a_pred2+$a_pred3+$a_pred4;
							$z=$n/$d;
						?>
						<p>Menghitung z akhir dengan merata-rata semua z berbobot</p>
						<p>z = (&alpha;-predikat<sub>1</sub>*z<sub>1</sub>+&alpha;-predikat<sub>2</sub>*z<sub>2</sub>+&alpha;-predikat<sub>3</sub>*z<sub>3</sub>+&alpha;-predikat<sub>4</sub>*z<sub>4</sub>) / (&alpha;-predikat<sub>1</sub>+&alpha;-predikat<sub>2</sub>+&alpha;-predikat<sub>3</sub>+&alpha;-predikat<sub>4</sub>)<br/>
							= (<?=$a_pred1?>*<?=$z1?>+<?=$a_pred2?>*<?=$z2?>+<?=$a_pred3?>*<?=$z3?>+<?=$a_pred4?>*<?=$z4?>) / (<?=$a_pred1?>+<?=$a_pred2?>+<?=$a_pred3?>+<?=$a_pred4?>)<br/>
							= <?=$n?> / <?=$d?><br/>
							= <?=$z?></p>
						<p>Jadi jumlah yang harus diproduksi (<strong>z</strong>) = <strong><?=$z?></strong></p>
					</fieldset>
				<?php
				}
				?>
			</fieldset>
			
		</div>
		
		<!-- BLOK FOOTER -->
		<div id="footer">
			<p><strong>Tugas Mata Kuliah Artificial Intelligence<br />Armanda Prastiyan Pratama | Seno Isbiyantoro | Ahmad Khakim Amrullah | Roshina Hila Dini<br />
			copyleft &copy; 2017 | Kelompok 3 & 4 PKJ Informatika 2016</strong></p>
		</div>
	</body>
</html>
