<?php
$email_ht = '
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> '.$emailtitle.'</title>
	</head>
	<body yahoo="" bgcolor="#f6f8f1" style="min-width: 100% !important; margin: 0; padding: 0;">
		<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0"><tbody>
			<tr>
				<td>
					<!--[if (gte mso 9)|(IE)]>
					<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>
								<![endif]-->
								<table bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;"><tbody>
									<tr>
										<td bgcolor="#EB9C17" style="padding: 40px 30px 20px;">
											<table width="100%" align="left" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
												<td height="70" style="text-align:center">
													<img src="http://l6frontend.bosslync.com/images/l6_logo_notext.png" border="0" alt="" style="height: auto;">
												</td>
											</tr></tbody></table>
											<!--[if (gte mso 9)|(IE)]>
											<table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
												<tr>
													<td>
														<![endif]-->
														<table align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;"><tbody><tr>
															<td height="5">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
																	<tr>
																		<td style="font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px; padding: 0 0 0 1px;">
																		</td>
																	</tr>
																	<tr>
																		<td style="color: #C0C0C0; font-family: sans-serif; font-size: 33px; line-height: 2px; font-weight: bold; padding: 1px 0 0;">
																		</td>
																	</tr>
																</tbody></table>
															</td>
														</tr></tbody></table>
														<!--[if (gte mso 9)|(IE)]>
													</td>
												</tr>
											</table>
											<![endif]-->
										</td>
									</tr>
									<tr>
										<td style="border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
												<tr>
													<td style="color: #153643; font-family: sans-serif; font-size: 24px; line-height: 28px; font-weight: bold; padding: 0 0 15px;">
														'.$emailtitle.'
													</td>
												</tr>
												<tr>
													<td style="color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;">
														'.$text1.'
													</td>
												</tr>';
											if($button1 != ''){
									$email_ht .= '<tr>
													<td style="padding: 20px 0 0;">
														<table bgcolor="#009688" border="0" cellspacing="0" cellpadding="0" style="background-color: transparent !important;"><tbody><tr>
															<td height="45" style="text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0px;" align="center">
																<a href="'.$button1link.'" style="color: #ffffff; text-decoration: none; background-color: #009688; padding: 15px 15px 13px;">'.$button1text.'</a>
													</td>
														</tr></tbody></table>
													</td>
												</tr>';
											}
							$email_ht .= '</tbody></table>
										</td>
									</tr>';
									if ($text2 != ''){
										$email_ht .= '
										<tr>
											<td style="border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;">';
												if ($image1 != ''){
													$email_ht .= '
													<table width="115" align="left" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
														<td height="115" style="padding: 0 20px 20px 0;">
															<img src="'.$image1.'" width="115" height="115" border="0" alt="" style="height: auto;">
														</td>
													</tr></tbody></table>';
												}
												$email_ht .= '<!--[if (gte mso 9)|(IE)]>
												<table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
													<tr>
														<td>
															<![endif]-->
															<table align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;"><tbody>
																<tr>
																	<td>
																		<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
																			<tr>
																				<td style="color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;">
																					'.$text2.'
																				</td>
																			</tr>';
																			if ($button2text != ''){
																				$email_ht .= '<tr>
																				<td style="padding: 20px 0 0;">
																					<table bgcolor="#009688" border="0" cellspacing="0" cellpadding="0" style="background-color: transparent !important;"><tbody><tr>
																						<td height="45" style="text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0px;" align="center">
																							<a href="'.$button2link.'" style="color: #ffffff; text-decoration: none; background-color: #009688; padding: 15px 15px 13px;">'.$button2text.'</a>
																						</td>
																					</tr></tbody></table>
																				</td>
																			</tr>';
																		}
																		$email_ht .= '</tbody></table>
																	</td>
																</tr></tbody></table>
																<!--[if (gte mso 9)|(IE)]>
															</td>
														</tr>
													</table>
													<![endif]-->
												</td>
											</tr>';
										}
										if ($image2 != ''){
											$email_ht .= '<tr>
											<td style="border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;">
												<img src="images/wide.png" width="100%" border="0" alt="" style="height: auto;">
											</td>
										</tr>';
									}
									$email_ht .='<tr>
									<td style="color: #153643; font-family: sans-serif; font-size: 12px; line-height: 18px; padding: 30px;">
										'.$footertext.'
									</td>
								</tr>
								<tr>
									<td bgcolor="#EB9C17" style="padding: 20px 30px 15px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>
											<tr>
												<td align="center" style="font-family: sans-serif; font-size: 14px; color: #ffffff;">
													&#174; L6 Elite '.date("Y").'
												</td>
											</tr>

										</tbody></table>
									</td>
								</tr>
							</tbody></table>
							<!--[if (gte mso 9)|(IE)]>
						</td>
					</tr>
				</table>
				<![endif]-->
			</td>
		</tr></tbody></table>
	</body>
	</html>';

?>
