<?php if($result){?>
	<span class="blink_me">
		<?php if($result['result'] == 'PASSED'){?>
			<h2>Congratulations !!!!!</h2>
			You have passed council License Examination.
		<?php }elseif($result['result'] == 'FAILED'){ ?>
			<h2>Sorry!!!</h2>
			Better next time.
		<?php } ?>
	</span>
	<table>
		<tr>
			<td>Name</td>
			<td><?php echo ($result['middle_name'])?$result['first_name'] . ' ' . $result['last_name']:$result['first_name'] . ' ' . $result['middle_name'] . ' ' . $result['last_name']?></td>
		</tr>
		<tr>
			<td>Symbol Number</td>
			<td><?php echo $result['symbol_number']?></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><?php echo $result['level']?></td>
		</tr>
		<tr>
			<td>Program</td>
			<td><?php echo $result['program']?></td>
		</tr>
		<tr>
			<td>Result</td>
			<td><?php echo ($result['result'])?strtoupper($result['result']):strtoupper('No result found')?></td>
		</tr>
	</table>
	Result Published at 2025-02-19 10:50 PM
<?php }else{?>
	<h2>Please enter correct data</h2>
<?php } ?>