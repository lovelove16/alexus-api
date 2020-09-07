<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
		body {
			margin: 0;
			padding: 0;
			min-width: 100% !important;
		}
	</style>
</head>

<body bgcolor="#ffffff"
	style="min-width: 100% !important; margin: 0; padding: 0; font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
	<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table class="content" align="center" cellpadding="0" cellspacing="0" border="0"
					style="width: 100%; max-width: 800px; margin-top: 50px;">
					<tr>
						<!-- <td><img style="width: 250px;" src="/img/logo.png" /></td> -->
					</tr>
					<tr>
						<td>
							<hr />
						</td>
					</tr>
					<tr>
						<td>
							<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
								style="margin-top: 100px;">
								<tr>
									<td>
										<h2 style="margin: 0 0 10px;">Hi <?= $firstname ?>,</h2>
									</td>
								</tr>
								<tr>
									<td>
										<p style="margin: 0;">You recently requested to reset your password for your account. Click the button below to reset it.</p>
									</td>
								</tr>
								<tr>
									<td align="center">
										<a style="text-decoration: none; display: inline-block; margin: 45px 0; background-color: #f15b26; outline: 0; color: white; border-radius: 6px; padding: 25px; border: 0;"
											href="http://localhost:3000/resetpassword?token=<?= $token ?>">Reset you password</a></td>
								</tr>
								<tr>
									<td>
										<p style="margin: 0 0 50px;">If you did not request a password reset, please ignore this email or let us know.</p>
									</td>
								</tr>
								<tr>
									<td>
										<p style="margin: 0 0 0px;">Best Regards,</p>
										<p style="margin: 0 0 20px;">Admin</p>
									</td>
								</tr>
								<!-- <tr>
									<td>
										<a href="https://twitter.com/efficialtec" target="_blank"><img src="/img/tw-icon.png" width="75px" alt="Twitter" /></a>
										<a href="https://www.facebook.com/efficialtec" target="_blank"><img src="/img/fb-icon.png" width="75px" alt="Facebook" /></a>
									</td>
								</tr> -->
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>