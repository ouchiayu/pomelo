<?php include 'header.php'; ?>
<link rel="stylesheet" href="/css/backend.css">

<?php 
include("../connMysql.php");


$sql_query = "SELECT * FROM `pomelo_order`;";
$order_response = mysql_query($sql_query);
$orders = array();
while ($orders[] = mysql_fetch_assoc($order_response));
unset($orders[count($orders)-1]);

// 箱總數
$box_total = array(
	'order' => 0, 
	'pack' => 0, 
	'ship' => 0, 
	'arrive' => 0 
);

// 依訂單狀態分組
foreach ($orders as $i => $order) {
	// 再依訂購人分組
	$data[$order['order_status']][$order['a_phone']]['a_name']   = $order['a_name'];
	$data[$order['order_status']][$order['a_phone']]['a_phone']  = $order['a_phone'];
	$data[$order['order_status']][$order['a_phone']]['orders'][] = $order;	

	// 計算總數
	$box_total[$order['order_status']] += $order['p_num'];
}

// 狀態中文標題
function typeTittle($type){
	switch ($type) {
		case 'order':
			return '訂單成立';
			break;

		case 'pack':
			return '阿婆裝箱中';
			break;

		case 'ship':
			return '運送中';
			break;

		case 'arrive':
			return '貨物到達';
			break;
		
		default:
			return 'error-type';
			break;
	}
}

// 付款資訊
function getPaymentData($type, $status){
	switch ($type) {
		case 'cod':
			return '貨到付款';
			break;
		
		case 'atm':
			return '匯款 '.getPaymentStatus($status);
			break;

		case 'cash':
			return '現金付款 '.getPaymentStatus($status);
			break;

		default:
			return 'error-type';
			break;
	}
}

// 付款狀態
function getPaymentStatus($status){
	switch ($status) {
		case '0':
			return '<span class="gray">(未付款)</span>';
			break;
		
		case '1':
			return '<span class="red">(等待確認)</span>';
			break;

		case '2':
			return '<span class="green">(已付款)</span>';
			break;

		default:
			return '';
			break;
	}
}

// 日期資料
function getAddress($data){
	$address_array = explode("|", $data);
	$address_data = ['市', '區', '里/村', '路/街', '段', '巷', '弄', '號', '樓', '室'];
	foreach ($address_data as $i => $value) {
		$address[$value] = $address_array[$i];
	}
	$road = '';
	foreach ($address as $word => $value) {
		if ($value) {
			if($word != '市' && $word != '區' && $word != '室'){
				$road .= $value.$word;
			}else{
				$road .= $value;
			}
		}
	}

	return $road;
}

// echo json_encode($data);

// 資料依狀態分組
// foreach ($orders as $i => $value) {
// 	$box_total += $value['p_num'];

// 	switch ($value["order_status"]) {
// 		case 'order':
// 			$orders["order"][] = $value;
// 			unset($orders[$i]);
// 			break;

// 		case 'pack':
// 			$orders["pack"][] = $value;
// 			unset($orders[$i]);
// 			break;

// 		case 'ship':
// 			$orders["ship"][] = $value;
// 			unset($orders[$i]);
// 			break;

// 		case 'arrive':
// 			$orders["arrive"][] = $value;
// 			unset($orders[$i]);
// 			break;
		
// 		default:
// 			break;
// 	}
// }

// 資料組排序
// function cmp($a, $b){
// 	if ($a == 'order') {
// 		return -1;
// 	}
// 	if ($a == 'pack' && $b == 'order') {
// 		return 1;
// 	}else{
// 		return -1;
// 	}
// 	if ($a == 'ship' && $b == 'arrive') {
// 		return -1;
// 	}else{
// 		return 1;
// 	}
// 	if ($a == 'arrive') {
// 		return 1;
// 	}
// }

// uksort($orders, "cmp");


