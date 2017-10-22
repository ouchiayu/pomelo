$(function(){
	var editor_html = [
		{
			type: 'title',
			value: '',
			css: {}
		}
	];

	$(".font_size").on("change", function(){
		var size = $(this).val();
		$(".editor .active").css('font-size', size+'px');
		editor_html[0]['css']['font-size'] = size;
		console.log(editor_html);
	})

	$(".colorPickSelector").colorPick({
		'onColorSelected': function(){
			$(".editor .active").css('color', this.color);
			editor_html[0]['css']['color'] = this.color;
			console.log(editor_html);
		}
	});

	$(".fa-bold").on("click", function(){
		$(this).toggleClass("active");

		if (!$(this).hasClass("active")) {
			$(".editor .active").css('font-weight', 'normal');
			editor_html[0]['css']['font-weight'] = 'normal';
			console.log(editor_html);
		}else{
			$(".editor .active").css('font-weight', 'bold');
			editor_html[0]['css']['font-weight'] = 'bold';
			console.log(editor_html);
		}
	})

	$(".editor.edit .editor_block div").on("click", function(){
		var block = $(this);
		console.log(block);
		$(".editor.edit .editor_block div").each(function(){
			$(this).removeClass("edit");
		}, function(){
			block.addClass("edit");
		})
	})
})