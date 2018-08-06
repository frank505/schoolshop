/*THIS FILE WAS CREATED BY AKPU FRANKLIN CHIMAOBI*/ 
/*
     * THIS ADDS A NEW CATRGORY 
     * ========================================================================
     */

var url = global_url;
$("#add_category").on("click",function(){
    var this_btn = this;
    $category = $("#cat_text_area").val();
    this_btn.disabled="true";
    $(".validation").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>Loading...</b></center>")
     $.ajax({
         type: "POST",
         url: global_url+"admin_categories/add" ,
         data: "cat="+$category,
         success: function (response) {
             $(".validation").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;"+response+"</b></center>");
             this_btn.disabled=false;
         },
         
     });
})

 /*
     * THIS BUTTON IS TO DELETE A CATEGORY  
     * ========================================================================
     */

 $(".delete_cat_btn").on("click",function(){
     var this_btn = this;
      var id_delete = this.getAttribute("delete-id");
     $.ajax({
         type: "GET",
         url: global_url+"admin_categories/delete_categories?id="+id_delete,
         success: function (response) {
             alert(response);
             document.location.reload(true);
         }
     });
 })

 /*
     * THIS IS TO ADD NEW PRODUCTS 
     * ========================================================================
     */

 $("#btn-add-product").on("click",function(){
     var this_btn = this;
 var product_name = document.querySelector("#product_name");
 var select_control = document.querySelector("#select-control");
 var category_option = document.querySelector("#category-option");
 var price_value = document.querySelector("#price_value");
 var file_content = document.querySelector("#file-content");
 var message = document.querySelector("#message");
 var sent_indicator = document.querySelector("#sent_indicator");
 var seller_name = document.querySelector("#seller_name");
 var seller_location = document.querySelector("#seller_location");
 var seller_number = document.querySelector("#seller_number");
 var form_data = new FormData();
 sent_indicator.classList.add("alert", "alert-danger");
 form_data.append("prod_name", product_name.value);
 form_data.append("cat", category_option.options[category_option.selectedIndex].text);
 form_data.append("currency", select_control.options[select_control.selectedIndex].text);
 form_data.append("price", price_value.value);
 form_data.append("image", file_content.files[0]);
 form_data.append("description", message.value);
 form_data.append("seller_name", seller_name.value);
 form_data.append("seller_location", seller_location.value);
 form_data.append("seller_number", seller_number.value);
 this_btn.disabled="true";
 var ajax = new XMLHttpRequest();
 ajax.onreadystatechange = () =>{
     if(ajax.readyState==4 && ajax.status==200){
         sent_indicator.innerHTML = ajax.responseText;
        this_btn.disabled=false;
     }
 }
 ajax.open("POST",global_url+"products/add_products",true);
 ajax.send(form_data);
});

/*
     * THIS FUNCTION CLEARS THE FORM PRODUCT VALUES 
     * ========================================================================
     */

$("#btn-clear").on("click",function(){
  $("#product_name").val("");
  $("#select-control").val("");
  $("#category-option").val("");
  $("#price_value").val("");
  $("#message").val("");
  $("#file-content").val("");
  $("#seller_name").val("");
  $("#seller_location").val("");
  $("#seller_number").val("");
});
/*
     * THIS FUNCTION IS TO DELETE A PRODUCT 
     * ========================================================================
     */
  $(document).on("click",".delete_content_products",function(){
   var id = this.getAttribute("id");
   $.ajax({
       type: "GET",
       url: global_url+"products/delete_products?id="+id,
      success: function (response) {
           alert(response);
           document.location.reload(true);
       }
   });
  });