// foreach ($orders as $key => $value) {
	// 組箱總數
	// $total[$key] = 0;
	// foreach ($value as $i => $person) {
	// 	$total[$key] += $person['p_num'];

	// 	// 依訂購人群組
	// 	if (empty($data[$key][$person["p_phone"]])) {
	// 		$data[$key][$person["p_phone"]]['a_name']  = $person["a_name"];
	// 		$data[$key][$person["p_phone"]]['a_phone'] = $person["a_phone"];			
	// 	}else{
	// 		$address_array = explode("|", $person['p_address']);
	// 		$address_data = ['市', '區', '里/村', '路/街', '段', '巷', '弄', '號', '樓', '室'];
	// 		foreach ($address_data as $i => $value) {
	// 			$address[$value] = $address_array[$i];
	// 		}
	// 		$road = '';
	// 		foreach ($address as $word => $value) {
	// 			if ($value) {
	// 				if($word != '市' && $word != '區' && $word != '室'){
	// 					$road .= $value.$word;
	// 				}else{
	// 					$road .= $value;
	// 				}
	// 			}
	// 		}

	// 		$person['p_address'] = $road;

	// 		$data[$key][$person["p_phone"]]['orders'][] = $person;
	// 	}
	// }
// }
?>

<main>
	<div class="max-width">
		<div class="orders">
			<!-- Nav tabs -->
			<nav>
				<ul role="tablist">
					<li class="active" role="presentation">
						<a href="#order" aria-controls="order" role="tab" data-toggle="tab">
							<i class="icon-order"></i><span><?php echo $box_total['order']; ?></span>
						</a>
					</li>
					<li class="" role="presentation">
						<a href="#pack" aria-controls="pack" role="tab" data-toggle="tab">
							<i class="icon-pack"></i><span><?php echo $box_total['pack']; ?></span>
						</a>
					</li>
					<li class="" role="presentation">
						<a href="#ship" aria-controls="ship" role="tab" data-toggle="tab">
							<i class="icon-ship" ></i><span><?php echo $box_total['ship']; ?></span>
						</a>
					</li>
					<li class="" role="presentation">
						<a href="#arrive" aria-controls="arrive" role="tab" data-toggle="tab">
							<i class="icon-arrive"></i><span><?php echo $box_total['arrive']; ?></span>
						</a>
					</li>
				</ul>
			</nav>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<?php foreach ($data as $type_code => $type): ?>
					<article role="tabpanel" class="tab-pane <?php if($type_code == 'order') echo 'active'; ?>" id="<?php echo $type_code; ?>">
						<h1><?php echo typeTittle($type_code); ?></h1>

						<?php foreach ($type as $buyer): ?>
							<article class="buyer">
								<div class="buyer_header">
									<?php echo $buyer['a_name']; ?>
									<a href="/search.php?order=<?php echo $buyer['a_phone']; ?>" target="_blank"><?php echo $buyer['a_phone']; ?></a>
								</div>
								<div class="buyer_main">
									<?php foreach ($buyer['orders'] as $receiver): ?>
										<article class="receiver">
											<form action="" method="" accept-charset="utf-8">
												<div class="receiver_header">
													<div class="receiver_info">
														<div class="name"><?php echo $receiver['p_name']; ?></div>
														<?php echo $receiver['p_phone']; ?><br>
														<?php echo getAddress($receiver['p_address']); ?>
													</div>
													<div class="receiver_num">
														<div class="qty"><?php echo $receiver['p_num']; ?> <sub>箱</sub></div>
														<div class="price"><sub>$</sub> <?php echo number_format($receiver['p_num'] * 1000); ?></div>
													</div>
												</div>
												<div class="receiver_main">
													<div class="receiver_info">
														<div class="info">
															<div class="title">付款方式</div>
															<div class="content <?php echo $receiver['payment_type']; ?>">
																<?php echo getPaymentData($receiver['payment_type'], $receiver['payment_status']); ?>
																<?php if ($receiver['payment_type'] != 'cod' && $receiver['payment_status'] != '0'): ?>
																	<br>
																	<?php if ($receiver['payment_type'] == 'atm'): ?>
																		<span class="gray">銀行代碼：</span><?php echo $receiver['atm_bank']; ?><br>
																		<span class="gray">帳號後五碼：</span><?php echo $receiver['atm_num']; ?>
																	<?php else: ?>
																		<span class="gray">收款人：<?php echo $receiver['cash_who']; ?></span>
																	<?php endif ?>
																	<?php if ($receiver['payment_status'] == '1'): ?>
																		<button class="changePaymentstatus_btn" type="button" data-id="<?php echo $receiver['order_id']; ?>">收款確認</button>
																	<?php endif ?>
																<?php endif ?>
															</div>
														</div>
														<?php if (!empty($receiver['p_msg'])): ?>
															<div class="info">
																<div class="title">備註</div>
																<div class="content"><?php echo $receiver['p_msg']; ?></div>
															</div>
														<?php endif ?>
													</div>
													<div class="receiver_action"><button type="submit">已通知</button></div>
												</div>
											</form>
										</article>
									<?php endforeach ?>
								</div>
							</article>
						<?php endforeach ?>
					</article>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</main>

