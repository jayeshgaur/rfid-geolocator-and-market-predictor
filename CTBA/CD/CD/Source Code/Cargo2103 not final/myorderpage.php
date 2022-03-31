<html>


<style type="text/css">

.ee {
border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
font-size: 24px;
padding: 5px;
border-radius: 6px;
display: inline-block;
width: 15%;
margin-top: 70px;
}

.add_product
{

  border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
font-size: 24px;
padding: 5px;
border-radius: 6px;
display: inline-block;
width: 15%;
}

.ee:hover 
{
color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: #f9fffc;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}

.add_product:hover
{
  color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: #f9fffc;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;

}

select {
    float: left;
    clear: both;
    width: 120px;
    margin: 0 0 10px 0;
}

#newdiv {
    margin-top: 25px;
    
}

#weightbox
 {
  margin-left: 10px;
  
 }

 #container
 {
  margin-left: 10px;
  
 }

</style>

<body>
<div id="order" class="container-fluid">
  <div class="text-center">
    <h4>Just a step away from hustle free Shipping.</h4>
    <h4>Enter the following details!</h4>
    <div class="row slideanim">
      <form method="POST">
            <label style="width:15%;">Email id:</label> <input name="email" type="email" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="example@mail.com"/><br><br>
            <label style="width:15%;">Source:</label> <input name="source" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;"  placeholder="India"/><br><br>
            <label style="width:15%;">Destination:</label> <input name="destination" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Japan"/><br><br>
       <!--      <label style="width:15%;"> Cargo Type:</label> <select name="cargo_type"  style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
               
               <option >Electronics</option>
    <option >Home Appliances</option>
    <option> Men's Clothing  </option> 
    <option>Women's Clothing</option>
    <option>Kids Collection</option>
    <option>Books</option>
    <option>Hardware</option>
    <option>Construction supplies</option>
    <option>Grocery Store</option>
    <option>Cosmetics</option>
    <option>Cereal store</option>
    <option>GYM equipments</option>
    <option>Sports</option>
    <option>Shoes</option>
    <option>Vehicles</option>

      </select>

              <br><br>
            <label style="width:15%;">Weight:</label> <input name="weight" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;"  placeholder="in KGs"/><br><br> -->


            <div align="center"> <button class="add_product" id="add_productbt">Add Product</button></div>

            <div id ="newdiv"></div>
            
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
 
            <script type="text/javascript">
              var counter = 0;
              var countercontainer = 0;
              $(function()
                {
                  $('#add_productbt').click(function(e)
                    {
                       e.preventDefault();
                       $('#newdiv').append('<select name="optionbox' + ++counter +' " id="xyz">'+
                       '<option value ="Electronics" >Electronics</option>'+
                       '<option value ="Home Appliances" >Home Appliances</option>'+
                       '<option value ="Womens Clothing" >Womens Clothing</option>'+
                       '<option value = "Kids Collection">Kids Collection</option>'+
                       '<option value ="Books">Books</option>'+
                       '<option value ="Hardware">Hardware</option>'+
                       '<option value = "Construction supplies">Construction supplies</option>'+
                       '<option value = "Grocery Store">Grocery Store</option>'+
                       '<option value = "Cosmetics">Cosmetics</option>'+
                       '<option value = "Cereal store">Cereal store</option>'+
                       '<option value ="GYM equipments">GYM equipments</option>'+
                       '<option value = "Sports">Sports</option>'+
                       '<option value ="Shoes">Shoes</option>'+
                       '<option value = "Vehicles">Vehicles</option>'+
                       '</select>' +

                       '<input type="number" name="' + ++countercontainer +'" id="' + countercontainer +'" placeholder="Quantity" onkeyup="calculate(this)">' + 
                       '<input type="text" name="total' + countercontainer +'" id="total' + countercontainer +'" placeholder="Number of containers" > <br>' );


   });
});

              	function calculate(self) {
                    var number = self.name;
              			var weightid = 'weight' + self.name +'';
                    var containerid = 'total' + self.name + '';
                    var weight = document.getElementById(number).value;
                    var num = Math.ceil(weight / 500) ;
                    console.log(num);
                    var change = document.getElementById('total' + self.name + '');
                    change.value = num; 
  
	}


            
            </script>
       <div align="center"> <button class="ee" formaction="neworder.php">Submit</button></div>
      </form>
    </div>
  </div>
</div>

</body></html>