/*
     * THIS FUNCTION IS TO SEARCH FOR A SPECIFIC PRODUCTS AND RETURN IT IN JSON FORMAT
     * ===============================================================================
     */
  $("#live_search_here_prod").on("keyup",function(){
      $val = $(this).val();
      $.ajax({
        type: "GET",
        url: global_url+"products/search_products?search="+$val,
             success: function (response) {
           var response_text = JSON.parse(response);
           var myObj = response_text.results;
           var value;  
           var display_content = document.querySelector("#display_content");
           display_content.innerHTML = "";
           for (var index = 0; index < myObj.length; index++) {
            var index_elem = myObj[index];
               value = "<tr>";
               value+="<td>"+index_elem.id+"</td>";
                value+="<td>"+index_elem.prod_name+"</td>";
                value+="<td>"+index_elem.category+"</td>";
                value+="<td>"+index_elem.price+"</td>";
                value+="<td>"+"<img style='width:50px;height:50px;' src='"+global_url+"assets/prod_img/"+index_elem.file_name+"'/></td>";
                value+="<td>"+index_elem.seller_number+"</td>";
                value+="<td>"+index_elem.seller_location+"</td>";
                value+="<td><a class='btn btn-primary' href='"+global_url+"admin/update-products/"+index_elem.id+"'><i class='fa fa-reply'></i></a></td>";
                value+="<td><button class='btn btn-primary delete_content_products' id='"+index_elem.id+"'><i class='fa fa-trash-o'></i></button></td>";
                 value+="</tr>";
              console.log(value);
              display_content.innerHTML +=value;
           }
           
            }
    });
  });
   /*
     * THIS FUNCTION IS TO UPDATE CONTENTS IN THE PRODUCTS TABLE
     * ========================================================================
     */
  
    $("#update-add-product").on("click",function(){
        var product_name = document.querySelector("#product_name");
        var select_control = document.querySelector("#select-control");
        var category_option = document.querySelector("#category-option");
        var price_value = document.querySelector("#price_value");
        var file_content = document.querySelector("#file-content");
        var message = document.querySelector("#message");
        var sent_indicator = document.querySelector("#sent_indicator");
        var seller_name = document.querySelector("#seller_name");
        var seller_location = document.querySelector("#seller_location");
        var seller_number = document.querySelector("#seller_number");
        var content_id = document.querySelector("#content_id");
        var form_data = new FormData();
        sent_indicator.classList.add("alert", "alert-danger");
        form_data.append("prod_name", product_name.value);
        form_data.append("cat", category_option.options[category_option.selectedIndex].text);
        form_data.append("currency", select_control.options[select_control.selectedIndex].text);
        form_data.append("price", price_value.value);
        form_data.append("image", file_content.files[0]);
        form_data.append("description", message.value);
        form_data.append("seller_name", seller_name.value);
        form_data.append("seller_location", seller_location.value);
        form_data.append("seller_number", seller_number.value);   
        form_data.append("id",content_id.value)
        $.ajax({
          url: global_url+'products/update_table_products',
          data: form_data,
          processData: false,
          contentType: false,
          type: 'POST',
          success: function(response){
         sent_indicator.innerHTML = response;
          }
        });  
    })
  /*
     * THIS ADDS A NEW IMAGE TO THE SLIDER
     * ========================================================================
     */
  
  $("#add_slideshow").on("click",function(){
      $slider1 = $("#slider_header1").val();
      $slider2 = $("#slider_header2").val();
      $link = $("#product_link").val();
      $response = $("#validation_slideshow");
      var file = document.querySelector("#file-content");
     $response.html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>Loading...</b></center>");
      var form_data = new FormData();
      form_data.append("header1", $slider1);
      form_data.append("header2", $slider2);
      form_data.append("link", $link);
      form_data.append("image", file.files[0]);
    $.ajax({
        url: global_url+'admin_slideshow/add_slider_img',
        data: form_data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(response){
          $response.html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>&nbsp;"+response+"</b></center>");
        }
      });  
  });
  
  /*
     * THIS DELETES A SLIDESHOW SECTION 
     * ========================================================================
     */
     $(".delete_cat_slider").on("click",function(){
        var delete_id = this.getAttribute("delete-id");
        $.ajax({
            type: "GET",
            url: global_url+"admin_slideshow/delete_slideshow?id="+delete_id,
            success: function (response) {
                alert(response);
                document.location.reload(true);
            }
        });
     });
/*
     * THIS IS FOR THE TABS IN THE SETTINGS  FOR CHANGING THE ACTIVE CLASS
     * ========================================================================
     */
     var btn_personal = document.querySelectorAll(".btn-personal");
if(btn_personal!==null){
    for (let index = 0; index < btn_personal.length; index++) {
        btn_personal[index].addEventListener("click", change_me);
      }
}
function change_me(){
    var t_row_display = document.querySelector(".t-row-display");
    var btn_personal_change = document.querySelectorAll(".btn-personal");
    for (let index = 0; index < btn_personal.length; index++) {
        btn_personal_change[index].classList.remove("active-btn");
      }
      this.classList.add("active-btn");
  }

  /*
     * THIS IS TO HIDE AND SHOW EACH TABS
     * ========================================================================
     */
  $(".total").on("click", function(){
    var this_dt = this;
var hide_area = document.querySelectorAll(".hide-area");
hide_area.forEach(function(value, index){
  var attribute = value.getAttribute("data-id");
  var attr_this =  this_dt.getAttribute("id");
  if(attr_this==attribute){
      value.style.display="block";
  } else{
      value.style.display="none";
  }
});
});

 /*
     * THIS WILL ADD A NEW ADMIN IN THE ADMIN SECTION
     * ========================================================================
     */
