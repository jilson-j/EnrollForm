<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>


<div class="container register-form">
<br><br>
            <div class="form">
                <div class="note">
                    <p>Enroll Form</p>
                </div>
                <form id="enrollform">
                <center><div class="form-group">
            <b><span class="text-success" id="success-message"> </span><b>
        </div></center>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                    
                            <div class="form-group">
                            <label>Name</label>
                                <input type="text" class="form-control" placeholder="Your Name *" id="name" name="name"value=""/>
                            </div>
                            <div class="form-group">
                            <label>Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone Number *"   id="mobile_number" name="mobile_number"value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                        
                            <div class="form-group">
                            <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email"  name="email" id="email"value=""/>
                            </div>
                            <div class="form-group">
                            <label>BASIC</label>
                                <input type="text" class="form-control basic" placeholder="BASIC " value="10000" name="basic" id="basic" />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>HRA</label>
                                <input type="text" class="form-control hra" placeholder="HRA"  name="hra" id="hra" value="2000"/>
                            </div>
                            <div class="form-group">
                            <label>Special Allowance</label>
                                <input type="text" class="form-control special" placeholder="Special Allowance"  name="special"  id="special"value="3000"/>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                            <label>PF</label>
                                <input type="text" class="form-control pf" placeholder="PF"  value="1500" name="pf" id="pf"/>
                            </div>
                            <div class="form-group">
                            <label>total</label>
                                <input type="text" class="form-control total" placeholder=""  value="" name="total" id="total" readonly/>
                            </div>
                        
                            
                        </div>
                       
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                </div>
                </form>
            </div>
        </div>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">
$(document).ready(function(){

$(".special").keyup(function(){
    total = (parseInt($(".basic").val()) + parseInt($(".special").val())+ parseInt($(".hra").val()))- parseInt($(".pf").val());
   
    $(".total").val(total);
});
$(".pf").keyup(function(){
    total = (parseInt($(".basic").val()) + parseInt($(".special").val())+ parseInt($(".hra").val()))- parseInt($(".pf").val());
  
    $(".total").val(total);
});
 
});


    $('#enrollform').on('submit',function(event){
        event.preventDefault();

        let name = $('#name').val();
        let email = $('#email').val();
        let mobile_number = $('#mobile_number').val();
        let basic = $('#basic').val();
        let hra = $('#hra').val();
        let special = $('#special').val();
        let pf = $('#pf').val();
        
        $.ajax({
          url: "/enroll",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            email:email,
            mobile_number:mobile_number,
            basic:basic,
            hra:hra,
            special:special,
            pf:pf,
           
          },
          success:function(response){
            $('#success-message').text(response.success);
            $('#enrollform')[0].reset();
          },
         });
        });
      </script>