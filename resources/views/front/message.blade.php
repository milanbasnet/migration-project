<div class="message" >
    <i class="fa fa-commenting-o" aria-hidden="true" onclick="messageClickFuntcion()"></i>
    <div class="message-popup" id="mpu">
      <form action=""  id="messageId"> 
        @csrf
        <h4 class="msgtitle">How can we help you?</h4>
        <input id="message" class="input-message" type="text" name="message" placeholder="Enter Message">
          <button class="message-btn" id="submit" type="submit">Send</button>
      </form>
      <span onclick="document.getElementById('mpu').style.display='none'">
        <button class="w3-button">&times; </button>
        </span>
      <script>
        function messageClickFuntcion(){
          document.getElementById("mpu").style.display="block";
        }
      </script>
      <script>
        
      </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

        <script type="text/javascript">
     
         $('#messageId').on('submit',function(event){
             event.preventDefault();

             let message = $('#message').val();
     
             $.ajax({
               url: "{{route('message')}}",
               type:"POST",
               data:{
                 "_token": "{{ csrf_token() }}",
              
                 message:message,
               },
               success:function(response){
                 console.log(response)
                 $('#mpu').hide();
               },
              });
             });
           </script>
    </div>
  </div>