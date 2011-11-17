
<h1>$Title</h1>
$Content

<h2>Ordinary Images</h2>
<% if Images %>
  <div id="gallery">

		<% control Images %>
		
			<div style="float: left; padding: 4px;">
			    <a rel="image-gallery" href="$ResizedFileName" title="$Caption" style="margin-bottom:5px;">
			      $Image.SetRatioSize(150,150)
			    </a>
			</div>
		  
			<% if MultipleOf(4) %>
			  <div style="clear:both;"></div>
			<% end_if %>
		
		<% end_control %>

  </div>
<% end_if %>

<div style="clear:both;"></div>

<h2>Paginated Images</h2>

<% if PaginatedImages %>
  <div id="gallery">

    <% control PaginatedImages %>
    
      <div style="float: left; padding: 4px;">
          <a rel="image-gallery" href="$ResizedFileName" title="$Caption" style="margin-bottom:5px;">
            $Image.SetRatioSize(150,150)
          </a>
      </div>
      
      <% if MultipleOf(4) %>
        <div style="clear:both;"></div>
      <% end_if %>
    
    <% end_control %>

  </div>
<% end_if %>

<% if PaginatedImages.MoreThanOnePage %>
  <p>
	  <% control PaginatedImages.Pages %>
	    <% if CurrentBool %>
	      <strong>$PageNum</strong> 
	    <% else %>
	      <a href="$Link" title="Go to page $PageNum">$PageNum</a> 
	    <% end_if %>
	  <% end_control %>
  </p>
<% end_if %>

<div style="clear:both;"></div>