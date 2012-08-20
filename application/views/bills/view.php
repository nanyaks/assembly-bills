<div class="search_wrap">
</div>
<div><h1>Registered Assembly Bills</h1></div>
<div>
<div style="clear: both"></div>
	<table id="bill_details_table">
		<colgroup>
			<col id='sno'/>
			<col id='title'/>
			<col id='sponsor' />
			<col id='coSponsor' />
			<col id='dtAdded' />
			<col id='popularity' />
			<col id='view' />
		</colgroup>
		<thead>
			<tr id='tbl_bill_dtls_thead_row'>
				<td>&nbsp;</td>
				<td class="first">Title</td>
				<td>Sponsor</td>
				<td>Co Sponsor</td>
				<td>Date Submitted</td>
				<td>Popularity</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		
		<tbody>
			<?php for($i=0; $i<sizeof($info); $i++){
				// Split the date time var into two
				list($dt, $tme) = explode(' ', $info[$i]['dtAdded']);
				
				// Overwrite $info[$i]['dtAdded'] 
				$info[$i]['dtAdded'] = $dt;
				$j = $i + 1;
				?>
			<tr>
				<td class="pad_left_10"><?php echo $j . "."; ?></td>
				<td><a href="#"><?php echo $info[$i]['billTitle']; ?></a></td>
				<td><?php echo $info[$i]['billSponsor']; ?></td>
				<td><?php echo $info[$i]['billCoSponsor']; ?></td>
				<td><?php echo $dt ?></td>
				<td><a href="#">10</a></td>
				<td><a href="view/<?php echo $j; ?>" class='a_more'>Details</a></td>
				
			</tr>
			<?php }?>
		</tbody>
	</table>
</div>