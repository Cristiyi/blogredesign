<?php  error_reporting(E_ALL || ~E_NOTICE);  ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>IBM Blogs</title>
	<script>
     digitalData = {
       page: {
         pageInfo: {
           effectiveDate: '',
           expiryDate: '',
           language: 'en-US',
           publishDate: '',
           publisher: 'IBM Corporation',
           version: 'v18',
           ibm: {
             contentDelivery: 'Hand coded',
             contentProducer: 'Hand coded',
             country: 'US',
             industry: 'ZZ',
             owner: 'Scott Farnsworth/Austin/IBM',
             siteID: '',
             subject: '',
             type: ''
           }
         }
       }
     };

  	</script>
	
	<script src="//1.www.s81c.com/common/stats/ida_stats.js">
    </script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet">
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <script>
  		IBMCore.common.util.config.set({
      	masthead: {
          	type: "popup"
        	}
   		});
   		IBMCore.common.util.config.set({
       	footer: { 
          type: "default"
          }
   		});
	</script>
<!-- 	<script>
  		IBMCore.common.util.config.set({
       	footer: { 
          type: "default"
          }
   		});
</script> -->
</head>
<body class="ibm-type" id="ibm-com">
	   

       <?php

            $jsonLocation = realpath(dirname(__FILE__));
            //var_dump($jsonLocation);

            $jsonContent = json_decode(file_get_contents($jsonLocation."\blogs.json"),true);


       ?>
	
		<div id="ibm-masthead" role="banner" aria-label="IBM">
			
			<div id="ibm-universal-nav">		
  			<nav role="navigation" aria-label="IBM">
  				<div id="ibm-home"><a href="http://www.ibm.com/us/en/">IBM®</a></div>
  				<ul id="ibm-menu-links" role="toolbar" aria-label="Site map">
  					<li><a href="http://www.ibm.com/sitemap/us/en/">Site map</a></li>
  				</ul>
  			</nav>
  			</div>
			
    	</div>

    </div>
	

	 <div id="ibm-content-wrapper">
      <header aria-labelledby="ibm-pagetitle-h1" role="banner">
        <div class="ibm-sitenav-menu-container">
          <div class="ibm-sitenav-menu-name">
            <a href="#">IBM Blogs</a>
          </div>
        </div>
        <!-- LEADSPACE_BEGIN -->


        <div class="ibm-alternate-background" id="ibm-leadspace-head" style=
        "background: url('images/writing_in_thought.jpg') no-repeat 0 0 / cover #fff;">
        <div id="ibm-leadspace-body" class="ibm-padding-top-0 ibm-padding-bottom-0">
            <!-- Nav trail -->


            <div class="ibm-columns">
              <div class="ibm-col-5-2 ibm-padding-top-60">
                <h1 class=
                "ibm-h1 ibm-textcolor-gray-80 ibm-medium ibm-bold ibm-padding-bottom-1"
                id="ibm-pagetitle-h1">IBM Blogs</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- LEADSPACE_END -->
      </header>

	  <main role="main" aria-labelledby="ibm-pagetitle-h1">
	  	
		<div id="ibm-pcon">
          <div id="ibm-content">
            <div id="ibm-content-body">
              <div id="ibm-content-main">

				<form id="" class="ibm-row-form" method="post" action="">
					<div class="ibm-columns">
        				<div class="ibm-col-6-1">
        					<p class="ibm-form-elem-grp">
                				<label>Blog Type</label>
                				<span>
                    				<select id="blogtype">
                                        <?php 
                                            
                                            $newtype = array();
                                            foreach($jsonContent as $blog) {
                                                $type = $blog['value']['targetAudience'];
                                                array_push($newtype,$type);
                                                
                                            }
                                            $blogtype = array_unique($newtype);

                                            foreach($blogtype as $blogtype) {
                                                echo '<option value='.$blogtype.'>'.$blogtype.'</option>';
                                            }

                                        ?>
                    				</select>
                				</span>
            				</p>
        				</div>
        				<div class="ibm-col-6-1">
        					<p class="ibm-form-elem-grp">
                				<label>Language</label>
                				<span>
                    				<select id="bloglanguage">
                        				<?php 
                                            
                                            $newlanguage = array();
                                            foreach($jsonContent as $blog) {
                                                $language = $blog['value']['language'];
                                                array_push($newlanguage,$language);
                                                
                                            }
                                            $bloglanguage = array_unique($newlanguage);

                                            foreach($bloglanguage as $bloglanguage) {
                                                echo '<option value='.$bloglanguage.'>'.$bloglanguage.'</option>';
                                            }

                                        ?>
                    				</select>
                				</span>
            				</p>
        				</div>
        			</div>
				</form>
				
				<div class="ibm-columns middle-content">
                
