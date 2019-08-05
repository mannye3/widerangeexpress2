<?php

	$output[] = '<table class="table table-striped">
					<thead>
						<tr>
							<th>Transaction Date</th>
							<th>Depositor Name</th>
							<th>Amount</th>
							<!-- <th>&nbsp;</th> -->
							
						</tr>
					</thead>
					<tbody>';

					foreach($data['all_user_trans'] as $user_trans) : 

						$output[] = '<tr>';
														
							$output[] = '<td>' . $user_trans->trans_date . '</td>';
							$output[] = '<td>' . $user_trans->depositor_name . '</td>';
							if($user_trans->currency == "INR"){
								$output[] = '<td>&#8360; ' . number_format($user_trans->amount, 0, '', ',') . '</td>';
							}
							elseif($user_trans->currency == "USD"){
								$output[] = '<td>&#36; ' . number_format($user_trans->amount, 0, '', ',') . '</td>';		
							}
							elseif($user_trans->currency == "GBP"){
								$output[] = '<td>&#163; ' . number_format($user_trans->amount, 0, '', ',') . '</td>';	
							}
							else{
								$output[] = '<td>&#8364; ' . number_format($user_trans->amount, 0, '', ',') . '</td>';	
							}
							
							//$output[] = '<td><a href="' . URLROOTADM . 'admins/transaction/' . $user_info->email . '" class="btn btn-primary">Add/View Transactions</a></td>';		
							
						$output[] = '</tr>';

					endforeach;										

	$output[] = '</tbody>
				</table>';
	

	echo join('',$output);
?>