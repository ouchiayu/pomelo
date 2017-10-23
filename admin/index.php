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
	<div class="max_width">
		<div class="orders">
			<!-- Nav tabs -->
			<nav>
				<ul>
					<li onclick="animate_page('#order');" class="<?php if($box_total['order'] < 1) echo 'null'; ?>"><i class="icon-order"></i><span><?php echo $box_total['order']; ?></span></li>
					<li onclick="animate_page('#pack');" class="<?php if($box_total['pack'] < 1) echo 'null'; ?>"><i class="icon-pack"><span><?php echo $box_total['pack']; ?></span></i></li>
					<li onclick="animate_page('#ship');" class="<?php if($box_total['ship'] < 1) echo 'null'; ?>"><i class="icon-ship" ><span><?php echo $box_total['ship']; ?></span></i></li>
					<li onclick="animate_page('#arrive');" class="<?php if($box_total['arrive'] < 1) echo 'null'; ?>"><i class="icon-arrive"><span><?php echo $box_total['arrive']; ?></span></i></li>
				</ul>
			</nav>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<?php foreach ($data as $type_code => $type): ?>
					<article class="tab-pane" id="<?php echo $type_code; ?>">
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
											<div class="receiver_header">
												<div class="name"><?php echo $receiver['p_name']; ?></div>
												<?php echo $receiver['p_phone']; ?>
												<?php echo $receiver['p_address']; ?>
											</div>
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

	<?php foreach ($data as $key => $type): ?>
		<section id="<?php echo $key; ?>">
			<?php switch ($key) {
				case 'order':
					echo "<h1>訂單成立</h1>";
					break;

				case 'pack':
					echo "<h1>裝貨中</h1>";
					break;

				case 'ship':
					echo "<h1>運送中</h1>";
					break;

				case 'arrive':
					echo "<h1>已完成</h1>";
					break;
				
				default:
					break;
			} ?>
			
			<div class="order_list">
				<div class="title">
					<div>訂購人</div>
					<div>收件人</div>
					<div>箱數</div>
					<div>金額</div>
					<div>付款方式</div>
					<div>備註</div>
					<?php if ($key != "arrive"): ?>
						<div>已通知</div>
						<div><i class="icon-checkbox check_all"></i></div>
					<?php endif ?>
				</div>
				<?php if (!empty($type)): ?>
					<?php foreach ($type as $order): ?>
						<div class="persons">
							<div class="publick_inf">
								<!-- 訂購人 -->
								<div>
									<?php echo $order['a_name']; ?><br>
									<a href="/search.php?order=<?php echo $order['a_phone']; ?>" target="_blank"><?php echo $order['a_phone']; ?></a><br>
								</div>
							</div>

							<div class="person_inf">
								<?php foreach ($order["orders"] as $i => $person): ?>
									<!-- 收件人 -->
									<div>
										<?php echo $person['p_name']; ?> <?php echo $person['p_phone']; ?><br>
										<?php echo $person['p_address']; ?>
									</div>
									<!-- 箱數 -->
									<div class="p_num"><?php echo $person["p_num"]; ?></div>
									<!-- 金額 -->
									<div><?php echo number_format($person["p_num"] * 1000); ?></div>
									<!-- 付款方式 -->
									<div>
										<?php if ($person["payment_type"] == "cod"): ?>
											貨到付款
										<?php elseif($person["payment_type"] == "atm"): ?>
											<?php switch ($person["payment_status"]) {
												case '0':
													echo "匯款";
													break;
												case '1':
													echo "匯款-等待審核<br>";
													echo $person["atm_bank"]." | ".$person["atm_num"]."<br>";
													echo "<button type='button' onclick='changepayment(".'"'.$person['order_id'].'"'.")'>匯款確認</button>";
													break;
												case '2':
													echo "匯款-已確認<br>";
													echo $person["atm_bank"]." | ".$person["atm_num"];
													break;
												
												default:
													break;
											} ?>
										<?php else: ?>
											<?php switch ($person["payment_status"]) {
												case '0':
													echo "現金付款";
													break;
												case '1':
													echo "現金付款-等待審核<br>";
													echo $person["cash_who"]."<br>";
													echo "<button type='button' onclick='changepayment(".'"'.$person['order_id'].'"'.")'>收款確認</button>";
													break;
												case '2':
													echo "現金付款-已收款<br>";
													echo $person["cash_who"];
													break;
												
												default:
													break;
											} ?>
										<?php endif ?>
									</div>
									<!-- 備註 -->
									<div><?php echo $person["p_msg"]; ?></div>
									<!-- action -->
									<div>
										<?php if ($key == 'order'): ?>
											<button type="button" onclick="changestatus('<?php echo $person["order_id"] ?>', 'pack')">已通知</button>
										<?php elseif($key == 'pack'): ?>
											<button type="button" onclick="changestatus('<?php echo $person["order_id"] ?>', 'ship')">已出貨</button>
										<?php elseif($key == 'ship'): ?>
											<button type="button" onclick="changestatus('<?php echo $person["order_id"] ?>', 'arrive')">已到貨</button>
										<?php endif ?>
									</div>
									<!-- 全選 -->
									<div>
										<?php if ($key != 'arrive'): ?>
											<input type="checkbox" name="order_id[]" value="<?php echo $person["order_id"]; ?>" id="id<?php echo $person["order_id"]; ?>">
											<label for="id<?php echo $person["order_id"]; ?>">
												<i class="icon-checkbox"></i><i class="icon-check"></i>
											</label>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<div class="total">
					<?php if ($key == 'order'): ?>
						訂單成立 <span><?php echo $total[$key]; ?></span> 箱 <label>箱，目前已選取 <span class="check_num">0</span> 箱</label>
						<button type="button" onclick="change_allorderstatus(this, 'pack');">已通知</button>
					<?php elseif($key == 'pack'): ?>
						裝貨中 <span><?php echo $total[$key]; ?></span> 箱 <label>箱，目前已選取 <span class="check_num">0</span> 箱</label>
						<button type="button" onclick="change_allorderstatus(this, 'ship');">已出貨</button>
					<?php elseif($key == 'ship'): ?>
						運送中 <span><?php echo $total[$key]; ?></span> 箱 <label>箱，目前已選取 <span class="check_num">0</span> 箱</label>
						<button type="button" onclick="change_allorderstatus(this, 'arrive');">已到貨</button>
					<?php else: ?>
						已成功售出 <span><?php echo $total[$key]; ?></span> 箱
					<?php endif ?>
				</div>
			</div>
		</section>
	<?php endforeach ?>	
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
