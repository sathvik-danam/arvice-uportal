<template>
    <div class="container">
        <div class="row justify-content-center">
    <div class="row mt-4">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Profession List</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Become Partner (Add Profession) <i class="fa fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover"> 
                <tbody><tr>
                  <th>Profession Name</th>
                  <th>Profession</th>
                  <th>Type</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>About</th>
                  <th>Profile</th>
                  <th>Registered At</th>
                  <th>Modify</th>
                </tr>
                <tr v-if="users.data == 0">
                    <td colspan="9" align="center"><h3>No Data Found!</h3></td>
                </tr>
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.profession_name }}</td>
                  <td>{{ user.profession }}</td>
                  <td>{{ user.type | upText }}</td>
                  <td>{{ user.city }}</td>
                  <td>{{ user.address }}</td>
                  <td>{{ user.about }}</td>
                  <td>
                      <img :src="'img/profile/' + user.photo"  alt="Professional Photo" width="80px" height="auto">
                  </td>
                  <td>{{ user.created_at | myDate }}</td>
                  <td>
                      <a href="#" @click="editModal(user)">
                      <i class="fa fa-edit blue"></i></a>/
                      <a href="#" @click="deleteUser(user.id)">
                          <i class="fa fa-trash red"></i>
                      </a>
                  </td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="card-footer">
                <pagination :data="users" 
                @pagination-change-page="getResults"></pagination>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
        </div> 
        <!-- Modal -->
        <div class="modal" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Partner's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()"> 
            <div class="modal-body">
                <div class="form-group">
                    <label for="about">Primary Profession</label>
                <select v-model="form.profession_name" name="category" id="category" v-on:change="onChange"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('category') }" >
                <option value="">Select Primary Profession</option>
                <option v-for="category in categories.data" :key="category.id"> 
                  {{ category.name}}</option>
                </select>
                    <has-error :form="form" field="category"></has-error>
                </div>
                <div class="form-group">
                    <label for="about">Profession Sub-Types</label>
                    <select v-model="form.profession" name="profession" id="profession"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('profession') }" >
                    <option value="" disabled>Select Profession Sub-Types</option>
                    <option v-for="subcategory in subcategories.data" :key="subcategory.id">
                    {{ subcategory.name}}</option>
                    </select>
                    <has-error :form="form" field="profession"></has-error>
                </div>

            <div class="form-group">
            <label for="exampleInputCity">City</label>
            <input type="hidden" v-model="form.type" name="type" value="Not Registered">
            <input v-model="form.city" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('city') }" id="city" aria-describedby="emailHelp" placeholder="Enter City">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="city"></has-error>
            </div>   
            <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input v-model="form.address" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('address') }" id="address" aria-describedby="emailHelp" placeholder="Enter Address">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="address"></has-error>
            </div> 
                 <div class="form-group">
                <label for="about">About Your Profession</label>
                <textarea class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('about') }" v-model="form.about" id="about" rows="3"></textarea>
                <has-error :form="form" field="about"></has-error>
                </div>
                <div class="form-group">
                    <label for="profilePhoto1">Profile Picture</label>
                    <input type="file" class="form-control-file" accept="image/x-png,image/gif,image/jpeg"  @change="updateProfile" id="profilePhoto1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn brows-btn1" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                categories: {},
                subcategories: {},
                editmode: true,
                users: {},
                  form: new Form({
                    id:'',
                    profession_name : '',
                    profession : '',
                    type : 'Partner',
                    city : '',
                    address : '',
                    about : '',
                    photo : ''
              })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/mypofession?page=' + page)
				.then(response => {
					this.users = response.data;
				});
        },
          updateProfile(e){
          let file = e.target.files[0]; 
          let reader = new FileReader();
 
          if(file['size'] < 2111775){
            reader.onloadend = (file)=>{

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
        } ,
            updateUser(){
                this.$Progress.start();
                this.form.put('api/professional/'+this.form.id)
                .then(()=>{
                    $('#addNew').modal('hide');
                            swal(
                            'Updated!',
                            'Information has been updated',
                            'success'
                            )
                             this.$Progress.finish();
                             Fire.$emit('AfterCreate');
                })
                .catch(()=> {
                    this.$Progress.fail();
                });
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
        },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
        },
            deleteUser(id){
                swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //Send request to the server
                    if(result.value){
                        this.form.delete('api/professional/'+id).then(()=>{
                            swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            Fire.$emit('AfterCreate');
                        }).catch(()=>{
                            swal("Failed!", "There was something wrong.", "warning");
                        });
                    }
                })
            },
            loadUsers(){
                    axios.get("api/mypofession").then(({ data }) => (this.users = data));
            },
            loadCategories(){
                axios.get("api/category").then(({ data }) => (this.categories = data));
            },
            onChange(){
                let query = this.form.profession_name;
                console.log(query);
                axios.get('api/findShowcategory?q=' + query)
                .then((data)=>{
                    this.subcategories = data.data
                })
                .catch(()=>{

                })
            }, 

          createUser(){ 
              this.$Progress.start(); 
              this.form.post('api/profess') 
              .then(()=>{
                    $('#addNew').modal('hide');
                            swal(
                            'Updated!',
                            'Information has been added',
                            'success'
                            )
                             this.$Progress.finish();
                             Fire.$emit('AfterCreate');
                              this.$Progress.finish();
              })
              .catch(()=>{

              })
          }
        },
        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findPartner?q=' + query)
                .then((data)=>{
                    this.users = data.data
                })
                .catch(()=>{

                })
            });
            this.loadUsers();
            this.loadCategories();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            });
        }
    }
</script>
