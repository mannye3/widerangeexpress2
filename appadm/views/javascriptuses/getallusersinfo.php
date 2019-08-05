<?php

	$output[] = '<table class="table table-striped">
					<thead>
						<tr>
							<th>Acc Name</th>
							<th>Acc Number</th>
							<th>Email</th>
							<th>Ledger Balance</th>
							<th>Available Balance</th>
							<th>Last Deposit</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>';

					foreach($data['all_user_info'] as $user_info) : 

						$output[] = '<tr>';
														// , , , , , , 
							$output[] = '<td>' . $user_info->account_name . '</td>';
							$output[] = '<td>' . $user_info->account_number . '</td>';
							$output[] = '<td>' . $user_info->email . '</td>';
							if($user_info->currency == "INR"){
								$output[] = '<td>&#8360; ' . number_format($user_info->ledger_balance, 0, '', ',') . '</td>';		
								$output[] = '<td>&#8360; ' . number_format($user_info->available_balance, 0, '', ',') . '</td>';
								$output[] = '<td>&#8360; ' . number_format($user_info->last_deposit, 0, '', ',') . '</td>';	
							}
							elseif($user_info->currency == "USD"){
								$output[] = '<td>&#36; ' . number_format($user_info->ledger_balance, 0, '', ',') . '</td>';		
								$output[] = '<td>&#36; ' . number_format($user_info->available_balance, 0, '', ',') . '</td>';
								$output[] = '<td>&#36; ' . number_format($user_info->last_deposit, 0, '', ',') . '</td>';	
							}
							elseif($user_info->currency == "GBP"){
								$output[] = '<td>&#163; ' . number_format($user_info->ledger_balance, 0, '', ',') . '</td>';		
								$output[] = '<td>&#163; ' . number_format($user_info->available_balance, 0, '', ',') . '</td>';
								$output[] = '<td>&#163; ' . number_format($user_info->last_deposit, 0, '', ',') . '</td>';	
							}
							else{
								$output[] = '<td>&#8364; ' . number_format($user_info->ledger_balance, 0, '', ',') . '</td>';		
								$output[] = '<td>&#8364; ' . number_format($user_info->available_balance, 0, '', ',') . '</td>';
								$output[] = '<td>&#8364; ' . number_format($user_info->last_deposit, 0, '', ',') . '</td>';	
							}
								
							$output[] = '<td><a href="' . URLROOTADM . 'admins/edituser/' . $user_info->email . '" class="btn btn-primary">View/Edit</a></td>';	
							$output[] = '<td><a href="' . URLROOTADM . 'admins/generatecode/' . $user_info->email . '" class="btn btn-primary">Gen Codes</a></td>';
							$output[] = '<td><a href="' . URLROOTADM . 'admins/transaction/' . $user_info->email . '" class="btn btn-primary">Add/View Trans</a></td>';		
							
							
						$output[] = '</tr>';

					endforeach;										

	$output[] = '</tbody>
				</table>';
	

	echo join('',$output);
?>