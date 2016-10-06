<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/main.css')}}">
</head>
<body>
@include('includes.header')

	<div class="container">
		@yield('content')
	</div>
	<script src="http://code.jquery.com/jquery-1.9.0rc1.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.0.0rc1.js"></script>
    
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
    var postId=0;
    var postBodyElement=null;
    
    	$('.post').find('.interaction').find('.edit').on('click',function(event)
    	{
    		event.preventDefault();

             postBodyElement=event.target.parentNode.parentNode.childNodes[1];

                 var postBody=postBodyElement.textContent;

                 postId=event.target.parentNode.parentNode.dataset['postid'];
                 $('#post-body').val(postBody);
               $('#edit-modal').modal();  

    	});
    	$('#modal-save').on('click',function()
    	{
    		$.ajax({
    			method:'POST',
    			url:url,
    			data:{body: $('#post-body').val(),postId:postId,_token:token}

    		})
    		.done(function(msg){
    			$(postBodyElement).text(msg['new_body']);
                $('#edit-modal').modal('hide');
    		});
    	});

    $('.like').on('click',function(event)
    {
        
        event.preventDefault();
        postId=event.target.parentNode.parentNode.dataset['postid'];
        var isLike=event.target.previousElementSibling==null ? true:false;
        $.ajax({
            method:'POST',
            url:urlLike,
            data:{isLike:isLike,postId:postId,_token:token}
        })
        .done(function(){
            event.target.innerText=isLike ? event.target.innerText == 'Like' ? 'you like this post':'Like':event.target.innerText=='Dislike' ? 'you dont like this post':'Dislike'; 
            if(isLike)
            {
                event.target.nextElementSibling.innerText='Dislike';
            }
            else
            {
                event.target.previousElementSibling.innerText='Like';
            }
        });
    });
</script>
		
</body>
</html>