<!-- <nav>
	<ul>
		<li onclick="animate_page('#order');"><i class="icon-order"></i></li>
		<li onclick="animate_page('#pack');"><i class="icon-pack"></i></li>
		<li onclick="animate_page('#ship');"><i class="icon-ship"></i></li>
		<li onclick="animate_page('#arrive');"><i class="icon-arrive"></i></li>
	</ul>
</nav>
 -->
<?php include 'footer.php'; ?>

<script type="text/javascript">
$(function(){
	// change payment status
	$(document).on("click", ".changePaymentstatus_btn", function(){
		$.ajax({
			url: '/change_paymentstatus.php',
			type: 'post',
			data: {
				'order_num': $(this).data('id'),
			},
			success: function(msg){
				if (msg == 'success') {
					location.reload();
				}
			}
		})
	});
	$("input[name='order_id[]']").on('change', function(){
		var parent = $(this).parents("section");
		var total = 0;
		parent.find("input[name='order_id[]']:checked").each(function(){
			var person = $(this).parents(".person");
			total += Number(person.find('.p_num').text());
		});
		parent.find(".check_num").text(total);
	});

	$(".check_all").on('click', function(){
		var parent = $(this).parents("section");
		var total = 0;
		$(this).toggleClass("check");

		if ($(this).hasClass("check")) {
			parent.find("input[name='order_id[]']").prop('checked', true);
		} else {
			parent.find("input[name='order_id[]']").prop('checked', false);
		}

		parent.find("input[name='order_id[]']:checked").each(function(){
			var person = $(this).parents(".person");
			total += Number(person.find('.p_num').text());
		});
		parent.find(".check_num").text(total);
	})


});

// 變更訂單狀態
	function changestatus(id, status){
		console.log(id + status);
		$.ajax({
			url: "/chage_orderstatus.php",
			type: "POST",
			data: {
				'id': id,
				'status': status
			},
			success: function(msg){
				if (msg) {
					location.reload();
				}
			}
		})
	}

// 確認付款
	function changepayment(order_num){
		console.log(order_num);
		$.ajax({
			url: "/change_paymentstatus.php",
			type: "POST",
			data: {
				'order_num': order_num
			},
			success: function(msg){
				if (msg) {
					location.reload();
				}
			}
		})
	}

	function change_allorderstatus(item, status){
		var parent = $(item).parents("section");
		var id = [];

		parent.find("input[name='order_id[]']:checked").each(function(){
			id.push($(this).val());
		});

		changestatus(id, status);
	}

	function animate_page(page){
		$("html, body").animate({
			scrollTop: $(page).offset().top
		}, 500);
	}
	
</script>
