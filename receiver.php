<article data-num="1">
	<div class="del_btn glyphicon glyphicon-remove"></div>
	<div class="receive-info">
		<div class="col-block havmargin">
			<div class="col-b-2">
				<div class="field-group">
					<input class="field" type="text" name="[a_name]" value="" placeholder="" required>
					<div class="fieldname">姓名</div>
				</div>
			</div>

			<div class="col-b-2">
				<div class="field-group">
					<input class="field" type="phone" name="[a_phone]" value="" placeholder="" required>
					<div class="fieldname">手機</div>
				</div>
			</div>
		</div>
		<div class="col-block">
			<div class="col-b-2">
				<div class="twzipcode">
					<div class="col-block">
						<div class="col-3">
							<div class="select-group" data-role="county" data-name="[address][0]"></div>
						</div>
						<div class="col-3">
							<div class="select-group" data-role="district" data-name="[address][1]"></div>
						</div>
						<div class="col-3">
							<div class="field-group">
								<input class="field" type="text" name="[address][2]" value="" placeholder="">
								<div class="fieldname">里村</div>
							</div>
						</div>
						<div class="zipcode" data-role="zipcode" data-name="[zipcode]"></div>
					</div>
				</div>
			</div>
			<div class="col-b-2">
				<div class="field-group address-group">
					<div class="address">
						<div class="road road-4">
							<input class="field" type="text" name="[address][3]" required>
							<div class="road-type">路/街</div>
						</div>
						<div class="road road-2">
							<input class="field" type="text" name="[address][4]">
							<div class="road-type">段</div>
						</div>
						<div class="road road-2">
							<input class="field" type="text" name="[address][5]">
							<div class="road-type">巷</div>
						</div>
						<div class="road road-2">
							<input class="field" type="text" name="[address][6]">
							<div class="road-type">弄</div>
						</div>
						<div class="road road-2">
							<input class="field" type="text" name="[address][7]" required>
							<div class="road-type">號</div>
						</div>
						<div class="road road-2">
							<input class="field" type="text" name="[address][8]">
							<div class="road-type">樓</div>
						</div>
						<div class="road">
							<input class="field" type="text" name="[address][9]">
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div class="col-block">
			<div class="col-b-2">
				<div class="radio-group">
					<div class="title">付款方式</div>
					<div class="col-block">
						<div class="option col-3">
							<input type="radio" name="[payment]" id="cod" value="cod" checked>
							<label for="cod">貨到付款</label>
						</div>
						<div class="option col-3">
							<input type="radio" name="[payment]" id="atm" value="atm">
							<label for="atm">匯款</label>
						</div>
						<div class="option col-3">
							<input type="radio" name="[payment]" id="cash" value="cash">
							<label for="cash">現金支付</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-b-2">
				<div class="textarea-group">
					<div class="title">備註</div>
					<textarea name="[msg]"></textarea>
				</div>
			</div>
		</div>	
	</div>
	<div class="shop-info">
		<div class="qtymodal">
			<div class="qty">
				<input type="tel" name="[num]" value="1" required>
				<div class="title">箱</div>
			</div>
			<div class="qty-controler">
				<div class="plus">+</div>
				<div class="less">-</div>
			</div>
		</div>
		<div class="total"><div class="currency">$</div><div class="price">1,000</div></div>
	</div>
</article>
