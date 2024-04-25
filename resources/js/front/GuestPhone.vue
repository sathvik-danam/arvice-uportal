<template>
    <div class="container">
        <div class="row justify-content-center">
    <div class="row mt-4">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Guest Phone List</h3>

              <div class="box-tools">
                  <button class="btn btn-success" @click="newModal">Add Phone Numbers<i class="fa fa-phone fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive table-dark no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Phone</th>
                  <th>Name</th>
                  <th>Relation</th>
                  <th>Modify</th>
                </tr>
                <tr v-if="users.data == 0">
                    <td colspan="4" align="center"><h3>No Data Found!</h3></td>
                </tr>
                <tr v-for="user in users.data" :key="user.id"> 
                  <td>{{ user.phone }}</td>
                  <td>{{ user.name }}</td>
                  <td>{{ user.relation }}</td>
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
                <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Phone Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent=" editmode ? updateUser() : createUser()">
            <div class="modal-body">

            <div class="form-group">
            <label for="exampleInputPhone">Phone</label>
            <input v-model="form.phone" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('phone') }" id="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="phone"></has-error>
            </div>   
            <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('name') }" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                <small id="NameHelp" class="form-text text-muted"></small>
            <has-error :form="form" field="name"></has-error>
            </div>   
            <div class="form-group">
                <label for="relation">Select Relation</label>
                <select v-model="form.relation" name="relation" id="relation"
                    class="form-control" :class="{ 'is-invalid': 
                    form.errors.has('type') }" >
                <option value="Friend">Friend</option>
                <option value="Relative">Relative</option>
                <option value="Work">Work</option>
                <option value="Other">Other</option>
                </select>
                <has-error :form="form" field="type"></has-error>
            </div>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-primary">Update</button>
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
                    phone : '',
                    name : '',
                    relation : 'Friend'
              })
            }
        },
        methods: {
		getResults(page = 1) {
			axios.get('api/guestphone?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		},
            updateUser(){
                this.$Progress.start();
                this.form.put('api/guestphone/'+this.form.id)
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
                        this.form.delete('api/guestphone/'+id).then(()=>{
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
                    axios.get("api/guestphone").then(({ data }) => (this.users = data));
            },
          createUser(){
              this.$Progress.start();
              this.form.post('api/guestphone')
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
