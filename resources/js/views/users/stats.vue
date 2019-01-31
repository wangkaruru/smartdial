<template >
  <div>
    
    <b>Description: </b>
    <div></div>
    <b>Price:</b>
    <div><span class="glyphicon glyphicon-euro"></span></div>
    <br/>
    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
    <tr v-for="users in user.user.data">
                                           <td>{{ user.user_id }}</td>
                                           
                                           </tr>
  </div>
</template>
<script>
    import { Form, HasError, AlertError } from "vform";

    export default {
        data(){
    return{   users: {},
      form: new Form({
        user_id:'',
        user:'',
        pass:'',
        full_name: '',             
        user_level: '',
        user_group: '',
        phone_login:'',
        phone_pass:''
        
        }) } },

        
//        var Product = Vue.extend({
//   template: '#product',
//   data: function () {
//     return {product: findProduct(this.$route.params.product_id)};
//   }
// }
// );
        
        
        
    }
       
</script>

