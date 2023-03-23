$(function(){
    $('.goodde-yandexturbo-list').each(function(){
        var holder = $(this);
        var reset = holder.next('.reset');
        var parents = $('.parent', holder);
        var allInputs = $('input', holder);

        parents.each(function(){
            var parent = $(this);
            var list = parent.siblings('ul');
            var input = parent.siblings('input[type=checkbox], input[type=radio]');
            var inputChilds = $('input', list);

            parent.click(function(event) {
                list.slideToggle();
            });
            if(input.is(':checked')){
                list.slideToggle();
            }
            input.change(function(event){
                if(input.is(':checked')){
                    inputChilds.attr('checked', 'checked');
                    list.slideDown();
                }else{
                    inputChilds.removeAttr('checked');
                    list.slideUp();
                }
            });
        });

        reset.click(function(event){
            allInputs.removeAttr('checked');
        });

        allInputs.each(function(index, el) {
            var ths = $(this);
            ths.change(function(event){
                if(ths.is(':checked')){
                    ths.parents('li', holder).find('>input').attr('checked', 'checked');
                }
            });
        });
    });
	
	formActions = function(){
		$('[data-clone-container]').each(function(){
			var holder = $(this);
			var template = $('[data-form-block-template]', holder);
			var block = $('[data-form-block]', holder);
			var target = $('[data-block-target]', holder);
			var init = $('[data-add-more]', holder);
			var counter = block.length;
			function resetBlocks(){
				block.each(function(index, el) {
					if($(this).data('js-set') == true){
						return;
					}
					$(this).data('js-set', true);

					var ths = $(this);
					var remove = $('[data-remove]', ths);
					var similarInit = $('[data-similar-init]', ths);
					var similarInput = $('[data-similar-input]', ths);

					similarInit.change(function(event){
						similarInput.hide().eq($('option:selected', similarInit).index()).show();
					}).trigger('change');

					remove.click(function(event){
						if(remove.data('remove') == 'static'){
							ths.addClass('disabled');
						}else{
							ths.remove();
						}
					});
				});
			}
			resetBlocks();

			init.click(function(event){
				event.preventDefault();
				var clone = template.clone().removeClass('template').insertBefore(target);
				
				$('select', clone).eq(0).attr('name', 'FEEDBACK[TYPE]['+counter+'][STICK]');
				$('select', clone).eq(1).attr('name', 'FEEDBACK[TYPE]['+counter+'][PROVIDER_KEY]');
				$('[data-similar-input]', clone).each(function(index, el) {
					$('input', $(this)).attr('name', 'FEEDBACK[TYPE]['+counter+'][PROVIDER_VALUE]['+index+']');
				});

				block = $('[data-form-block]', holder);
				counter++;
				resetBlocks();
			});
		});
	}
	formActions();
});