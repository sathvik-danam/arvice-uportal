<template>
    <div class="container">
        <div class="row justify-content-center" v-if="$gate.isAdminOrAuthor()">
    <div class="row mt-4">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post Table</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add Profession<i class="fas fa-briefcase fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding table-dark">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Profession</th>
                  <th>About</th>
                  <th>City</th>
                  <th>Photo1</th>
                  <th>Photo2</th>
                  <th>Registered At</th>
                  <th>Modify</th>
                </tr>
                
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.id}}</td>
                  <td>{{ user.category }}</td>
                  <td>{{ user.profession }}</td>
                  <td>{{ user.about }}</td>
                  <td>{{ user.city }}</td>
                  <td>
                      <img :src="'img/profession/' + user.photo1"  alt="Professional Photo" width="100px" height="auto">
                  </td>
                  <td>
                      <img :src="'img/profession/' + user.photo2"  alt="Professional Photo" width="100px" height="auto">
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
        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Post info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">
                <div class="form-group">
                    <label for="about">Primary Profession</label>
                <select v-model="form.category" name="category" id="category" v-on:change="onChange"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('category') }" >
                <option value="">Select Profession Category</option>
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
                <option value="">Select Profession Sub_Types</option>
                <option v-for="subcategory in subcategories.data" :key="subcategory.id">
                  {{ subcategory.name}}</option>

                </select>
                    <has-error :form="form" field="profession"></has-error>
            </div>
            <div class="form-group">
                <label for="exampleInputCity">Cities List</label>
                <input v-model="form.city" type="text" class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('city') }" id="city" aria-describedby="emailHelp" placeholder="Enter Cities">
                <small id="CityHelp" class="form-text text-muted"></small>
                <has-error :form="form" field="city"></has-error>
            </div>
            <div class="form-group">
            <label for="about">About Profession</label>
            <textarea class="form-control summernote" id="summernote" :class="{ 'is-invalid': 
                form.errors.has('about') }" v-model="form.about" rows="3"></textarea>
            <has-error :form="form" field="about"></has-error>
            </div>
            <div class="form-group">
                <label for="profilePhoto">Main Profession Photo </label>
                <input type="file" class="form-control-file" accept="image/x-png,image/gif,image/jpeg"  @change="updateProfile" id="profilePhoto1">
            </div>
            <div class="form-group">
                <label for="profilePhoto">Profession Photo</label>
                <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" @change="updateProfile2" id="profilePhoto2">
            </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                editmode: true,
                users: {},
                categories: {},
                subcategories: {},
                  form: new Form({
                    id:'',
                    category : '',
                    profession : '',
                    about : '',
                    city : '',
                    photo1 : '',
                    photo2 : ''
              })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/post?page=' + page)
				.then(response => {
					this.users = response.data;
				});
        },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/post/'+this.form.id)
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
       updateProfile(e){
          let file = e.target.files[0]; 
          let reader = new FileReader();

          if(file['size'] < 2111775){
            reader.onloadend = (file)=>{
              // console.log('RESULT', reader.result)
              this.form.photo1 = reader.result;
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
       updateProfile2(e){
          let file = e.target.files[0]; 
          let reader = new FileReader();

          if(file['size'] < 2111775){
            reader.onloadend = (file)=>{
              // console.log('RESULT', reader.result)
              this.form.photo2 = reader.result;
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
                        this.form.delete('api/post/'+id).then(()=>{
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
                if(this.$gate.isAdminOrAuthor()){

                    axios.get("api/post").then(({ data }) => (this.users = data));
                }
            },
            loadCategories(){
                if(this.$gate.isAdminOrAuthor()){

                    axios.get("api/category").then(({ data }) => (this.categories = data));
                }
            },
            onChange(){
                let query = this.form.category;
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
              this.form.post('api/post')
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
                axios.get('api/findPost?q=' + query)
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