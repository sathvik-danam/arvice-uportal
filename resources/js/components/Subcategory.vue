<template>
    <div class="container">
        <div class="row justify-content-center" v-if="$gate.isAdminOrAuthor()">
    <div class="row mt-4">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profession Sub-Types Table</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add Profession Sub-Types<i class="fas fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding table-dark">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th> 
                  <th>Name</th>
                  <th>Belongs To</th>
                  <th>Modify</th>
                </tr>
                
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.id}}</td>
                  <td>{{ user.name }}</td>
                  <td>{{ user.belongs_to }}</td>
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
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">

            <div class="form-group">
            <label for="exampleInputCategory">Name</label>
            <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('name') }" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="name"></has-error>
            </div>   
                <div class="form-group">
                    <label for="about">Belongs To Primary Profession</label>
                <select v-model="form.belongs_to" name="belongs_to" id="belongs_to"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('belongs_to') }" >
                <option value="">Select Profession Belongs To Category</option>
                <option v-for="category in categories.data" :key="category.id">
                  {{ category.name}}</option>

                </select>
                    <has-error :form="form" field="category"></has-error>
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
                categories: {},
                users: {},
                  form: new Form({
                    id:'',
                    name : '',
                    belongs_to : ''
              })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/subcategory?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},
            updateUser(){
                this.$Progress.start();
                this.form.put('api/subcategory/'+this.form.id)
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
                        this.form.delete('api/subcategory/'+id).then(()=>{
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

                    axios.get("api/subcategory").then(({ data }) => (this.users = data));
                }
            },
            loadCategories(){
                if(this.$gate.isAdminOrAuthor()){

                    axios.get("api/category").then(({ data }) => (this.categories = data));
                }
            },

          createUser(){
              this.$Progress.start();
              this.form.post('api/subcategory')
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
                axios.get('api/findSubcategory?q=' + query)
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
