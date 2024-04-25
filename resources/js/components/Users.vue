<template>
    <div class="container">
        <div class="row justify-content-center" v-if="$gate.isAdminOrAuthor()">
    <div class="row mt-4">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add User<i class="fas fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding table-dark">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Type</th>
                  <th>Registered At</th>
                  <th>Modify</th>
                  <th>Blank</th>
                </tr>
                
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.id}}</td>
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
                  <td>{{ user.phone }}</td>
                  <td>{{ user.type }}</td>
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
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name"
                     placeholder="Enter Name"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>
                 <div class="form-group">
                    <input v-model="form.email" type="text" name="email"
                     placeholder="Enter Email"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('email') }"> 
                    <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                    <input v-model="form.password" type="password" name="password"
                     placeholder="Enter Password"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                </div>
                <div class="form-group">
                    <input v-model="form.phone" type="phone" name="phone"
                     placeholder="Enter Contact Number"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('phone') }">
                    <has-error :form="form" field="phone"></has-error>
                </div>

                <div class="form-group">
                    <select v-model="form.type" name="type" id="type"
                     placeholder="User Type"
                        class="form-control" :class="{ 'is-invalid': 
                        form.errors.has('type') }">
                    <option value="">Select User Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="Author">Author</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
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
                form: new Form({
                    id:'',
                    name : '',
                    email : '',
                    password : '',
                    phone : '',
                    type : ''
                })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/user?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
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
                        this.form.delete('api/user/'+id).then(()=>{
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

                    axios.get("api/user").then(({ data }) => (this.users = data));
                }
            },

            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')
                    toast({
                    type: 'success',
                    title: 'User created successfully'
                    })
    
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
            }
        },
        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data)=>{
                    this.users = data.data
                })
                .catch(()=>{

                })
            });
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers(); 
            });
        }
    }
</script>
