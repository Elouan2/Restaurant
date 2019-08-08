function displayElement()
{
		id = $(this).data('id');

		url = getRequestUrl()+"/element?id="+id;

		$.getJSON(url,function(element){
			$('#name').val(element.name);
			$('#type').val(element.type);
			$('#price').val(element.price);


			if($('form input[type=hidden]').length)
			{
				$('form input[type=hidden]').val(id);	
			}
			else
			{
				$('form').append('<input type="hidden" name="id" value="' + id + '">');
			}
		
		});
	
}

$(function()
{
	
   	$(document).on('click','#edit',displayElement);
   	$('button[type=reset').on('click',function(){
   		$('form input[type=hidden]').remove();
   	})
   
}); 
