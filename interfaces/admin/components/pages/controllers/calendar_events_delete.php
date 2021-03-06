<?php
if (!$request_parameters) {
	AdminHelper::controllerRedirect('/calendar/events/');
}


if (isset($_POST['dodelete']) || isset($_REQUEST['modalconfirm'])) {
	$event_delete_request = new CASHRequest(
		array(
			'cash_request_type' => 'calendar',
			'cash_action' => 'deleteevent',
			'event_id' => $request_parameters[0]
		)
	);
	if ($event_delete_request->response['status_uid'] == 'calendar_deleteevent_200') {
			AdminHelper::formSuccess('Success. Deleted.','/calendar/');
		} else {
		AdminHelper::formFailure('Error. Something just didn\'t work right.');
	}
}

$cash_admin->setPageContentTemplate('delete_confirm');
?>