<?php
                $displayedBlogCount = 0;
                foreach($jsonContent as $blogData)
                {
                  if($blogData['value']['blogName'] != '')
                  {
                    $displayedBlogCount++;
                  }
                }
                
                if($displayedBlogCount > 0) {
               
                echo '<div class="ibm-col-4-1">';            
                echo '<div class="mg-top">';

                $added = 1;


                                            
                                $newcategory = array();
                                foreach($jsonContent as $blog) {
                                    $category = $blog['value']['pageCategory'];
                                    array_push($newcategory,$category);
                                                
                                }
                                $blogcategory = array_unique($newcategory);

                                $count = count($blogcategory);


                                foreach($blogcategory as $blogcategory) {


                                    if($added%6===0 && $count > $added ) {
                                          echo '</div></div><div class="ibm-col-4-1"><div class="mg-top">';
                                    }  
                                    echo '<div class="ibm-h4 ibm-bold mg-bt">'.$blogcategory.'</div>';
                                    $added++;
                                    foreach($jsonContent as $blog) {
                                    $category = $blog['value']['pageCategory'];
                                    $blogName = $blog['value']['blogName'];
                                    $pagetype = $blog['value']['targetAudience'];
                                    $pagelanguage = $blog['value']['language'];

                                    if($category == $blogcategory) {  

                                    echo '<div class="mg-bt blogs">';
                                    echo '<a href="" name='.$pagelanguage.' class='.$pagetype.'><span class="ibm-textcolor-default">'.$blogName.'</span></a>';
                                    echo '</div>'; 
                                    
                                    } 

                                  }    
                                }echo '</div></div>';
               }
               
                          ?>


<script type="text/javascript">
  
jQuery(function($) {


$('.ibm_only').hide();
$('.under_development').hide();
console.log($('a').attr('class'));

$('#blogtype').change(function() {

    

    if($('#blogtype').children('option:selected').val() == 'public_company')  {
      $('a').hide();
      $('.public_company').show();
        // console.log(that);
    } else if($('#blogtype').children('option:selected').val() == 'Public') {
      $('a').hide();
      $('.Public').show();
    } else if($('#blogtype').children('option:selected').val() == 'ibm_only') {
      $('a').hide();
    } else if($('#blogtype').children('option:selected').val() == 'default') {
      $('a').hide();
      $('.default').show();
    } else if($('#blogtype').children('option:selected').val() == 'public_personal') {
      $('a').hide();
      $('.public_personal').show();
    } 
    else if($('#blogtype').children('option:selected').val() == 'under_development') {
      $('a').hide();
    } 
  
})

$('#bloglanguage').change(function() {

    console.log($('#bloglanguage').children('option:selected').val())
    console.log($('.under_development'));

    if($('#bloglanguage').children('option:selected').val() == 'en-US')  {
      $('a').hide();
      $("a[name='en-US']").show();
    } else if($('#bloglanguage').children('option:selected').val() == 'Danish') {
      $('a').hide();
      $("a[name='Danish']").show();
    } else if($('#blogtype').children('option:selected').val() == 'Japanese') {
      $('a').hide();
      $("a[name='Japanese']").show();
    } else if($('#blogtype').children('option:selected').val() == 'Norwegian') {
      $('a').hide();
      $("a[name='Norwegian']").show();
    } else if($('#blogtype').children('option:selected').val() == 'Spanish') {
      $('a').hide();
      $("a[name='Spanish']").show();
    } 
    else if($('#blogtype').children('option:selected').val() == 'Swedish') {
      $('a').hide();
      $("a[name='Swedish']").show();
    } 
  
})


// $('a').each(function() {

//   var that = $(this);

//   $('#blogtype').change(function() {

//     if($('#blogtype').children('option:selected').val()!=that.attr('name')) {
//       that.show();
//       $('a').not(that).hide();
//     }

//   })

// })

})

</script>

                       




            </div>
		  </div>	
        </div>

	  </main>


<!-- 	<div id="ibm-footer-module">
  	</div> -->

  	<footer aria-label="IBM" role="contentinfo">
  		
    	<div id="ibm-footer">
    	</div>
    </footer>

</div>

      
</body>
</html>