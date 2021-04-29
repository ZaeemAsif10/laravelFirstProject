 <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
     <section>
  <ul id="services">
   
    <li>
      <div class="facebook">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="twitter">
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="youtube">
        <a href="#">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="instagram">
        <a href="#">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="github">
        <a href="#">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </li>
  </ul>
  
</section>
    </div>
    <div class="paddingTop10px">
    <strong>Copyright &copy; 2021 <a href="">Talha Usman (Pvt) Ltd</a></strong>. All rights
    reserved.
    </div>
  </footer>
 

<div class="container no-print">
	<div class="row">
	 <div id="Smallchat">
    <div class="Layout Layout-open Layout-expand Layout-right" style="background-color: #00a157;color: rgb(255, 255, 255);opacity: 5;border-radius: 10px;">
      <div class="Messenger_messenger">
        <div class="Messenger_header" style="background-color: #00a157; color: white;">
           <span class="chat_close_icon"><i class="fas fa-times"></i></span> </div>
        <div class="Messenger_content">
          <div class="Messages">
            <div class="Messages_list">
			 <img class="chat-img" src="https://cdn3.iconfinder.com/data/icons/toolbar-people/512/call_center_phone_telephone_mobile-512.png" height="70" width="70">
			 <h3>Salman Raza</h3>
			 <p>Looking for help? Contact me now I will surely help you.</p>
			 <a href="tel:+923326775000" ><button class="call-button"><h4><span class="call_icon"><i class="fas fa-phone-alt"></i></span><b> +92 333 4636416</b></h4></button></a>
			
			</div>
          </div>
        </div>
      </div>
    </div>
    <!--===============CHAT ON BUTTON STRART===============-->
    <div class="chat_on"> <span class="chat_on_icon"><i class="fas fa-phone-alt"></i></span> </div>
    <!--===============CHAT ON BUTTON END===============-->
  </div>
	</div>
</div>
        
          </div>
        </div>
      </section>
      </div>
   
<script>

// Call BOOT////////////////////////


$(document).ready(function(){
    $(".chat_on").click(function(){
        $(".Layout").toggle();
        $(".chat_on").hide(300);
    });
    
       $(".chat_close_icon").click(function(){
        $(".Layout").hide();
           $(".chat_on").show(300);
    });
    
});
</script>


<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
	
	$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
	})
	
	</script>
	
<!-- DataTables -->
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->


<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>



    <!-- Bootstrap -->
   <script type="text/javascript" src="{{asset('assets/js/jquery.exit-modal.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            var exitModalParams = {
                numberToShown: 1
            }
			
                $('.exit-modal').exitModal(exitModalParams);
                
            $('.close-exit-modal').on('click', function(e){
                e.preventDefault();
                $('.exit-modal').exitModal('hideModal');
            });

        });

    </script>
</body>
</html> 
  
  

