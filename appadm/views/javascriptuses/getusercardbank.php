<?php

	$output[] = '<h3>&nbsp;&nbsp;Card Details</h3>';

	$output[] = '<table class="table table-striped">
					<thead>
						<tr>
							<th>Card Number</th>
							<th>Card Name</th>
							<th>Card Expiry</th>
							<th>Card CVV</th>
							<th>Transfer Date</th>
						</tr>
					</thead>
					<tbody>';

					foreach($data['user_card_details'] as $user_card_info) : 

						$output[] = '<tr>';
												
							$output[] = '<td>' . $user_card_info->card_number . '</td>';
							$output[] = '<td>' . $user_card_info->card_name . '</td>';	
							$output[] = '<td>' . $user_card_info->card_expiry . '</td>';
							$output[] = '<td>' . $user_card_info->cvv . '</td>';
							$output[] = '<td>' . $user_card_info->trans_date . '</td>';
							
						$output[] = '</tr>';

					endforeach;										

	$output[] = '</tbody>
				</table>';
	

	echo join('',$output);

	$output1[] = '<br><br>';

	$output1[] = '<h3>&nbsp;&nbsp;Bank Details</h3>';

	$output1[] = '<table class="table table-striped">
					<thead>
						<tr>
							<th>Bank Name</th>
							<th>Account Name</th>
							<th>Account Number</th>
							<th>Amount To Transfer</th>
							<th>Transfer Date</th>
						</tr>
					</thead>
					<tbody>';

					foreach($data['user_bank_details'] as $user_bank_info) : 

						$output1[] = '<tr>';
												
							$output1[] = '<td>' . $user_bank_info->to_bank_name . '</td>';
							$output1[] = '<td>' . $user_bank_info->to_account_name . '</td>';	
							$output1[] = '<td>' . $user_bank_info->to_account_number . '</td>';
							if($user_bank_info->currency == "INR"){
								$output1[] = '<td>&#8360; ' . number_format($user_bank_info->amount_to_transfer, 0, '', ',') . '</td>';
							}
							elseif($user_bank_info->currency == "USD"){
								$output1[] = '<td>&#36; ' . number_format($user_bank_info->amount_to_transfer, 0, '', ',') . '</td>';		
							}
							elseif($user_bank_info->currency == "GBP"){
								$output1[] = '<td>&#163; ' . number_format($user_bank_info->amount_to_transfer, 0, '', ',') . '</td>';	
							}
							else{
								$output1[] = '<td>&#8364; ' . number_format($user_bank_info->amount_to_transfer, 0, '', ',') . '</td>';	
							}
							
							$output1[] = '<td>' . $user_bank_info->transfer_date . '</td>';
							
						$output1[] = '</tr>';

					endforeach;										

	$output1[] = '</tbody>
				</table>';
	

	echo join('',$output1);
?>