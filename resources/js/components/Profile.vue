<template>
<section class="login-wrapper dark">
<div class="container pt-4">
  <h1 align="center">My Profile</h1>
  <div class="row">
    <div class="col-md-8 offset-md-2 mt-4 col-md-offset-2">
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': 
                form.errors.has('name') }" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
        <small id="NameHelp" class="form-text text-muted"></small>
        <has-error :form="form" field="name"></has-error>
      </div>
      <div class="form-group">
        <label for="exampleInputPhone">Phone</label>
        <input v-model="form.phone" type="text" class="form-control" :class="{ 'is-invalid': 
                form.errors.has('phone') }" id="phone" aria-describedby="emailHelp" placeholder="Enter Contact Number">
        <small id="NameHelp" class="form-text text-muted"></small>
        <has-error :form="form" field="phone"></has-error>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': 
                form.errors.has('email') }" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <has-error :form="form" field="email"></has-error>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input v-model="form.type" type="hidden" name="type" value="User">
        <input type="password" class="form-control" :class="{ 'is-invalid': 
                form.errors.has('password') }" id="exampleInputPassword1" placeholder="Password">
        <has-error :form="form" field="password"></has-error>
      </div>
      <button type="submit" @click.prevent="updateInfo" class="btn btn-success btn-lg mb-3">Save</button>
    </form>  

    </div>
  </div>
</div>
</section>
</template>

<script>
    export default {
      data(){
        return {
                 form: new Form({
                    id:'',
                    name : '',
                    email : '',
                    password : '',
                    type : '',
                    phone : ''
              })
        }
      },

      methods:{
        getProfilePhoto(){

          let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+this.form.photo;
          return photo;
        },
        updateInfo(){
          this.$Progress.start();
          this.form.put('api/profile')
          .then(()=>{
            toast({
            type: 'success',
            title: 'Updated successfully'
            })
            Fire.$emit('AfterEvent');
            this.$Progress.finish();
          })
          .catch(()=>{
            this.$Progress.fail();
          });
        },
        updateProfile(e){
          let file = e.target.files[0];
          let reader = new FileReader();

          if(file['size'] < 2111775){
            reader.onloadend = (file)=>{
              // console.log('RESULT', reader.result)
              this.form.photo = reader.result;
            }
          reader.readAsDataURL(file);
          }else{
            swal({
              type: 'error',
              title: 'Oops...',
              text: "You are uploading a large file",
            })
          }
        }
      },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
          Fire.$on('AfterEvent', () =>{
          axios.get("api/profile")
          .then(({ data }) => (this.form.fill(data)));
            });
          axios.get("api/profile")
          .then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
