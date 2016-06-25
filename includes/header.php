
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: OIC
Author: <a href="http://www.oic.edu.np">Orchid International College</a>
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Orchid International College</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/menu.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/style.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/script.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        pager: '#fs_pagination',
        pause: 1,
        pauseOnPagerHover: 0
    });
});
</script>

<!-- Homepage Only Scripts -->
<script type="text/javascript" src="layout/scripts/jquery.cycle.min.js"></script>

<script type="text/javascript">
$(function(){ /* to make sure the script runs after page load */

	$('.item').each(function(event){ /* select all divs with the item class */
	
		var max_length = 0; /* set the max content length before a read more link will be added */
		
		if($(this).html().length > max_length){ /* check for content length */
			
			var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
			var long_content	= $(this).html().substr(max_length);
			
			$(this).html(short_content+
						 '<a href="#" class="read_more"><br/>Read More</a>'+
						 '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */
						 
			$(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */
 
				event.preventDefault(); /* prevent the a from changing the url */
				$(this).hide(); /* hide the read more button */
				$(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
		 
			});
			
		}
		
	});
 
 
});

</script>


<!-- End Homepage Only Scripts -->
</head>