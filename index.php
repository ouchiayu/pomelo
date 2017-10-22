<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/index.css">

<div class="search-block">
	
	<div class="search-form collapse" id="search-form">
		<form action="search.php" method="get" class="max-width" accept-charset="utf-8">
			<div class="title">請輸入訂購人手機</div>
			<div>
				<div class="field-group">
					<input type="tel" name="order" value="" placeholder=""><button type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</div>
		</form>
	</div>

	<div class="max-width text-right"><div data-toggle="collapse" data-target="#search-form" class="search-btn glyphicon glyphicon-search"></div></div>
</div>
<div class="max-width">
	<div>
		<header id="header" class="">
			<h1>鶴岡紅柚</h1>
			<div class="owl-carousel">
				<div>花蓮鶴岡老欉紅柚 <br>一箱 20 斤，含運費，$ 1,000<br>暫定 10/28 </div>
				<div>搶先預購的每箱都有抽中免費一箱紅柚的機會喔！</div>
				<div>使用匯款或現金付款方式的人記得要去訂單查詢那填寫付款資訊</div>
				<div>有任何紅柚的問題歡迎來電，0928102291，會有已婚專員為您服務</div>
				<div>有任何網站上的操作問題歡迎來電，0928806748，會有未婚專員為您解答</div>
			</div>
		</header><!-- /header -->

		<main class="order">
			<form id="order-form" action="add_order.php" method="post" accept-charset="utf-8">
				<h2>訂購單</h2>

				<section class="form-group">
					<h3>訂購人</h3>
					<article>
						<div class="col-block havmargin">
							<div class="col-b-2">
								<div class="field-group">
									<input class="field" type="text" name="p_name" value="" placeholder="" required>
									<div class="fieldname">姓名</div>
								</div>
							</div>
							<div class="col-b-2">
								<div class="field-group">
									<input class="field" type="phone" name="p_phone" value="" placeholder="" required>
									<div class="fieldname">手機</div>
								</div>
							</div>
						</div>
					</article>
				</section>

				<section class="form-group receiver-group">
					<h3>收件人</h3>
					
					<?php include 'receiver.php'; ?>
				</section>

				<section class="add-receiver">
					新增收件人
				</section>
				
				<section class="order-footer">
					<div class="col-block">
						<div class="col-2">
							<button type="button" class="btn btn-sub" onclick='$("#order-form").clearForm();'>重新填寫</button>
						</div>
						<div class="col-2">
							<button type="submit" class="btn btn-main">立馬預購</button>
						</div>
					</div>
				</section>
			</form>
		</main>
	</div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
	$(function(){
		$('.owl-carousel').owlCarousel({
			responsive: {
				0: {
					items: 1
				},
				769: {
					items: 5
				}
			}
		});

		settwzipcode($('.twzipcode'));

		$(".receiver-group").find("article").each(function(){
			var receiver = $(this);
			var num = $(this).data('num');

			receiver.find('[name="[payment]"]').each(function(index, el) {
				var id = $(this).attr('id');
				$(this).attr("id", id+num);
				$(this).next("label").attr('for', id+num);
			});

			receiver.find("[name]").each(function(){
				var inputname = $(this).attr("name");
				$(this).attr("name", 'receiver['+num+']'+inputname);
			})

		})

		// 新增收件人
		$(document).on("click", ".add-receiver", function(){
			$.get('receiver.php', function(data) {
				var newreceiver = $(data);
				var num = parseInt($(".receiver-group").find("article").last().data('num')) + 1;

				settwzipcode(newreceiver.find(".twzipcode"));
				
				newreceiver.data('num', num);

				newreceiver.find('[name="[payment]"]').each(function(index, el) {
					var id = $(this).attr('id');
					$(this).attr("id", id+num);
					$(this).next("label").attr('for', id+num);
				});
				
				newreceiver.find("[name]").each(function(){
					var inputname = $(this).attr("name");
					$(this).attr("name", 'receiver['+num+']'+inputname);
				})

				$(".receiver-group").append(newreceiver);
			});
		});

		$("#order-form").validate({
			rules:{
				p_name: {
					special: true
				},
				p_phone: {
					number: true
				},
				a_name: {
					special: true
				},
				a_phone: {
					number: true
				},
				'address[0]': {
					required: true
				},
				'address[1]': {
					required: true
				},
				'address[2]': {
					special: true
				},
				'address[3]': {
					special: true
				},
				'address[4]': {
					special: true
				},
				'address[5]': {
					phoneNumber: true
				},
				'address[6]': {
					phoneNumber: true
				},
				'address[7]': {
					phoneNumber: true
				},
				'address[8]': {
					phoneNumber: true
				},
				'address[9]': {
					special: true
				},
				'num': {
					number: true,
					min: 1
				},
				msg: {
					special: true
				}
			},
			errorPlacement: function(error, element){
				element.parent().append(error);
			}
		});


		// count
		$(document).on("click", ".plus, .less", function(){
			var receiver = $(this).parents(".shop-info");
			var num_input = receiver.find('.qty input');
			var num_val = parseInt(num_input.val());

			if ($(this).hasClass('plus')) {
				num_input.val(num_val+1);
			} 
			if ($(this).hasClass('less')) {
				num_input.val(num_val-1);
			}

			cnttotal(receiver);
		});

		$(document).on("change", ".qty input", function(){
			var receiver = $(this).parents(".shop-info");
			cnttotal(receiver);
		});

		$(document).on("click", ".del_btn", function(){
			$(this).parent().remove();
		})

	})

function settwzipcode(data){
	data.twzipcode({
		// detect: true
	});
}

function cnttotal(receiver){
	var num = parseInt(receiver.find('.qty input').val());
	var price_b = receiver.find('.total .price');

	price_b.text(numeral(num*1000).format('0,0'));
}

</script>