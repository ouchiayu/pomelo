<?php include 'header.php'; ?>
<?php 
include("connMysql.php");

if (!$seldb) die("資料庫選擇失敗");

$sql_query = "SELECT * FROM `pomelo_order` WHERE `a_phone` = '".mysqli_real_escape_string($_GET["order"])."';";
$order_response = mysqli_query($sql_query);
$order = array();
while ($order[] = mysqli_fetch_assoc($order_response));
unset($order[count($order)-1]);
?>

<link rel="stylesheet" href="css/order.css">

<?php if (empty($order)): ?>
	<h1>查無此訂單</h1>
	<main class="order error">
		<section class="subtitle">
			抱歉，查詢不到此訂單，請重新確認訂單編號
			<form action="search.php" method="get" accept-charset="utf-8">
				<input type="text" name="order" value="" placeholder="輸入訂單編號" required>
				<button type="submit"><i class="icon-search"></i></button>
			</form>
		</section>
	</main>
<?php else: ?>
	<a href="/" class="back_btn glyphicon glyphicon-menu-left">回首頁</a>
	<header class="buyer max-width">
		<div class="size">
			<div class="buyer_name">
				<?php echo $order[0]['a_name']; ?>
			</div>
			<div class="buyer_phone">
				<?php echo $order[0]['a_phone']; ?>
			</div>
		</div>
	</header><!-- /header -->

	<main class="max-width">
		<?php foreach ($order as $i => $receiver): ?>
			<article class="receiver text-right 
				<?php if($receiver['order_status'] == 'arrive' && $receiver['arrive_time']) echo 'success'; ?>
				<?php if(($receiver['payment_type'] != 'cod' && $receiver['payment_status'] == '0') || ($receiver['order_status'] == 'arrive' && empty($receiver['arrive_time']))) echo 'notice'; ?>">
				<div class="main_info">
					<section class="receiver_info">
						<div class="name"><?php echo $receiver['p_name']; ?></div>
						<div class="content">
							<?php echo $receiver['p_phone']; ?><br>
							<?php 
								$receiver['p_address'] = explode("|", $receiver['p_address']);
								$address_data = ['市', '區', '里/村', '路/街', '段', '巷', '弄', '號', '樓', '室'];
								foreach ($address_data as $i => $value) {
									$address[$value] = $receiver['p_address'][$i];
								}
								foreach ($address as $key => $value) {
									if ($value) {
										if($key != '市' && $key != '區' && $key != '室'){
											echo $value.$key;
										}else{
											echo $value;
										}
									}
								}
							 ?>
						</div>
					</section>

					<section class="qty">
						<div class="qty-info">
							<?php echo $receiver['p_num']; ?> <sub>箱</sub>
						</div>
						<div class="qty-info">
							<sub>$</sub> <?php echo number_format($receiver['p_num'] * 1000); ?>
						</div>
					</section>
				</div>

				<button class="collapse_btn" type="button" data-toggle="collapse" data-target="#receiver<?php echo $i; ?>" aria-expanded="true"></button>

				<section id="receiver<?php echo $i; ?>" class="receiver_status collapse in">
					<div class="status payment">
						<div class="title">付款方式</div>
						<?php if ($receiver['payment_type'] == 'cod'): ?>
							<div class="type">
								<div class="type_name">貨到付款</div>
							</div>
						<?php endif ?>

						<?php if ($receiver['payment_type'] == 'atm'): ?>
							<div class="type">
								<div class="type_name">匯款 <?php switch ($receiver['payment_status']) {
									case '0':
										echo '<span class="notice">(未匯款)</span>';
										break;

									case '1':
										echo '<span class="">(匯款確認中)</span>';
										break;
									
									default:
										echo '<span class="success">(已匯款)</span>';
										break;
								} ?></div>
								<div class="type_info atm">
									<?php if ($receiver['payment_status'] != '0'): ?>
										<div class="atm-ready">
											<div class="info">銀行代碼：<?php echo $receiver['atm_bank']; ?></div>
											<div class="info">帳號後五碼：<?php echo $receiver['atm_num']; ?></div>	
										</div>
									<?php endif ?>
									<?php if ($receiver['payment_status'] == '0'): ?>
										<div class="myatm-info">
											<div class="info">
												<div class="info-title">匯款銀行</div>
												<div class="info-content">日盛銀行-八德分行 (815-0141)</div>
											</div>
											<div class="info">
												<div class="info-title">匯款戶名</div>
												<div class="info-content">簡麗華</div>
											</div>
											<div class="info">
												<div class="info-title">匯款帳號</div>
												<div class="info-content">014-10034963-000</div>
											</div>
											<div class="info">
												<div class="info-title">應匯金額</div>
												<div class="info-content">$ <?php echo number_format($receiver['p_num'] * 1000); ?></div>
											</div>
										</div>
										<div class="youatm-info">
											<form id="atm_form" action="add_atm.php?order=<?php echo $receiver['order_id']; ?>" method="post" accept-charset="utf-8">
												<div class="field-group">
													<input type="text" class="field" name="atm_num" value="" required>
													<div class="fieldname">銀行代碼</div>
												</div>
												<div class="field-group">
													<input type="text" class="field" name="atm_bank" value="" required>
													<div class="fieldname">帳號後五碼</div>
												</div>
												<button type="submit" class="btn btn-main">確認匯款</button>
											</form>
										</div>
									<?php endif ?>
								</div>
							</div>
						<?php endif ?>
						
						<?php if ($receiver['payment_type'] == 'cash'): ?>
		 					<div class="type">
	 							<div class="type_name">現金付款 <?php switch ($receiver['payment_status']) {
									case '0':
										echo '<span class="notice">(未付款)</span>';
										break;

									case '1':
										echo '<span class="">(付款確認中)</span>';
										break;
									
									default:
										echo '<span class="success">(已付款)</span>';
										break;
								} ?></div>
								<div class="type_info cash">
									<?php if ($receiver['payment_status'] != "0"): ?>
										<div class="cash-ready">
											<div class="info">收款人：簡麗華</div>
										</div>
									<?php else: ?>
										<form id="cash_form" action="add_cash.php?order=<?php echo $receiver['order_id']; ?>" method="post" accept-charset="utf-8">
											<div class="title">請選擇收款人</div>
											<div class="select-group">
												<select name="cash_who">
													<option value="簡麗華">簡麗華</option>
													<option value="邱美珠">邱美珠</option>
													<option value="游月鳳">游月鳳</option>
													<option value="歐鑑洲">歐鑑洲</option>
													<option value="周瑋玨">周瑋玨</option>
													<option value="歐佳玗">歐佳玗</option>
													<option value="歐靜婷">歐靜婷</option>
													<option value="歐佳雯">歐佳雯</option>
													<option value="歐芷嫣">歐芷嫣</option>
													<option value="歐顓慧">歐顓慧</option>
													<option value="歐琇芸">歐琇芸</option>
													<option value="歐庭愷">歐庭愷</option>
													<option value="歐宛妮">歐宛妮</option>
												</select>
											</div>
											<button type="submit" class="btn btn-main">已付款</button>
										</form>
									<?php endif ?>
								</div>
	 						</div>
 						<?php endif ?>

					</div>

					<div class="status flowchart">
						<?php 
							$status = array(
								'order'  => 'active',
								'pack'   => '',
								'ship'   => '',
								'arrive' => ''
							);

							switch ($receiver['order_status']) {
								case 'pack':
									$status['order'] = 'ready';
									$status['pack'] = 'active';
									break;
								
								case 'ship':
									$status['order'] = 'ready';
									$status['pack'] = 'ready';
									$status['ship'] = 'active';
									break;

								case 'arrive':
									$status['order'] = 'ready';
									$status['pack'] = 'ready';
									$status['ship'] = 'ready';
									$status['arrive'] = 'active';
									break;
								
								case 'arrive':
									$status['order'] = 'ready';
									$status['pack'] = 'ready';
									$status['ship'] = 'ready';
									$status['arrive'] = 'active';
									break;

								default:
									break;
							}
						 ?>
						<div class="title">貨運進度</div>
						<div class="type">
							<div class="part <?php echo $status['order']; ?>">
								<div class="part_name">
									訂購成功
								</div>
								<?php if ($receiver['order_time']): ?>
									<div class="part_action">
										<div class="date"><?php echo $receiver['order_time']; ?></div>
									</div>
								<?php endif ?>
							</div>
							<div class="part <?php echo $status['pack']; ?>">
								<div class="part_name">
									阿婆裝箱中
								</div>
								<?php if ($receiver['pack_time']): ?>
									<div class="part_action">
										<div class="date"><?php echo $receiver['pack_time']; ?></div>
									</div>
								<?php endif ?>
							</div>
							<div class="part <?php echo $status['ship']; ?>">
								<div class="part_name">
									紅柚運送中
								</div>
								<?php if ($receiver['ship_time']): ?>
									<div class="part_action">
										<div class="date"><?php echo $receiver['ship_time']; ?></div>
										<?php if ($receiver['ship_num']): ?>
											<a href="https://www.hct.com.tw/Default.aspx" target="_blank"><?php echo $receiver['ship_num']; ?></a>
										<?php endif ?>
									</div>
								<?php endif ?>
							</div>
							<div class="part <?php echo $status['arrive']; ?>">
								<div class="part_name">
									貨物已到達
								</div>
								<?php if ($receiver['arrive_time']): ?>
									<div class="part_action">
										<div class="date"><?php echo $receiver['arrive_time']; ?></div>
									</div>
								<?php endif ?>

								<?php if ($status['arrive'] == 'active' && empty($receiver['arrive_time'])): ?>
									<div class="part_action">
										<form id="order_form" action="add_arrive.php?order=<?php echo $receiver['order_id']; ?>" method="post" accept-charset="utf-8">
											<button type="submit" class="btn btn-main">我已收到</button>
										</form>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>

					<?php if ($receiver['p_msg']): ?>
						<div class="status remark">
							<div class="title">備註</div>
							<div class="type">
								<div class="content"><?php echo $receiver['p_msg']; ?></div>
							</div>
						</div>
					<?php endif ?>

				</section>
			</article>
		<?php endforeach ?>
	</main>
<?php endif ?>
<?php include 'footer.php'; ?>

<script type="text/javascript">
$(function(){
	$("#atm_form").validate({
		rules: {
			atm_num: {
				phoneNumber: true
			},
			atm_bank: {
				phoneNumber: true
			}
		},
		errorPlacement: function(error, element){
			element.parent().append(error);
		},
		submitHandler: function(form){
			$(form).ajaxSubmit({
				success: function(msg){
					if (msg == 'success') {
						location.reload();
					} else {
						alert('系統錯誤，請聯繫 0928-806-748');
					}
				}
			}); 
		}
	})
	$("#cash_form").validate({
		submitHandler: function(form){
			$(form).ajaxSubmit({
				success: function(msg){
					if (msg == 'success') {
						location.reload();
					} else {
						alert('系統錯誤，請聯繫 0928-806-748');
					}
				}
			}); 
		}
	})
	$("#order_form").validate({
		submitHandler: function(form){
			$(form).ajaxSubmit({
				success: function(msg){
					if (msg == 'success') {
						location.reload();
					} else {
						alert('系統錯誤，請聯繫 0928-806-748');
					}
				}
			}); 
		}
	})
});

</script>