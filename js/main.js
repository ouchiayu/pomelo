$(function(){
	// input 效果
	$(document).on("change", "input", function(){
		if ($(this).val()) {
			$(this).next(".fieldname").addClass("on");
		}else{
			$(this).next(".fieldname").removeClass("on");
		}
	})

	// 驗證格式
	// 特殊字元
	$.validator.addMethod("special", function(value, e) {
		return this.optional(e) || !/[\~\`\!\@\#\$\%\^\&\*\_\+\=\{\}\[\]\|\\\"\?\/\<\>\;\:]/.test( value );
	}, "請勿輸入特殊字元");

	$.validator.addMethod("phoneNumber", function(value, e) {
		return this.optional(e) || /[0-9\-\(\)\s]+/.test( value );
	}, "格式錯誤");

})