$("#btn-add-admin").on("click",function(){
    $username = $("#add_username").val();
    $email = $("#add_email").val();
    $password = $("#add_password").val();
    $confirm = $("#add_confirm").val();
    var form_data = new FormData();
    form_data.append("username", $username);
    form_data.append("email", $email);
    form_data.append("password",$password);
    form_data.append("confirm", $confirm);
    $("#sent_indicator_additional").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>Loading...</b></center>");
    $.ajax({
        type: "POST",
        url: global_url+"admin/add_new_admin",
        data: form_data,
        processData: false,
        contentType: false,
        success: function (response) {
$("#sent_indicator_additional").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>"+response+"</b></center>");
        }
    });
})

/*
     * THIS WILL CLEAR ADD ADMIN TAB VALUES
     * ========================================================================
     */
$("#btn-clear-admin").on("click",function(){
     $("#add_username").val("");
     $("#add_email").val("");
    $("#add_password").val("");
    $("#add_confirm").val("");
   
});

/*
     * THIS WILL UPDATE ADMIN DETAILS
     * ========================================================================
     */
    $("#update-admin").on("click",function(){
        $username = $("#update_username").val();
        $email = $("#update_email").val();
        $password = $("#update_password").val();
        $confirm = $("#update_confirm").val();
        var form_data = new FormData();
        form_data.append("username", $username);
        form_data.append("email", $email);
        form_data.append("password",$password);
        form_data.append("confirm", $confirm);
        $("#sent_indicator_update").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>Loading...</b></center>");
        $.ajax({
            type: "POST",
            url: global_url+"admin/update_admin_profile",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
    $("#sent_indicator_update").html("<center style='background:#8F8E90;color:white;'class='alert alert-danger'><b>"+response+"</b></center>");
            }
        });
    })  

/*
     * SET ALL PENDING COMMENTS TO VIEWED COMMENTS
     * ========================================================================
     */

  $(document).on("click",".purchase-update-pending",function(){
      $get_attr = $(this).attr("id-pending");
      $.ajax({
          type: "GET",
          url: global_url+"admin_purchase/update_from_pending?id="+$get_attr,
        success: function (response) {
              alert(response);
              document.location.reload(true);
          }
      });
  })
/*
     * DELETES A PURCHASE
     * ========================================================================
     */
    $(document).on("click",".delete_content_products",function(){
        $get_attr = $(this).attr("id");
        $.ajax({
            type: "GET",
            url: global_url+"admin_purchase/delete_purchase_details?id="+$get_attr,
          success: function (response) {
                alert(response);
                document.location.reload(true);
            }
        });
    })


    /*
     * THIS FUNCTION IS TO SEARCH FOR A SPECIFIC PURCHASE AND RETURN IT IN JSON FORMAT
     * ===============================================================================
     */
  $("#live_search_here_buyer").on("keyup",function(){
    $val = $(this).val();
    $.ajax({
      type: "GET",
      url: global_url+"admin_purchase/search_purchase?search="+$val,
           success: function (response) {
         var response_text = JSON.parse(response);
         console.log(response);
         var myObj = response_text.results;
         var value;  
         var display_content = document.querySelector("#display_content");
         display_content.innerHTML = "";
         for (var index = 0; index < myObj.length; index++) {
          var index_elem = myObj[index];
             value = "<tr>";
             value+="<td>"+index_elem.name+"</td>";
              value+="<td>"+index_elem.email+"</td>";
              value+="<td>"+index_elem.location+"</td>";
              value+="<td>"+index_elem.phone+"</td>";
              value+="<td>"+index_elem.seller_number+"</td>";
              value+="<td>"+index_elem.seller_location+"</td>";
              value+="<td>"+index_elem.price+"</td>";
             if(index_elem.seen==0){
                value+="<a class='btn btn-primary purchase-update-pending'href='#' id-pending='"+index_elem.id+"'><i class='fa fa-clock-o'></i></a></td>";
             }else{
               value+="<a class='btn btn-primary'href='#'><i class='fa fa-eye'></i></a></td>";
             }
              value+="<td><button class='btn btn-primary delete_content_products' id='"+index_elem.id+"'><i class='fa fa-trash-o'></i></button></td>";
               value+="</tr>";
            console.log(value);
            display_content.innerHTML +=value;
         }
         
          }
  });
});
