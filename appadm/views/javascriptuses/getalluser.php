<?php

	$output[] = '<table class="table table-striped">
					<thead>
						<tr>
							<th>Acc Name</th>
							<th>Email</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>';

					foreach($data['all_user_info'] as $user_info) : 

						$output[] = '<tr>';
												
							$output[] = '<td>' . $user_info->account_name . '</td>';
							$output[] = '<td>' . $user_info->email . '</td>';	
							$output[] = '<td><a href="' . URLROOTADM . 'admins/usercardbank/' . $user_info->email . '" class="btn btn-primary">View Details</a></td>';	
							
						$output[] = '</tr>';

					endforeach;										

	$output[] = '</tbody>
				</table>';
	

	echo join('',$output);
?>