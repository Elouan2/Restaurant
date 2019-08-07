function displayElement()
{
		id = $(this).data('id');

		url = getRequestUrl()+"/element?id="+id;

		$.getJSON(url,function(element){
			$('#name').val(element.name);
			$('#type').val(element.type);
			$('#price').val(element.price);

			$('form').append('<input type="hidden" name="id" value="' + id + '">');
		});
	
}

$(function()
{
	
   	$(document).on('click','#edit',displayElement);
   
}); 