/*
     * THIS WILL REVEAL THE PREVIEW DETAIL PAGE CONTENT
     * ========================================================================
     */
$(document).on("click",".view-short-details",function(){
    var id = this.getAttribute("id");
    var $item_img = $(".item-slick3");
   var item_img = document.querySelectorAll(".image-partial-detail");
   $.ajax({
       type: "GET",
       url: global_url+"home/immidiate_view?id="+id,
       success: function (response) {
           var data = JSON.parse(response);
           for (let index = 0; index < data.length; index++) {
               var data_item = data[index].file_name;
            console.log(data_item);
            for (let index = 0; index < item_img.length; index++) {
                let content = item_img[index];
                content.setAttribute("src",""+global_url+"assets/prod_img/"+data_item);
                content.setAttribute("href",""+global_url+"assets/prod_img/"+data_item); 
                content.setAttribute("data-thumb",""+global_url+"assets/prod_img/"+data_item);
                    
            }
            var str = data[index].description;
            var splice_string = str.slice(0,50);
            $(".product-header").html(""+data[index].prod_name+"");
            $(".description-product").html(""+splice_string+"...");
            $(".price-product").html(""+data[index].currency+""+data[index].price+"");
           $(".slick3-dots li img").attr("src",""+global_url+"assets/prod_img/"+data_item);
           $(".buy_area").attr("href", ""+global_url+""+"home/buy-products/"+data[index].id+"");
           }   
        }
   });
});

/*
     * THIS ADDS REVIEWS FOR EACH PRODUCT 
     * ========================================================================
     */
 $(document).on("click", "#btn_products_buy", function(){
  $name = $("#name").val();
  $email = $("#email").val();
  $phone = $("#phone").val();
  $location = $("#location").val();
  $id = $("#user_id").val();
  $("#content_response").html("<b class='alert alert-danger'>loading....</b>");
   var form_data = new FormData();
   form_data.append("name", $name);
   form_data.append("email", $email);
   form_data.append("phone", $phone);
   form_data.append("location", $location);
   form_data.append("id", $id);
   $.ajax({
       type: "POST",
       url: global_url+"buy_products/add_purchase",
       data: form_data,
       processData: false,
       contentType: false,
       success: function (response) {
        $("#content_response").html("<b class='alert alert-danger'>"+response+"</b>");
       }
   });
 });